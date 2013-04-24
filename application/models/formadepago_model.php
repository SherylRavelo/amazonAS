<?php

Class Formadepago_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getFormaDePago($idUsuario) {
        $sql = "id_formadepago, num_tarjeta_credito, fecha_venc, marca, cod_tarjeta, nombre_tarjeta, documento_identidad ";
        $sql .= "FROM forma_de_pago ";
        $sql .= "WHERE fk_usuario = ? ";
        $query = $this->db->query($sql,array($idUsuario));
        
        return $query->result(); 
    }

}

?>