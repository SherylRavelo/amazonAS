<?php
Class Producto_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getProductos($limit, $start, $estado=null) {
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
    
    function getProductosByEstado($limit, $start, $estado) {
        $sql = "SELECT id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto and estado_producto = ? LIMIT ? , ? ";
        $query = $this->db->query($sql,array($estado,(int)$start,$limit));
        
        return $query->result(); 
    }
    
    function getNumProductoByEstado($estado) {
        $sql = "SELECT id_producto FROM producto, detalle_producto WHERE id_producto = fk_producto and estado_producto = ?";
        $query = $this->db->query($sql,array($estado));
        
        return $query->num_rows();
    }
    
    function getProductosByPrecioMinMax($limit, $start, $min, $max) {
        $sql = "SELECT id_producto id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto ";
        //$sql .= "order by precio_unit asc;";
        $query = null;
        
        var_dump("minimo = ".$min);
        var_dump("maximo = ".$max);
        if ($min != '' and $max != '') {
            $sql .= "and precio_unit > ? and precio_unit < ? ";
            $sql .= "order by precio_unit asc LIMIT ? , ? ";
            $query = $this->db->query($sql,array((int)$min,(int)$max,(int)$start,$limit));
        } elseif ($min != '') {
            $sql .= "and precio_unit > ? ";
            $sql .= "order by precio_unit asc LIMIT ? , ? ";
            $query = $this->db->query($sql,array((int)$min,(int)$start,$limit));
        } elseif ($max != '') {
            $sql .= "and precio_unit < ? ";
            $sql .= "order by precio_unit asc LIMIT ? , ? ";
            $query = $this->db->query($sql,array((int)$max,(int)$start,$limit));
        }
            
        return $query->result(); 
    }
    
    function getNumProductoByPrecio($min, $max) {
        $sql = "SELECT id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto ";
        //$sql .= "order by precio_unit asc;";
        $query = null;
        if ($min != '' and $max != '') {
            $sql .= "and precio_unit > ? and precio_unit < ? ";
            $sql .= "order by precio_unit asc ";
            $query = $this->db->query($sql,array((int)$min,(int)$max));
        } elseif ($min != '') {
            $sql .= "and precio_unit > ? ";
            $sql .= "order by precio_unit asc ";
            $query = $this->db->query($sql,array((int)$min));
        } elseif ($max != '') {
            $sql .= "and precio_unit < ? ";
            $sql .= "order by precio_unit asc ";
            $query = $this->db->query($sql,array((int)$max));
        }
        
        return $query->num_rows();
    }
    
    
    function getProductosByCategoria($limit, $start, $cat) {
        $sql = "SELECT id_producto, p.nombre, p.descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto as p, detalle_producto, categoria ";
        $sql .= "WHERE id_producto = fk_producto and id_categoria = fk_categoria and id_categoria = ? LIMIT ? , ? ";
        $query = $this->db->query($sql,array((int)$cat,(int)$start,$limit));
        
        return $query->result(); 
    }
    
    function getNumProductoByCategoria($cat) {
        $sql = "SELECT id_producto ";
        $sql .= "FROM producto, detalle_producto, categoria ";
        $sql .= "WHERE id_producto = fk_producto and id_categoria = fk_categoria and id_categoria = ? ";
        $query = $this->db->query($sql,array($cat));
        
        return $query->num_rows();
    }
    
    function getProductosById($idProducto) {
        $sql = "SELECT id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto and id_producto = ? ";
        $query = $this->db->query($sql,array((int)$idProducto));
        
        return $query->result(); 
    }
    
}
?>