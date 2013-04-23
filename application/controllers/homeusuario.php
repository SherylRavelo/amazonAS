<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Homeusuario extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('usuario_model');
        $this->load->helper(array('form'));
    }

    public function index($idUsuario) {
        
        $usuario = new Usuario_Model();
        $usuario = $this->usuario_model->getUser($idUsuario);
        $nombreU = $this->usuario_model->getNombre();
        $apellidoU = $this->usuario_model->getApellido();
        $data['idUsuario'] = $idUsuario;
        
        $data['nombreUser'] = $nombreU.' '.$apellidoU;
        $data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('/usuario/usuario_home', $data);
            
        
    }
    
    
    

}
