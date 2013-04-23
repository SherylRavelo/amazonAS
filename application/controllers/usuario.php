<?php if (!defined('BASEPATH'))   exit('No direct script access allowed');

/**
 * amazonAS
 *
 * @author		Sheryl Ravelo Alberly Martínez
 * @copyright	        Copyright (c) 2013
 * 
 */
class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');

        $this->load->helper('form');
    }
    

    /**
     *  Funcion index($username,$opcion) se realizan las 
     * llamadas basicas para la carga de una de las vistas 
     * de datos del usuario, segun sea el caso se llaman a los demas metodos
     *  
     * @category	Controller
     * @param string $idUsuario usuario 
     * @param string $opcion nombre de funcion index a llamar 
     */
    
    
    function index($idUsuario, $opcion) {

        switch ($opcion) {
            case 'modificar':
                $this->viewModificarUsuario($idUsuario);
                break;
            case 'changePassword':
                $this->loadChangePasswordView($idUsuario);
                break;
            case 'pago':
                $this->cargar_view_pago($idUsuario);
        };
    }
    
    
   function viewModificarUsuario($idUsuario) {
        $data = array();
        $data['idUsuario'] = $idUsuario;
        
        $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $data['nombre'] = $this->usuario_model->getNombre();
        $data['nombreUser'] = $this->usuario_model->getNombre();
        $data['apellido'] = $this->usuario_model->getApellido();
        $data['correo'] = $this->usuario_model->getCorreo();
        $data['estado_usuario'] = $this->usuario_model->getEstadoUsuario();
        $data['cedula'] = $this->usuario_model->getCedula();
        $data['email'] = $this->usuario_model->getCorreo();
        $data['fecha_nac'] = $this->usuario_model->getFechaNac();
        $data['fecha_registro'] = $this->usuario_model->getFechaRegistro();
        $data['direccion'] = $this->usuario_model->getDireccion();
        $data['zona_postal'] = $this->usuario_model->getZonaPostal();
        
        $this->load->view('usuario/usuario_modificar', $data);
    }
    
    
    
    function modificarUsuario($idUsuario) {

        $booleano = $this->usuario_model->modificar($idUsuario);
        
        $data = array();
        $data['idUsuario'] = $idUsuario;
        
        
        $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $data['nombreUser'] = $this->usuario_model->getNombre();
        $data['apellido'] = $this->usuario_model->getApellido();
        
        if ($booleano == true) {    
            $this->sendmeail($idUsuario);
        } else
        {
            $this->load->view('usuario_modificar',$data);
        }
    }
    
    
    function sendmeail($idUsuario){
        
       $nombre = $this->input->post('nuevo_nombre');
       $apellido = $this->input->post('nuevo_apellido');
       $correo = $this->input->post('nuevo_correo');
       $fecha_nac = $this->input->post('nuevo_fnacimiento');
       $estado_usuario = $this->input->post('nuevo_status');
       $fecha_registro = $this->input->post('nuevo_fregistro');
       $zona_postal = $this->input->post('nuevo_codigo');
       $direccion = $this->input->post('nuevo_direccion');

       $data['idUsuario'] = $idUsuario;
       $data['nombre'] = $nombre;
                  				
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tiendavirtualamazonas@gmail.com',
            'smtp_pass' => 'tiendavirtual'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('tiendavirtualamazonas@gmail.com', 'amazonAS');
        $this->email->to($correo);
        $this->email->subject('Datos Actualizados');
        //$this->email->message('Thank you for registering. To activate you\'re account go to this url ' . base_url() . 'login/account_activation/' . $nick . '/'. $activation_code);


        $this->email->message(
                "Tus datos en amazonAS han sido actualizados: " .
                
                "Tus nuevos datos:" .
                
                "Nombre: " . $nombre . "  " .
                "Apellido: " . $apellido . "  " .
                "Email: " . $correo . "  " .
                "Fecha Nacimiento: " . $fecha_nac . "  " .
                "Fecha de Registro: " . $fecha_registro  . "  " .
                "Estado de cuenta: " . $estado_usuario . "  " .
                "Dirección: " . $direccion . "  " .
                "Codigo Postal: " . $zona_postal . "  " 
                
        );

        if ($this->email->send()) {
        
            $this->load->view('actualizacion_exitosa',$data);
        } else {
            show_error($this->email->print_debugger());
        }
        
    }
    
    function cargar_view_pago($idUsuario){
           
       $data['idUsuario'] = $idUsuario;
       $data['marca'] = $this->input->post('textfield_marca');
       
       
       
       
         $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $data['nombreUser'] = $this->usuario_model->getNombre();
        $data['apellido'] = $this->usuario_model->getApellido();
       
       $data['email'] = $this->usuario_model->getCorreo();
       
       
       $this->load->view('forma_de_pago', $data);
       
    }
    
    function registrar_forma_de_pago($idUsuario){
        
        $data['idUsuario'] = $idUsuario;
        $this->load->model('usuario_model');
        $this->usuario_model->registrar_pago($idUsuario);
        $this->load->view('forma_de_pago_registrada', $data);
        $this->send_mail_pago($idUsuario);
        
    }
    
    function send_mail_pago($idUsuario){
        
        $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $emailUsuario = $this->usuario_model->getCorreo();
        
            
       $num_tarjeta_credito = $this->input->post('textfield_numero');
       $fecha_venc = $this->input->post('datepicker');
       $marca = $this->input->post('textfield_marca');
       $cod_tarjeta = $this->input->post('textfield_codigo');
       $nombre_tarjeta = $this->input->post('textfield_nombre');
       $documento_identidad = $this->input->post('textfield_documento');
       $fk_usuario = $idUsuario;
       
                  				
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tiendavirtualamazonas@gmail.com',
            'smtp_pass' => 'tiendavirtual'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('tiendavirtualamazonas@gmail.com', 'amazonAS');
        $this->email->to($emailUsuario);
        $this->email->subject('Nueva forma de pago registrada');
        //$this->email->message('Thank you for registering. To activate you\'re account go to this url ' . base_url() . 'login/account_activation/' . $nick . '/'. $activation_code);


        $this->email->message(
                "Usted ha registrado la siguiente forma de pago: " .
                
                               
                "Número de tarjeta: " . $num_tarjeta_credito . "  " .
                "Fecha de vencimiento: " . $fecha_venc . "  " .
                "Marca: " . $marca . "  " .
                "Código de Tarjeta: " . $cod_tarjeta . "  " .
                "Nombre de Tarjeta: " . $nombre_tarjeta  . "  " .
                "Documento de identidad: " . $documento_identidad . "  " 
                
        );
        
        $this->email->send();
        
    }
    
    

}

?>
