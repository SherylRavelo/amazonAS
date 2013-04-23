<?php

Class Carro_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertCarro($id_user,$id_produc) {
        $data = array(
               'id_user' => (int)$id_user ,
               'id_product' => (int)$id_produc 
            );

         $this->db->insert('carro', $data);
    }

}

?>