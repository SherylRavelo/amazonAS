<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Producto extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        //$this->load->model('producto');
    }

    public function index() {
        
        $this->load->helper(array('form'));

        //$data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('producto/ver_producto');
            
        
    }
    
    

}
