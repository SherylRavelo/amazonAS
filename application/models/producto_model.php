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
    
    function insertarDetalleVacio($fk_producto){
        
        $this->db->insert('detalle_producto', array(
                        'fk_producto'=>$fk_producto
            )); 
        return $this->db->insert_id();
    }

    function insertar($data){
        $this->db->insert('producto', $data); 
        return $this->db->insert_id();
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
        
        //var_dump("minimo = ".$min);
        //var_dump("maximo = ".$max);
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
    
    
    function getProductosByPalabra($limit, $start, $words) {
        $sql = "SELECT id_producto, nombre, descripcion, detalle, stock, precio_unit, cantidad, estado_producto, id_detalle, color, marca, modelo, peso, largo, ancho, alto ";
        $sql .= "FROM producto as p, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto and (nombre like '%$words[0]%'";
        foreach ($words as $i => $word) {
            $k = (int)$i;
            if ($k > 0) {
                $sql .= " || nombre like '%$word%' ";
            }
        }
        $sql .= ") LIMIT ? , ? ";
        
        $query = $this->db->query($sql,array((int)$start,$limit));
        
        return $query->result(); 
    }
    
    function getNumProductoByPalabra($words) {
        $sql = "SELECT id_producto ";
        $sql .= "FROM producto as p, detalle_producto ";
        $sql .= "WHERE id_producto = fk_producto and (nombre like '%$words[0]%'";
        foreach ($words as $i => $word) {
            $k = (int)$i;
            if ($k > 0) {
                $sql .= " || nombre like '%$word%' ";
            }
        }
        $sql .= ") ";
        
        $query = $this->db->query($sql);
        
        return $query->num_rows();
    }
	
	
	
	
	public function getProductosByPalabraMovil($limit, $start, $words, $nropagina){
              $salida = $this->db->query('select p.id_producto, p.nombre as nombreProducto, p.precio_unit, p.estado_producto, m.nombre as nombreFoto from producto p, multimedia m where p.id_producto = m.fk_producto and p.id_producto<=5 and m.principal = "si"'); 
        $sql = "SELECT p.id_producto, p.nombre as nombreProducto, p.precio_unit, p.estado_producto, m.nombre as nombreFoto ";
        $sql .= "FROM producto p, multimedia m ";
        $sql .= "WHERE m.principal = 'si' and p.id_producto = m.fk_producto and (p.nombre like '%$words[0]%'";
        foreach ($words as $i => $word) {
            $k = (int)$i;
            if ($k > 0) {
                $sql .= " || p.nombre like '%$word%' ";
            }
        }
        $sql .= ") LIMIT ? , ? ";

        $query = $this->db->query($sql,array((int)$start,$limit));
        
        
        $resultado = $query->result_array();
       // var_dump($resultado);
       $nropagina = $nropagina+0;
         
         $inicio = ($nropagina*5)-5;
        // $fin = $inicio +5;
        
        $lista_final = array_slice($resultado, $inicio, 5);
        
        

        var_dump($lista_final);
        
        $this->session->set_userdata($lista_final);
        
    }
	
    
}
?>