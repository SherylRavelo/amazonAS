<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Producto extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
        $this->load->model('multimedia');
        $this->load->helper(array('form'));
        $this->load->library('javascript');
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
    
    
    

}