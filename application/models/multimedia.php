<?php

Class Multimedia extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getNumImagenes($idProducto) {
        $sql = "SELECT id_multimedia FROM multimedia  WHERE fk_producto = ?";
        $query = $this->db->query($sql,array($idProducto));
        //$query = $this->db->get();
        
        return $query->num_rows();
    }

}

?>