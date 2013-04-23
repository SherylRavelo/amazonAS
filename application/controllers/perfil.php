<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 

include_once( 'C:\wamp\www\amazonAS\application\libraries\google-api-php-client\src\Google_Client.php' );
include_once( 'C:\wamp\www\amazonAS\application\libraries\google-api-php-client\src\contrib\Google_PlusService.php' );

        const REDIRECT_URL = 'http://localhost/amazonAS/index.php/perfil';
        const CLIENT_ID = '607139587180-e3b5rc95t8nasf8de8v5b0dnuptbb3pe.apps.googleusercontent.com';
        const CLIENT_SECRET = 'sHs_q0KOckzbYJTAkpSW4eV7';
        
class Perfil extends CI_Controller {

    private $client;
    private $service;

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    
    
    function autenticacion(){
        
          /*Iniciamos el cliente*/
        $this->client = new Google_Client();
        $this->client->setApplicationName("Google+ PHP Starter Application");
        $this->client->setClientId(CLIENT_ID);
        $this->client->setClientSecret(CLIENT_SECRET);
        $this->client->setRedirectUri(REDIRECT_URL);
        $this->client->setScopes('https://www.googleapis.com/auth/userinfo.email');

        /*Iniciamos el servicio para el token*/
        $this->service = new Google_PlusService($this->client);

        parse_str(substr(strrchr($this->input->server('REQUEST_URI'), "?"), 1), $_GET);

        $authCode = $_GET['code'];
        $accessToken = $this->client->authenticate($authCode);
        $this->client->setAccessToken($accessToken);
        
        /* Obteniendo el token de acceso para obtener info de usuario */
        $token_acceso = $this->client->getAccessToken();
        $decode_token = json_decode($token_acceso, true);
        $this->session->set_userdata('access_token', $decode_token['access_token']);

        /* Obtener el correo del usuario con el token */
        $codigo = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $decode_token['access_token'];
        $cod = file_get_contents($codigo);
        $datos = json_decode($cod);
        $email = $datos->email; 
        $this->session->set_userdata('email', $email);
      
        if ($this->client->createAuthUrl()){

        /* Obtener los datos personales publicos del usuario (nombre, imagen, etc) */
        /*$me = $this->service->people->get('me');
        $minombre = $me['displayName'];
        $this->session->set_userdata('minombre', $minombre);*/
        
        /* Obtener datos del usuario por correo si esta registrado */
        
        $array_user = array();
        $array_user = $this->usuario_model->getUsuarioByEmail($this->session->userdata('email'));
        
        /*$data['idUsuario'] = $array_user[0]->id_usuario;
        var_dump($array_user[0]->id_usuario);*/

        /* Pasar los datos a la vista */
        /*$data['token'] = $this->session->userdata('access_token');
        $data['minombre'] = $this->session->userdata('minombre');
        $data['email'] = $this->session->userdata('email');*/
        
         return true;     
        }else{return false;}
        
        
    }
    
   
    function index() {
         
        $autenticacion_gmail = $this->autenticacion();
        
        
        if ($autenticacion_gmail){ 
   
                $email = $this->session->userdata('email');
                $this->load->model('registro_model');
		$query = $this->registro_model->validate($email);
        
        if($query==1) // if the user's credentials validated...

        {   
        
            
            
            
            
      $array_user = array();
        $array_user = $this->usuario_model->getUsuarioByEmail($this->session->userdata('email'));
        
        
        
        $data['idUsuario'] = $array_user[0]->id_usuario;
        var_dump($array_user[0]->id_usuario);
            
        
        /* Pasar los datos a la vista */
        
        $data['minombre'] = $this->session->userdata('minombre');
        $data['email'] = $this->session->userdata('email');
        
        $data['valor_mensaje'] = 1;
        
                $this->load->view('perfil', $data);
        }else{
            
            
            if ($query==0){
                $this->load->helper(array('form'));
                $this->load->model('categoria');
                $data['categorias'] = $this->categoria->getCategorias(); 
                $data['mensaje'] = "Su cuenta no ha sido activada, por favor verifique su correo para activarla";
                $this->load->view('error_login', $data);
                
            }else{
                $this->load->helper(array('form'));
                $this->load->model('categoria');
                $data['categorias'] = $this->categoria->getCategorias(); 
                $data['valor_mensaje'] = 2;
                $data['mensaje'] = "¡Usted no se encuentra registrado!";
                $this->load->view('registro', $data);
                }
            
            
        }
        
      
    }
    }

    /*
      function logout()
      {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      redirect('home', 'refresh');
      } */
}

?>