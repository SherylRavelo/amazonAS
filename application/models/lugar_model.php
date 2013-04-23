<?php

Class Lugar_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getPaisEstadoCiudadByFkCiudad($fkCiudad) {
        $sql = "SELECT c.nombre as ciudad, c.tipo_lugar, e.nombre as estado, e.tipo_lugar, p.nombre as pais, p.tipo_lugar ";
        $sql .= "FROM lugar as p, (SELECT id_lugar, nombre, tipo_lugar, fk_lugar FROM lugar WHERE tipo_lugar='estado') as e, ";
        $sql .= "(SELECT id_lugar, nombre, tipo_lugar, fk_lugar FROM lugar WHERE tipo_lugar='ciudad') as c ";
        $sql .= "WHERE c.id_lugar = ? AND c.fk_lugar=e.id_lugar AND e.fk_lugar=p.id_lugar;";
        $query = $this->db->query($sql,array((int)$fkCiudad));
        //$query = $this->db->get();
        
        return $query->result();
    }
}

?>