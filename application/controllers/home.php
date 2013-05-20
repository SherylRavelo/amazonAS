<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->helper(array('form'));
    }

    public function index() {
        

        $this->session->unset_userdata('idUsuario');
        $data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('home', $data);
            
        
    }
    
    public function sobre_nosotros($idUsuario=null, $nombreUser=null) {
        $data = array();
        $data['idUsuario'] = $idUsuario;
        $data['nombreUser'] = $nombreUser;
        $this->load->view('sobre_nosotros',$data);
            
        
    }
    
   
function test(){
	$this->load->library('unit_test');
    $suma = 10+2;
    $esperado = 12;
    $this->unit->run($suma, $esperado);
    echo $this->unit->report();
	
}
    
    
    

}
