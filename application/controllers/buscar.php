<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Buscar extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
    }

    public function index() {
        
        $this->load->helper(array('form'));
        
        $data['categorias'] = $this->categoria->obtener_categorias(); 
        $this->load->view('buscar', $data);
            
        
    }
    
    

}