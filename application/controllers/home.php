<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->helper(array('form'));
    }

    public function index() {
        

        $data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('home', $data);
            
        
    }
    
    public function sobre_nosotros() {
        
        $this->load->view('sobre_nosotros');
            
        
    }
    
    
    

}
