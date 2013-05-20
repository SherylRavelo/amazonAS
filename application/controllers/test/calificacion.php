<?php
 
class Calificacion extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('calificacion_model');
    }
    
             
    public function test_agregar_calificacion(){
        $test_name = "Agregar calificacion a producto";
        $calificacion = 4;
        $comentario = "Buen producto";
        $fk_pedido = 1;
        $fk_usuario = 2;
        $booleano = $this->calificacion_model->agregar_calificacion($calificacion, $comentario, $fk_pedido, $fk_usuario);
        $this->unit->run($booleano, true, $test_name);
        echo $this->unit->report();
    }
    
    
}