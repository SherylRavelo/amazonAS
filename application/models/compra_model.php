<?php

Class Compra_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
     
    function getNumCompras($idUser) {
        
        $this->db->select('id_pedido');
		$this->db->where('fk_usuario', $idUser);
		$query = $this->db->get('pedido');
                return $query->num_rows();
    }

    function consultarCompras($idUser) {
        
      
        $salida = $this->db->query('select fecha_pedido, status from pedido where fk_usuario ='. $idUser); 
        
        $resultado = $salida->result_array();
              
                
         $this->session->set_userdata($resultado);
         
        $numCompras = $this->getNumCompras($idUser)-1;
        
        $this->session->set_userdata('numCompras', $numCompras);
           
        
    }
    
    
    
    
     function consultarTienda() {
        
      $salida = $this->db->query('select p.id_producto, p.nombre as nombreProducto, p.precio_unit, p.estado_producto, m.nombre as nombreFoto from producto p, multimedia m where p.id_producto = m.fk_producto and p.id_producto<=5 and m.principal = "si"'); 
   
        
        $resultado = $salida->result_array();
       
                
         $this->session->set_userdata($resultado);
         
        
        
    }

}

?>