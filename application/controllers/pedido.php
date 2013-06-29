<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pedido extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('pedido_model');
        $this->load->model('carro_model');
        $this->load->helper(array('form'));
        $this->load->library('cart');
        $this->load->model('producto_model');
        $this->load->model('formadepago_model');
		$this->load->model('compra_model');
    }

    public function index() {
        
    }
    
    
   /*public function carritoDeCompras($idProducto, $idUsuario=null, $nombreUser=null) {
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
    */
    
    
    public function pagarPedido($idUsuario=null, $nombreUser=null) {
        $idFormadepago = $this->input->post('radio');
        
        $fecha = date('Y-m-d');
        //var_dump($fecha);
        $montoTotal = $this->cart->total();
        //var_dump($montoTotal);
        
        $idPedido = $this->pedido_model->registrar_pedido($idFormadepago,$fecha, $montoTotal);
        
        if ($this->pedido_model->registrar_detalle_pedido($idPedido, $this->cart->contents(), $this->cart->total_items(), $montoTotal) == true) {
            $data['idUsuario'] = $this->input->post('idUsuario');
            $data['nombreUser'] = $this->input->post('nombreUser');
            $data['mensaje'] = "Su compra fue realizada con éxito.";
            $this->cart->destroy();

            $this->load->view('aviso', $data);
        } else {
            $data['idUsuario'] = $this->input->post('idUsuario');
            $data['nombreUser'] = $this->input->post('nombreUser');
            $data['mensaje'] = "Ha ocurrido un error. Intente de nuevo por favor.";
            $this->cart->destroy();

            $this->load->view('aviso', $data);
        }
        
        
        /*
        foreach ($this->cart->contents() as $items):
            echo $items['id'];             
        endforeach;
        */

        //$idProducto = $this->input->post('idProducto');
        //var_dump($idProducto);
        
    }
	
	
	
	
	public function consultarCompras(){
        
                $fk_usuario = $this->session->userdata('fk_usuario');               
                $this->compra_model->consultarCompras($fk_usuario);
               redirect(base_url('movil#pg3','refresh'));
    }
    
    

}

?>