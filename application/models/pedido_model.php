<?php

Class Pedido_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    
    function registrar_pedido($idFormadepago, $fechaPedido, $montoTotal){
        
		$this->load->helper('string');
                $idDestino = $this->registrar_destino();
                
		$pedido = array(
			'fecha_pedido' => $fechaPedido,
			'monto_total' => $montoTotal,
                        'status' => 'Entregado',
                        'fecha_envio' => $fechaPedido,
                        'fecha_entrega' => $fechaPedido,
                        'fk_formadepago' => $idFormadepago,
                        'fk_destino' => $idDestino,
                        'fk_transporte' => 1
                 );
           
		$this->db->insert('pedido', $pedido);
                log_message('info', 'Se registro el pedido con id: '.$this->db->insert_id());
                
		return $this->db->insert_id();
        
    }
    
    function registrar_destino(){
        
		$destino = array(
			'direccion' => 'El Valle, San Antonio',
			'fk_lugar' => 26
                 );     
		$this->db->insert('destino', $destino);
                log_message('info', 'Se registro el destino con id: '.$this->db->insert_id());
                
		return $this->db->insert_id();
        
    }
    
    
    function registrar_detalle_pedido($idPedido, $productos, $cantidad, $montoTotal) {

        $this->load->helper('string');

        foreach ($productos as $idProducto):
            //echo $idProducto['id'];


            $pedido = array(
                'cant_venta' => $cantidad,
                'precio_venta' => $montoTotal,
                'status' => 'Entregado',
                'fk_pedido' => $idPedido,
                'fk_producto' => $idProducto['id']
            );

            $this->db->insert('detalle_pedido', $pedido);
            log_message('info', 'Se registró el producto: ' . $idProducto['id'] . ' en el pedido ' . $this->db->insert_id());

        endforeach;

        return true;
    }
    
    
}
?>
