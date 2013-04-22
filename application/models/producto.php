<?php
Class Producto extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getProductos($limit, $start) {
        $this->db->limit($limit,$start);
        $this->db->select('id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto');
        $this->db->from('producto, detalle_producto ');
        $this->db->where('id_producto = fk_producto');
        $query = $this->db->get();

        return $query->result(); 
    }

    function getNumProducto() {
        return $this->db->count_all('producto');
    }
    
}
?>