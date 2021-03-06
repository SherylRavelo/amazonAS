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

     function soap_productos($url, $busqueda='', $pagina='1', $numArticulo=999) {
         
        
        $parametros = array(
            'busqueda'=>$busqueda,
            'pagina'=>$pagina,
            'numArticulo'=>$numArticulo,
        );
        
        
        $soapclient = new soapclient($url);
        ob_start();
        $soapclient->call( "BusquedaProducto"  ,$parametros);
        $content= ob_get_clean();
        
        $ret=xml2Array($content);
        
        $result=$ret["s:Envelope"]["s:Body"]["BusquedaProductoResponse"]["BusquedaProductoResult"]["a:Producto"];
        
        $ret=array();
        foreach ($result as $key => $value) {
            $categoria_nombre=($value['a:Categoria']["a:Nombre"]);
            $categoria_id=($value['a:Categoria']["a:Id"]);
            $cantidad=($value['a:Cantidad']);
            $descripcion=($value['a:Descripcion']);
            $id=($value['a:Id']);
            $imagenDetalle=($value['a:ImagenDetalle']);
            $imagenMiniatura=($value['a:ImagenMiniatura']);
            $nombre=($value['a:Nombre']);
            $precio=($value['a:Precio']);
            $ret[]=array(
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'categoria_nombre'=>$categoria_nombre,
                    'categoria_id'=>$categoria_id,
                    'descripcion'=>$descripcion,
                    'cantidad'=>$cantidad,
                    'imagenDetalle'=>$imagenDetalle,
                    'imagenMiniatura'=>$imagenMiniatura,
                    'precio'=>$precio
                );
        }
        return $ret;
        
    }
    public function syncSoap(){
        $this->load->library("NuSoap");
        $this->load->library("xml2array");

        $busqueda=$this->input->post('palabra_clave');
        $productos=$this->soap_productos("http://localhost/wsdl?wsdl",$busqueda);
        
        
        foreach ($productos as $producto) {
            $imgDetalle="http://localhost".$producto['imagenDetalle'];
            $imgThumb="http://localhost".$producto['imagenMiniatura'];
            $uname=$producto['nombre'].'_'.$producto['id'];
            $data=array(
                'precio_unit'=>$producto['precio'],
                'cantidad'=>$producto['cantidad'],
                'nombre'=>$uname,
                'descripcion'=>$producto['descripcion'],
                'detalle'=>'N/A',
                'stock'=>'si',
                'estado_producto'=>'nuevo',
            );
            if(  $this->producto_model->getNumProductoByPalabra(array($uname)) <= 0){
                $fk_producto=$this->producto_model->insertar($data);
                $this->producto_model->insertarDetalleVacio($fk_producto);
                
            }
        }
    }
    
    public function index() {

        $this->syncSoap();
        /* Inicializar la sesion */
        $this->session->unset_userdata('estadoProducto');
        $this->session->unset_userdata('categoria');
        $this->session->unset_userdata('min');
        $this->session->unset_userdata('max');
        $this->session->unset_userdata('palabra');
        
        
        /* Cliente */
        $this->session->set_userdata('idUsuario', $this->input->post('idUsuario'));
        $this->session->set_userdata('nombreUser', $this->input->post('nombreUser'));
        //var_dump("ID USER = ".$this->input->post('idUsuario'));
        
        $palabra_clave = $this->input->post('palabra_clave');
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
        if ($palabra_clave != '') {
            $this->session->set_userdata('palabra', $palabra_clave);
            $opcion = 4;
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
                $this->productos_por_palabra();
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
            
            $multimedia = $this->multimedia->getImagen($data['lista'][$cont]->id_producto);
            if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $value->foto = $nombre_imagen.".".$tipo_imagen;
            } else {
                $value->foto = 'img_no_available.jpg';
            }
            
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
            
            $multimedia = $this->multimedia->getImagen($data['lista'][$cont]->id_producto);
            if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $value->foto = $nombre_imagen.".".$tipo_imagen;
            } else {
                $value->foto = 'img_no_available.jpg';
            }
            
            
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
            
            $multimedia = $this->multimedia->getImagen($data['lista'][$cont]->id_producto);
            if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $value->foto = $nombre_imagen.".".$tipo_imagen;
            } else {
                $value->foto = 'img_no_available.jpg';
            }
            
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
            
            $multimedia = $this->multimedia->getImagen($data['lista'][$cont]->id_producto);
            if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $value->foto = $nombre_imagen.".".$tipo_imagen;
            } else {
                $value->foto = 'img_no_available.jpg';
            }
            
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);
    }
    
    
    
    public function productos_por_palabra()
    {
        $palabras_clave = $this->session->userdata('palabra');
        
        $palabras = preg_split("/[\s,]+/",$palabras_clave);
        //var_dump("CAT = ".$cat);
        
        
        //$hey = $this->producto_model->getProductosByPalabra(10, 0, $palabras);
        
        $opciones = array();
        $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //var_dump($this->uri->segment(3));
        $opciones['per_page'] = 10;
        $opciones['base_url'] = base_url().'buscar/productos_por_palabra';
        $opciones['num_links'] = 5;
        $opciones['cur_tag_open'] = "<b>";
        $opciones['cur_tag_close'] = '</b>';
        $opciones['next_link'] = '&gt';
        $opciones['first_link'] = '<<';
        $opciones['last_link'] = '>>';
        
        //var_dump($this->producto->getNumProducto());
        $cant_productos = $this->producto_model->getNumProductoByPalabra($palabras);
        $opciones['total_rows'] = $cant_productos;
        $opciones['uri_segment'] = 3;

        /*
        var_dump("Cant producto = ".$cant_productos);
        var_dump("Estado = ".$this->aux_estado);
        */
        
        $this->pagination->initialize($opciones);
        
        
        //var_dump($this->producto->getProductos($opciones['per_page'], $desde));
        $data['lista'] = $this->producto_model->getProductosByPalabra($opciones['per_page'], $desde, $palabras);
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
            
            $multimedia = $this->multimedia->getImagen($data['lista'][$cont]->id_producto);
            if ($multimedia != null) {
                $nombre_imagen = $multimedia[0]->nombre;
                $tipo_imagen = $multimedia[0]->tipo;

                $value->foto = $nombre_imagen.".".$tipo_imagen;
            } else {
                $value->foto = 'img_no_available.jpg';
            }
            
            $cont = $cont +1;
            //var_dump($cont);
        }
        
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->view('buscar', $data);
    }
	
	
	
	
	
	public function buscar_producto_movil(){
       
        $palabra = $this->input->post('palabra_clave');
         
         $this->session->set_userdata(array('palabra' => $palabra));
              
        $palabras = preg_split("/[\s,]+/",$palabra);
        
        
        
        $this->session->set_userdata(array('paginanro' => 1));
       
        $this->producto_model->getProductosByPalabraMovil(20, 0, $palabras, 1);
        
        
        
        redirect(base_url('movil#pg5','refresh'));
        
    }
    
    
    
    
    
    
    public function buscar_producto_movil_adelante(){
             
         $palabra = $this->session->userdata('palabra');
           
        $palabras = preg_split("/[\s,]+/",$palabra);
        
       $pagina =  $this->session->userdata('paginanro');
        
       $nuevaPagina = $pagina+1;
    
        
         $this->session->set_userdata(array('paginanro' => $nuevaPagina));
        
         
        $this->producto_model->getProductosByPalabraMovil(20, 0, $palabras, $nuevaPagina);
        
        
        
        redirect(base_url('movil#pg5','refresh'));
        
    }
    
    
    
    
    

     public function buscar_producto_movil_atras(){
        
         
         $palabra = $this->session->userdata('palabra');
         
         echo $palabra;
              
        $palabras = preg_split("/[\s,]+/",$palabra);
        
       $pagina =  $this->session->userdata('paginanro');
        
       $nuevaPagina = $pagina-1;
        
        
         $this->session->set_userdata(array('paginanro' => $nuevaPagina));
        
        
        $this->producto_model->getProductosByPalabraMovil(20, 0, $palabras, $nuevaPagina);
        
           
        redirect(base_url('movil#pg5','refresh'));
        
    }
    
    
	
    
    
}


