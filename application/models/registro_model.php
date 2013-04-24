<?php

class Registro_model extends CI_Model {
	
	function __construct () {
		parent::__construct();
	}

	/**
	 * Validates the existence of an username and its password.
	 *
	 * @access   public
	 * @return   boolean
	 */
	function validate($email)
	{ 
            
            
		$this->db->where('correo', $email);
		$this->db->where('estado_usuario',"activo");
                
		$query = $this->db->get('usuario');
          	
		if($query->num_rows == 1)
		{
			return 1;
                }else{
                    
                    
                    
                    $this->db->where('correo', $email);
                    $query = $this->db->get('usuario');
                    
                    if($query->num_rows == 1){
                        
                        return 0;
                    } else{
                        return 2;
                        
                    }
             
       
                }
        }
	
	
	/**
	 * Creates a member with all the attibutes put 
	 * in the form by the user and an activation code.
	 *
	 * @access   public
	 * @return   BD query
	 */
	function create_member()
	{
            $fecha_sistema = date("Y-m-d");
         

		$this->load->helper('string');
		$new_member_insert_data = array(
			'nombre' => $this->input->post('textfield_nombre'),
			'apellido' => $this->input->post('textfield_apellido'),
                    
                    'cedula' => $this->input->post('textfield_cedula'),
                    
                    'correo' => $this->input->post('textfield_correo'),
                    
                    'fecha_nac' => $this->input->post('datepicker'),
                    
                     
                    'estado_usuario' => "inactivo",
                    
                    
                    'fecha_registro ' => $fecha_sistema,
                    
                    
                    'zona_postal' => $this->input->post('textfield_codigo'),
                    
                
                    'direccion' => $this->input->post('textfield_direccion'),
                    
                  
                    
                
			'codigo_activacion' => random_string('alnum',20)	
                   					
		);
		$insert = $this->db->insert('usuario', $new_member_insert_data);
                
                //log_message("error", "User Already Exists");
		return $insert;
	}
	
	/**
	 * Gets gets all of user data
	 *
	 * @access   public
	 * @return   BD row
	 */
	function getUserInfo($nombre){
		$this->db->select('*');
		$this->db->where('nombre', $nombre);
		$query = $this->db->get('usuario');
		return $query;
	}
	
	/**
	 * Gets the activation code for an user
	 *
	 * @access   public
	 * @params   string
	 * @return   boolean
	 */
	function getActivationCode($nombre) {
		$query = $this->getUserInfo($nombre);
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row) {
					return $row->codigo_activacion;
				}
		}
		return '';
	}
	
	/**
	 * Validates if the activation code supplied by the user 
	 * is the same registered in the Database.
	 *
	 * @access   public
	 * @params   string, string
	 * @return   boolean
	 */
	function confirm_registration($nombre, $codigo_activacion) {
		if ($codigo_activacion == $this->getActivationCode($nombre)){
			$data = array(
			'estado_usuario' => 'activo'						
			);
			$this->db->where('nombre', $nombre);
			$this->db->update('usuario', $data); 
                        
                        log_message('info', 'El '.$codigo_activacion.' actializó el usuario '. $nombre.' correctamente.');
                        
			return true;
		}
		return false;
	}
	
	/**
	 * Checks if the user's account has been activated.
	 *
	 * @access   public
	 * @params   string
	 * @return   boolean
	 */
	function user_activated($nick){
		$query = getUserInfo($nick);
		
		if($query->num_rows == 1)
		{
			foreach ($query->result() as $row) {
				if ($row->account_status == '1'){
					return true;
				} else return false;
			}
		}
		return false;
	}
}

/* End of file destiny_model.php */
/* Location: /home/public_html/codeigniter/application/models/membership_model.php */