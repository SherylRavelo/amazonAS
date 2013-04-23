<?php

Class Usuario_Model extends CI_Model {
    
    private $email = '';
    private $nombre = '';
    private $apellido = '';
    private $fecha_nac = '';
    private $fecha_registro = '';
    private $direccion = '';
    private $zona_postal = '';
    private $id_usuario = '';
    private $estado_usuario = '';
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function getId_user() {
        return $this->id_usuario;
    }

    public function setId_user($id_usuario) {
        $this->id_usuario = $id_usuario;
    }
    
    public function getFechaNac() {
        return $this->fecha_nac;
    }

    public function setFechaNac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    public function setFechaRegistro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getZonaPostal() {
        return $this->zona_postal;
    }

    public function setZonaPostal($zona_postal) {
        $this->zona_postal = $zona_postal;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    public function getEstadoUsuario() {
        return $this->estado_usuario;
    }

    public function setEstadoUsuario($estado_usuario) {
        $this->estado_usuario = $estado_usuario;
    }

    /*
    function login($username, $password) {
        $this->db->select('id_usuario, username, password');
        $this->db->from('usuario');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        //$this -> db -> where('password', MD5($password)); 
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    */
    
    public function getUser($idUsuario) {
        $this->db->where('id_usuario', $idUsuario);
        $query = $this->db->get('usuario');
        $row2 = $query->row();

        $this->setNombre($row2->nombre);
        $this->setApellido($row2->apellido);
        $this->setEmail($row2->correo);
        $this->setId_user($row2->id_usuario);
        $this->setFechaNac($row2->fecha_nac);
        $this->setFechaRegistro($row2->fecha_registro);
        $this->setDireccion($row2->direccion);
        $this->setZonaPostal($row2->zona_postal);

        return $row2;
    }
    
    function getUsuarioByEmail($mail) {
        $sql = "SELECT id_usuario, nombre, apellido, correo, fecha_nac, fecha_registro, direccion, estado_usuario, zona_postal, fk_lugar ";
        $sql .= "FROM usuario ";
        $sql .= "WHERE correo = ? ";
        $query = $this->db->query($sql,array($mail));
        
        return $query->result(); 
    }

}

?>