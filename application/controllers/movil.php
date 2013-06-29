

<?php 

session_start(); 

include_once( 'C:\wamp\www\amazonAS\application\libraries\google-api-php-client\src\Google_Client.php' );
include_once( 'C:\wamp\www\amazonAS\application\libraries\google-api-php-client\src\contrib\Google_PlusService.php' );

        const REDIRECT_URL = 'http://localhost/amazonAS/index.php/perfil';
        const CLIENT_ID = '607139587180-e3b5rc95t8nasf8de8v5b0dnuptbb3pe.apps.googleusercontent.com';
        const CLIENT_SECRET = 'sHs_q0KOckzbYJTAkpSW4eV7';


class Movil extends CI_Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		$this->load->model('usuario_model');
		$this->load->database('default');
		
	}
	
	public function index()
	{
		
		$data = array('mensaje' => 'Vista cargada con una variable');
		$this->load->view('movil',$data);
		
	}
	
	public function login()
	{
		
		
			
			$nombre = $this->input->post('usuario');
			$password = $this->input->post('password');
			//$nuevo_user = $this->home_model->nuevo_registro($nombre,$password); 
			
			$this->session->set_userdata(array('usuario' => $nombre));
			
			redirect(base_url('movil#pg2','refresh'));
			
		
			
	}
	
	public function bienvenida()
	{
		
		$data = array('mensaje' => 'Vista cargada con una variable');
		$this->load->view('bienvenida',$data);
		
	}
	
}

