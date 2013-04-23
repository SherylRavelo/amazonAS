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
                var_dump("ID = ".$idUsuario);
                var_dump("OPCION = ". $opcion);
                break;
            case 'changePassword':
                $this->loadChangePasswordView($idUsuario);
                break;
        };
    }
    
    
    function viewModificarUsuario($idUsuario) {
        $data = array();
        $data['idUsuario'] = $idUsuario;
        
        $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $data['nombre'] = $this->usuario_model->getNombre();
        $data['apellido'] = $this->usuario_model->getApellido();
        $data['email'] = $this->usuario_model->getEmail();
        $data['fecha_nac'] = $this->usuario_model->getFechaNac();
        $data['fecha_registro'] = $this->usuario_model->getFechaRegistro();
        $data['direccion'] = $this->usuario_model->getDireccion();
        $data['zona_postal'] = $this->usuario_model->getZonaPostal();
        
        $this->load->view('usuario/usuario_modificar', $data);
    }
    
    
    function modificarUsuario($idUsuario) {

        print_r("HEYY");
        /*
        $nombre = $this->input->post('name_signup');
        $apellido = $this->input->post('lastname_signup');
        $email = $this->input->post('email_signup');
        
        // se realiza llamada al model para que se modificquen los datos del usuario
        $booleano = $this->usuario_model->modificar($username, $nombre, $apellido, $email);
        if ($booleano == true) {
            // si se realizo la modificacion regresar al index
            redirect('/homeuser/index');
        } else
        // caso de gente repetido
            echo "esta repedito";
        */
    }
    
    
    
    
    
    
    
    
    function registrarFormaDePago($idUsuario){
        
        
    }
    
    
    

}

?>
