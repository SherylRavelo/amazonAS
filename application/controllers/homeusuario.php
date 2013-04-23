<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Homeusuario extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
    }

    public function index() {
        
        $this->load->helper(array('form'));

        $data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('/usuario/usuario_home', $data);
            
        
    }
    
    
    

}
