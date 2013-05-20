<?php

class Calificacion_Model extends CI_Model {
	
	function __construct () {
		parent::__construct();
               
	}

                
function agregar_calificacion($calificacion, $comentario, $fk_pedido, $fk_usuario)
	{
    
        $this->db->where('fk_detalle_pedido', $fk_pedido);
        $this->db->where('fk_usuario', $fk_usuario);
        $query = $this->db->get('calificacion');
        
          	
        if($query->num_rows == 1){
            $insert = false;
        } else{
            
            $fecha_sistema = date("Y-m-d");
         
		$this->load->helper('string');
		$nueva_calificacion = array(
			'la_calificacion' => $calificacion,
			'comentario' => $comentario,           
                        'fecha' => $fecha_sistema,
                        'fk_detalle_pedido' => $fk_pedido,
                        'fk_usuario' => $fk_usuario,                    					
		);
                
           $insert = $this->db->insert('calificacion', $nueva_calificacion);     
        }
     
return $insert;        
	}
        
       
}
