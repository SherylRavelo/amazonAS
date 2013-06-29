<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->helper(array('form'));
		$this->load->model('compra_model');
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
    
    
   
    public function servicio_web($idUsuario = null, $nombreUser = null){
        
        
        $data['idUsuario'] = $idUsuario;
        $data['nombreUser'] = $nombreUser;
        $this->load->helper(array('form'));
        $data['categorias'] = $this->categoria->getCategorias();
        $data['valor_mensaje'] = 3;
        $this->load->view('servicioweb',$data);
  
    }
    
    
    
    
    public function buscador_api($idUsuario = null, $nombreUser = null){
        
        
        $data['idUsuario'] = $idUsuario;
        $data['nombreUser'] = $nombreUser;
        $this->load->helper(array('form'));
        $data['categorias'] = $this->categoria->getCategorias();
        $data['valor_mensaje'] = 3;
        $data['mensaje']="";
        $this->load->view('buscadorapi',$data);
  
    }
	
	
	 public function consultarTienda(){
        
        
        
          //$fk_usuario = $this->session->userdata('fk_usuario');               
                $this->compra_model->consultarTienda();
                
               
               redirect(base_url('movil#pg4','refresh'));
    }
    
    
    
    
   

    
    
    

}
