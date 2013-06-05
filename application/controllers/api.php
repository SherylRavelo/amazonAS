<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {
    

    //Devuelve los 10 primeros productos encontrados. (Primera página)
    function buscar_palabra_get() {

        $palabras = preg_split("/[\s,]+/", $this->get('palabra'));
        $this->load->model('producto_model');


        $lista = $this->producto_model->getProductosByPalabra(10, 0, $palabras);

        if ($lista) {
                   
            $this->response($lista, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'No se encontraron productos para mostrar'), 404);
        }
    }

    //Devuelve productos de una determinada página (10 productos)
    function buscar_palabra_por_nropagina_get() {

        //Cantidad de productos por página
        $nropagina = $this->get('nropagina') + 0;

        $palabras = preg_split("/[\s,]+/", $this->get('palabra'));
        $this->load->model('producto_model');

        $num_productos = $this->producto_model->getNumProductoByPalabra($palabras);
        $lista = $this->producto_model->getProductosByPalabra($num_productos, 0, $palabras);


        if ($nropagina * 10 >= $num_productos) {

            $inicio = ($num_productos - ($num_productos % 10));
            $fin = $num_productos;
        } else {

            $inicio = (10 * $nropagina) - 10;
            $fin = $inicio + 10;
        }
        
       
        $lista_final = array_slice($lista, $inicio, 10);


        if ($lista_final) {
            $this->response($lista_final, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'No se encontraron productos para mostrar'), 404);
        }
    }

    //Devuelve los primeros N productos encontrados. (Primera página)
    function buscar_palabra_por_nroporpagina_get() {

        $inicio = $this->get('nroporpagina') + 0;

        $palabras = preg_split("/[\s,]+/", $this->get('palabra'));
        $this->load->model('producto_model');
        $lista = $this->producto_model->getProductosByPalabra($inicio, 0, $palabras);

        if ($lista) {
            $this->response($lista, 200); // 200 being the HTTP response code
            
            $this->load->view ('servicioweb');
            
            
        } else {
            $this->response(array('error' => 'No se encontraron productos para mostrar'), 404);
        }
    }

    //Devuelve los resultados de la página nropagina con cantidad de productos nroporpagina.
    function buscar_palabra_por_ambas_get() {

        $nropagina = $this->get('nropagina') + 0;
        $nroporpagina = $this->get('nroporpagina') + 0;
        $palabras = preg_split("/[\s,]+/", $this->get('palabra'));
        $this->load->model('producto_model');

        
        $num_productos = $this->producto_model->getNumProductoByPalabra($palabras);
        $lista = $this->producto_model->getProductosByPalabra($num_productos, 0, $palabras);



        if ($nropagina * $nroporpagina > $num_productos) {

            $num_paginas = ($num_productos / $nroporpagina);
            $otra = explode(".", $num_paginas);

            $inicio = ($otra[0] * $nroporpagina);
            $fin = $num_productos;
            
        } else {

            $inicio = ($nropagina * $nroporpagina) - $nroporpagina;
            $fin = $inicio + $nroporpagina - 1;
        }
        
       
        $lista_final = array_slice($lista, $inicio, $nroporpagina);

        if ($lista_final) {
            $this->response($lista_final, 200); // 200 being the HTTP response code
        } else {
            $this->response(array('error' => 'No se encontraron productos para mostrar'), 404);
        }
    }
    
    
}

?>