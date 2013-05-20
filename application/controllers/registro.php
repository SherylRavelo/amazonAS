<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('registro_model');
    }

    public function index() {

        $this->load->helper(array('form'));
        $data['categorias'] = $this->categoria->getCategorias();
        $data['valor_mensaje'] = 3;
        $this->load->view('registro', $data);
    }

    function create_member() {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('textfield_nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('textfield_apellido', 'Apellido', 'trim|required');
        $this->form_validation->set_rules('textfield_cedula', 'Cedula', 'trim|required');
        $this->form_validation->set_rules($this->input->post('textfield_correo'), 'Correo', 'trim|required|valid_email');
        $this->form_validation->set_rules('textfield_direccion', 'Direccion', 'trim|required');
        $this->form_validation->set_rules('textfield_pais', 'Pais', 'trim|required');
        $this->form_validation->set_rules('textfield_ciudad', 'Ciudad', 'trim|required');
        $this->form_validation->set_rules('textfield_codigo', 'CodPostal', 'trim|required');
        $this->form_validation->set_rules('datepicker', 'FechaNac', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->helper(array('form'));

            $data['categorias'] = $this->categoria->getCategorias();
            $this->load->view('registro', $data);
            
        } else {
            $this->load->model('registro_model');
            
            
            $nombre =  $this->input->post('textfield_nombre');
            $apellido= $this->input->post('textfield_apellido');
            $cedula = $this->input->post('textfield_cedula');
            $correo = $this->input->post('textfield_correo');
            $fecha_nac = $this->input->post('datepicker');
            $zona_postal = $this->input->post('textfield_codigo');
            $direccion = $this->input->post('textfield_direccion');
			
            
     
            if ($query = $this->registro_model->create_member($nombre, $apellido, $cedula, $correo, $fecha_nac, $zona_postal, $direccion)) {
                
                $this->sendmeail();
            } else {
                $this->load->view('perfil');
            }
        }
    }

    function sendmeail() {
        $this->load->model('registro_model');

        $nombre = $this->input->post('textfield_nombre');
        $apellido = $this->input->post('textfield_apellido');
        $correo = $this->input->post('textfield_correo');
        $fecha_nac = $this->input->post('datepicker');
        $fecha_sistema = date("Y-m-d");


        $estado_usuario = "inactivo";
        $direccion = $this->input->post('textfield_direccion');
        $activation_code = $this->registro_model->getActivationCode($nombre);

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
        $this->email->subject('Activa tu cuenta');
        //$this->email->message('Thank you for registering. To activate you\'re account go to this url ' . base_url() . 'login/account_activation/' . $nick . '/'. $activation_code);


        $this->email->message(
                "Gracias por registrarte en la Tienda Virtual amazonAS." .
                
                "Tus datos de registro:" .
                
                "Nombre: " . $nombre . "  " .
                "Apellido: " . $apellido . "  " .
                "Email: " . $correo . "  " .
                "Fecha Nacimiento: " . $fecha_nac . "  " .
                "Fecha de Registro: " . $fecha_sistema  . "  " .
                "Estado de cuenta: " . $estado_usuario . "  " .
                "Dirección: " . $direccion . "  " .
                
                'Para activar su cuenta diríjase a: ' . base_url() . 'registro/account_activation/' . $nombre . '/' . $activation_code);












        if ($this->email->send()) {
            //$data['main_content'] = 'signup_successful';
            $this->load->view('registro_exitoso');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    function account_activation() {
        $this->load->model('registro_model');
        $nombre = $this->uri->segment(3);
        $activation_code = $this->uri->segment(4);
        if ($activation_code == '') {

            echo 'No registration code in URL';
            exit();
        }
        $reg_confirm = $this->registro_model->confirm_registration($nombre, $activation_code);
        if ($reg_confirm) {
            //$data['main_content'] = 'account_activated';
            $this->load->view('activacion_exitosa');
        } else {
            echo 'you have failed to register';
        }
    }

}
