<?php
class Logout extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	public function salir()
    {
                
        $this->session->unset_userdata(array('usuario'));
        $this->session->sess_destroy(); 
            
        
        
        
        
        

    }
	
}
