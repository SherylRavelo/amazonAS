<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pedido extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('carro_model');
        $this->load->helper(array('form'));
    }

    public function index() {
        
    }
    
    
    public function carritoDeCompras($idProducto, $idUsuario=null, $nombreUser=null) {
        $data = array();
        if ($idUsuario != null) {

            $this->carro_model->insertCarro($idUsuario, $idProducto);


            $data['idUsuario'] = $idUsuario;
            $data['nombreUser'] = $nombreUser;
            $data['mensaje'] = "Se agregó el producto #". $idProducto ." al carrito correctamente ";
            
            $this->load->view('aviso', $data);
           // print_r("Se añadió al carrito");

            //$this->load->view('buscar', $data);
        } else {
            $data['idUsuario'] = null;
            $data['nombreUser'] = null;
            $data['mensaje'] = "Necesita ingresar al sistema para poder usar el carrito de compra ";
            
            $this->load->view('aviso', $data);
            //print_r("Necesita ingresar al sistema para poder usar el carrito de compra");
        }
    }
    
    
    

}

?>