<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Created on Aug 26, 2011 by Damiano Venturin @ Squadra Informatica

class Rest_Client extends CI_Controller { 

    public function __construct() {
        parent::__construct();

        // Load the configuration file
        $this->load->config('rest');

        // Load the rest client
        $this->load->spark('restclient/2.0.0');
        
        $this->rest->initialize(array('server' => 'http://localhost/amazonas/index.php/api/'));
    }

    function metodos() {

        $palabra = $this->input->post('palabra');
        $this->session->set_userdata('idUsuario', $this->input->post('idUsuario'));
        $this->session->set_userdata('nombreUser', $this->input->post('nombreUser'));

        if ($palabra == "") {
            $data['mensaje'] = "Campo Palabra(Obligatorio) vacío.";
        
            $data['idUsuario'] = $this->session->userdata('idUsuario');
            $data['nombreUser'] = $this->session->userdata('nombreUser');

            $this->load->helper('form');
            $this->load->view('buscadorapi', $data);
        } else {

            if ($this->input->post('nropagina') == null && ($this->input->post('nroporpagina') == null)) {
                //Por Palabra
                $this->buscar_palabra();
            }

            if ($this->input->post('nropagina') != null && ($this->input->post('nroporpagina') == null)) {
                //Por Nro. Página    
                $this->buscar_palabra_por_nropagina();
            }

            if ($this->input->post('nropagina') == null && ($this->input->post('nroporpagina') != null)) {
                //Por Nro. Por Página
                $this->buscar_palabra_por_nroporpagina();
            }

            if ($this->input->post('nropagina') != null && ($this->input->post('nroporpagina') != null)) {
                //Por Nro. Pagina y Nro.Por Página
                $this->buscar_palabra_por_ambas();
            }
        }
    }

    public function buscar_palabra() {

        $palabra = $this->input->post('palabra');
        $cadena = "buscar_palabra/palabra/" . $palabra . "/format/json";
        $data['salida'] = $this->rest->get($cadena);
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->helper(array('form'));
        $this->load->view('buscadorapi', $data);
    }

    public function buscar_palabra_por_nropagina() {
        $palabra = $this->input->post('palabra');
        $nropagina = $this->input->post('nropagina');
        $cadena = "buscar_palabra_por_nropagina/palabra/" . $palabra . "/nropagina/". $nropagina. "/format/json";
        $data['salida'] = $this->rest->get($cadena);
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->helper(array('form'));
        $this->load->view('buscadorapi', $data);
    }

    public function buscar_palabra_por_nroporpagina() {
        $palabra = $this->input->post('palabra');
        $nroporpagina = $this->input->post('nroporpagina');
        $cadena = "buscar_palabra_por_nroporpagina/palabra/" . $palabra . "/nroporpagina/". $nroporpagina. "/format/json";
        $data['salida'] = $this->rest->get($cadena);
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->helper(array('form'));
        $this->load->view('buscadorapi', $data);
        
    }

    public function buscar_palabra_por_ambas() {
        $palabra = $this->input->post('palabra');
        $nropagina = $this->input->post('nropagina');
        $nroporpagina = $this->input->post('nroporpagina');
        $cadena = "buscar_palabra_por_ambas/palabra/" . $palabra . "/nropagina/". $nropagina. "/nroporpagina/". $nroporpagina. "/format/json";
        $data['salida'] = $this->rest->get($cadena);
        $data['idUsuario'] = $this->session->userdata('idUsuario');
        $data['nombreUser'] = $this->session->userdata('nombreUser');
        $this->load->helper(array('form'));
        $this->load->view('buscadorapi', $data);
        
    }

}
