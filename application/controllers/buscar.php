<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buscar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('producto_model');
        $this->load->model('multimedia');
        
        $this->load->helper(array('form'));
        $this->load->library('pagination');
        
    }

    public function index() {

        /* Inicializar la sesion */
        $this->session->unset_userdata('estadoProducto');
        $this->session->unset_userdata('categoria');
        $this->session->unset_userdata('min');
        $this->session->unset_userdata('max');
        
        /* Cliente */
        $this->session->set_userdata('idUsuario', $this->input->post('idUsuario'));
        $this->session->set_userdata('nombreUser', $this->input->post('nombreUser'));
        //var_dump("ID USER = ".$this->input->post('idUsuario'));
        
        $palabra_clave = explode(' ', $this->input->post('palabra_clave'));
        $estado_producto = $this->input->post('select_estado');
        $categoria = $this->input->post('id_categoria');
        $precio_min = $this->input->post('precio_min');
        $precio_max = $this->input->post('precio_max');
        $opcion = 0;
        if ($estado_producto != 0){
            $this->session->set_userdata('estadoProducto', $estado_producto);  
            $opcion = 1;
        }
        if ($categoria != 0) {
            $this->session->set_userdata('categoria', $categoria);
            $opcion = 2;
        } 
        if ($precio_min != '') {
            $this->session->set_userdata('min', $precio_min);
            $opcion = 3;
        }
        if ($precio_max != '') {
            $this->session->set_userdata('max', $precio_max);
            $opcion = 3;
        }
        
        switch ($opcion) {
            case 0:
                $this->productos();
                break;
            case 1:
                $this->productos_por_estado();
                break;
            case 2:
                $this->productos_por_categoria();
                break;
            case 3:
                $this->productos_por_precio();
                break;
            case 4:
                $this->productos_por_estado();
                break;
            default:
                break;
        }
        
    }
    
    /**
     * Productos() obtiene la paginación de todos los productos disponibles.
     * @author Sheryl Ravelo
     */
    public function productos() {

        $opciones = array();
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $opciones['per_page'] = 10;
        $opciones['base_url'] = base_url(). 'buscar/productos';
        $opciones['num_links'] = 5;
        $opciones['cur_tag_open'] = "<b>";
        $opciones['cur_tag_close'] = '</b>';
        $opciones['next_link'] = '&gt';
        $opciones['first_link'] = '<<';
        $opciones['last_link'] = '>>';
        
        //var_dump($this->producto->getNumProducto());
        $cant_productos = $this->producto_model->getNumProducto();
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        $this->pagination->initialize($opciones);

        //var_dump($this->producto->getProductos($opciones['per_page'], $desde));
        $data['lista'] = $this->producto_model->getProductos($opciones['per_page'], $desde);
        $data['paginacion'] = $this->pagination->create_links();

        $data['categorias'] = $this->categoria->getCategorias();
        $data['cantProductos'] = $cant_productos;
        
        //var_dump($this->uri->segment(3));
        //var_dump($cant_productos- $this->uri->segment(3));
        if ($this->uri->segment(3) == false) {
            $data['start'] = 1;
            $data['hasta'] = $opciones['per_page'];
        } else {
            $data['start'] = $this->uri->segment(3) + 1;
            if (($cant_productos- $this->uri->segment(3)) < $opciones['per_page'])
            {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'] + $this->uri->segment(3);
            }
            
        }
        
        $cont = 0;
        foreach ($data['lista'] as $value) {
            $value->cant_imagen = $this->multimedia->getNumImagenes($data['lista'][$cont]->id_producto);
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);

    }
    
    /**
     * Productos_por_estado()Obtiene la paginación de la búsqueda de 
     * productos por estado (nuevo, usado)
     * @author Sheryl Ravelo
     */
    public function productos_por_estado()
    {
        $select_estado = $this->session->userdata('estadoProducto');//$this->session->userdata('aux_estado');
        $aux_estado = "";
        if ($select_estado == '1') {
            $aux_estado = 'nuevo';
        } elseif ($select_estado == '2') {        
            $aux_estado  = 'usado';
        } 
        
        $opciones = array();
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $opciones['per_page'] = 10;
        $opciones['base_url'] = base_url().'buscar/productos_por_estado';
        $opciones['num_links'] = 5;
        $opciones['cur_tag_open'] = "<b>";
        $opciones['cur_tag_close'] = '</b>';
        $opciones['next_link'] = '&gt';
        $opciones['first_link'] = '<<';
        $opciones['last_link'] = '>>';
        
        $cant_productos = $this->producto_model->getNumProductoByEstado($aux_estado);
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        $this->pagination->initialize($opciones);

        $data['lista'] = $this->producto_model->getProductosByEstado($opciones['per_page'], $desde, $aux_estado);
        
        $data['paginacion'] = $this->pagination->create_links();

        $data['categorias'] = $this->categoria->getCategorias();
        $data['cantProductos'] = $cant_productos;
        
        if ($this->uri->segment(3) == false) {
            $data['start'] = 1;
            if ($cant_productos < $opciones['per_page']) {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'];
            }
            
        } else {
            $data['start'] = $this->uri->segment(3) + 1;
            if (($cant_productos- $this->uri->segment(3)) < $opciones['per_page'])
            {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'] + $this->uri->segment(3);
            }
            
        }
        
        $cont = 0;
        foreach ($data['lista'] as $value) {
            $value->cant_imagen = $this->multimedia->getNumImagenes($data['lista'][$cont]->id_producto);
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);
    }
    
    public function productos_por_precio()
    {
        $minimo = $this->session->userdata('min');
        $maximo = $this->session->userdata('max');
        
        $opciones = array();
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //var_dump($this->uri->segment(3));
        $opciones['per_page'] = 10;
        $opciones['base_url'] = base_url().'buscar/productos_por_precio';
        $opciones['num_links'] = 5;
        $opciones['cur_tag_open'] = "<b>";
        $opciones['cur_tag_close'] = '</b>';
        $opciones['next_link'] = '&gt';
        $opciones['first_link'] = '<<';
        $opciones['last_link'] = '>>';
        
        //var_dump($this->producto->getNumProducto());
        $cant_productos = $this->producto_model->getNumProductoByPrecio($minimo,$maximo);
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        /*
        var_dump("Cant producto = ".$cant_productos);
        var_dump("Estado = ".$this->aux_estado);
        */
        
        $this->pagination->initialize($opciones);

        //var_dump($this->producto->getProductos($opciones['per_page'], $desde));
        $data['lista'] = $this->producto_model->getProductosByPrecioMinMax($opciones['per_page'], $desde, $minimo, $maximo);
        //$data['lista'] = $this->producto->getProductosByEstado($opciones['per_page'], $desde);
        $data['paginacion'] = $this->pagination->create_links();

        $data['categorias'] = $this->categoria->getCategorias();
        $data['cantProductos'] = $cant_productos;
        
        //var_dump($this->uri->segment(3));
        //var_dump($cant_productos- $this->uri->segment(3));
        if ($this->uri->segment(3) == false) {
            $data['start'] = 1;
            if ($cant_productos < $opciones['per_page']) {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'];
            }
            
        } else {
            $data['start'] = $this->uri->segment(3) + 1;
            if (($cant_productos- $this->uri->segment(3)) < $opciones['per_page'])
            {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'] + $this->uri->segment(3);
            }
            
        }
        
        $cont = 0;
        foreach ($data['lista'] as $value) {
            $value->cant_imagen = $this->multimedia->getNumImagenes($data['lista'][$cont]->id_producto);
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);
    }
    
    public function productos_por_categoria()
    {
        $cat = $this->session->userdata('categoria');
        //var_dump("CAT = ".$cat);
        
        $opciones = array();
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //var_dump($this->uri->segment(3));
        $opciones['per_page'] = 10;
        $opciones['base_url'] = base_url().'buscar/productos_por_categoria';
        $opciones['num_links'] = 5;
        $opciones['cur_tag_open'] = "<b>";
        $opciones['cur_tag_close'] = '</b>';
        $opciones['next_link'] = '&gt';
        $opciones['first_link'] = '<<';
        $opciones['last_link'] = '>>';
        
        //var_dump($this->producto->getNumProducto());
        $cant_productos = $this->producto_model->getNumProductoByCategoria($cat);
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        /*
        var_dump("Cant producto = ".$cant_productos);
        var_dump("Estado = ".$this->aux_estado);
        */
        
        $this->pagination->initialize($opciones);

        //var_dump($this->producto->getProductos($opciones['per_page'], $desde));
        $data['lista'] = $this->producto_model->getProductosByCategoria($opciones['per_page'], $desde, $cat);
        //$data['lista'] = $this->producto->getProductosByEstado($opciones['per_page'], $desde);
        $data['paginacion'] = $this->pagination->create_links();

        $data['categorias'] = $this->categoria->getCategorias();
        $data['cantProductos'] = $cant_productos;
        
        //var_dump($this->uri->segment(3));
        //var_dump($cant_productos- $this->uri->segment(3));
        if ($this->uri->segment(3) == false) {
            $data['start'] = 1;
            if ($cant_productos < $opciones['per_page']) {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'];
            }
            
        } else {
            $data['start'] = $this->uri->segment(3) + 1;
            if (($cant_productos- $this->uri->segment(3)) < $opciones['per_page'])
            {
                $data['hasta'] = $cant_productos;
            } else {
                $data['hasta'] = $opciones['per_page'] + $this->uri->segment(3);
            }
            
        }
        
        $cont = 0;
        foreach ($data['lista'] as $value) {
            $value->cant_imagen = $this->multimedia->getNumImagenes($data['lista'][$cont]->id_producto);
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);
    }

}