<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buscar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categoria');
        $this->load->model('producto');
        $this->load->model('multimedia');
    }

    public function index() {

        $this->productos();
      
    }
    
    public function productos() {

        $this->load->helper(array('form'));

        $this->load->library('pagination');

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
        $cant_productos = $this->producto->getNumProducto();
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        $this->pagination->initialize($opciones);

        //var_dump($this->producto->getProductos($opciones['per_page'], $desde));
        $data['lista'] = $this->producto->getProductos($opciones['per_page'], $desde);
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
        
        
        $this->load->view('buscar', $data);

    }

}