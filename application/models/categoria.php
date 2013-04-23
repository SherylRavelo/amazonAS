<?php
Class Categoria extends CI_Model {
 function getCategorias()
 {
   $this -> db -> select('id_categoria, nombre, descripcion, tipo_categoria');
   $this -> db -> from('categoria');
   $query = $this -> db -> get(); 
   
   //$categorias['0']='';
   $categorias = array();
        foreach($query->result_array() as $row)
        {
            $categorias[$row['id_categoria']]=$row['nombre'];
        };
   

   //return $query->result();   
   return $categorias;   
 }
}
?>