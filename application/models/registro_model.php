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
	function create_member($nombre, $apellido, $cedula, $correo, $fecha_nac, $zona_postal, $direccion)
	{
            $fecha_sistema = date("Y-m-d");
         
		$this->load->helper('string');
		$new_member_insert_data = array(
			'nombre' => $nombre,
			'apellido' => $apellido,           
                    'cedula' => $cedula,
                    'correo' => $correo,
                    'fecha_nac' => $fecha_nac,
                    'estado_usuario' => "inactivo",
                    'fecha_registro ' => $fecha_sistema,
                    'zona_postal' => $zona_postal,
                    'direccion' => $direccion,
			'codigo_activacion' => random_string('alnum',20)	
                   					
		);
		$insert = $this->db->insert('usuario', $new_member_insert_data);
                
                
                $nombrelog = $this->input->post('textfield_nombre');
                $apellidolog = $this->input->post('textfield_apellido');
                
                
                
                log_message('info', 'Se ha registrado un nuevo usuario en el sistema: '.$nombrelog.' '.$apellidolog);
                
            
                if ($insert){
                return true;
                }else
                {
                    return false;
                }
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
                        
                        log_message('info', 'Con el codigo '.$codigo_activacion.' se confirmo el usuario '.$nombre.' correctamente.');
                        
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