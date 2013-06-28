<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Producto extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
        $this->load->model('formadepago_model');
        $this->load->model('multimedia');
        $this->load->helper(array('form'));
        $this->load->library('javascript');
        $this->load->library('cart');
        //$this->load->library('jquery');
    }

    public function index() {
        
        //$data['categorias'] = $this->categoria->getCategorias(); 
        $this->load->view('producto/ver_producto');
            
        
    }
    
    public function viewProducto($id, $idUsuario=null, $nombreUser=null) {
         
        //$array_producto = new Producto_Model();
        $array_producto = $this->producto_model->getProductosById($id);
        $data = array();
        $data['nombreProducto'] = $array_producto[0]->nombre;
        $data['idProducto'] = $id;
        $data['descripcion'] = $array_producto[0]->descripcion;
        $data['detalle'] = $array_producto[0]->detalle;
        $data['precio'] = $array_producto[0]->precio_unit;
        $data['estado'] = $array_producto[0]->estado_producto;
        $data['cantidad'] = $array_producto[0]->cantidad;
        $data['color'] = $array_producto[0]->color;
        $data['marca'] = $array_producto[0]->marca;
        $data['modelo'] = $array_producto[0]->modelo;
        $data['peso'] = $array_producto[0]->peso;
        $data['largo'] = $array_producto[0]->largo;
        $data['alto'] = $array_producto[0]->alto;
        $data['ancho'] = $array_producto[0]->ancho; 
        
        $data['numFotos'] = $this->multimedia->getNumImagenes($id);
        
        $multimedia = $this->multimedia->getImagen($id);
        if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $data['imagen'] = $nombre_imagen.".".$tipo_imagen;
        } else {
            $data['imagen'] = 'img_no_available.jpg';
        }
        
        $data['idUsuario'] = $idUsuario;
        $data['nombreUser'] = $nombreUser;
        
        $this->load->view('producto/ver_producto',$data);
            
        
    }
    
    
    public function carritoDeCompras($idUsuario=null, $nombreUser=null, $idProducto=null) {
        $data = array();
        /*
        if ($idProducto == null) {
            $idProducto = $idProducto->id;
            var_dump($idProducto);
        } */
        
        if ($idUsuario != null) {
            $array_formadepago = $this->formadepago_model->getFormadepago($idUsuario);
            
            if ($array_formadepago != null) {
                
                $array_producto = $this->producto_model->getProductosById($idProducto);
            
                $nombre = @ereg_replace("[^A-Za-z0-9 ]", "", $array_producto[0]->nombre);
                //var_dump($nombre);
                if ($idProducto != null) {
                $data = array(
                    'id' => $idProducto,
                    'qty' => 1,
                    'price' => $array_producto[0]->precio_unit,
                    'name' => $nombre
                );

                $this->cart->insert($data);
                }
                $data['idUsuario'] = $idUsuario;
                $data['nombreUser'] = $nombreUser;
                $data['formadepago'] = $array_formadepago;

                
                //var_dump($data);
                $this->load->view('producto/ver_carrito', $data);
            } else {
                $data['idUsuario'] = null;
                $data['nombreUser'] = null;
                $data['mensaje'] = "Debe asignar una tarjeta de crédito para poder ver el carrito de compras.";

                $this->load->view('aviso', $data);
            }
            
        } else {
            $data['idUsuario'] = null;
            $data['nombreUser'] = null;
            $data['mensaje'] = "Necesita ingresar al sistema para poder usar el carrito de compra ";
            
            $this->load->view('aviso', $data);
            //print_r("Necesita ingresar al sistema para poder usar el carrito de compra");
        }
    }
    
    
    

}