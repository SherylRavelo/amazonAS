<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

<script type="text/javascript">
var user = '<?php echo $this->session->userdata('usuario') ?>';

$('#pg').live('pagebeforeshow',function(event, ui){
	//si existe la sesión antes de la carga del formulario enviamos con
	//una transición fade a la pg2
	if(user)
	{
		
		 $.mobile.changePage("#pg2", { transition : "fade" });
		
	}
	
});	

//en el evento de cuando la pg2 haya iniciado
$('#pg2').live('pageinit',function(event, ui){

	
	$(".logout").live('click',function(){
		
		
		$.ajax({
		    url: '<?php echo base_url('logout/salir') ?>',		
			beforeSend: function() {
	           //mientras hacemos la petición mostramos un spinner
	        	$.mobile.showPageLoadingMsg(true); 
	            
	        },complete : function(){
		          	
		       //cuando ya se ha completado la petición ocultamos el spinner
		        $.mobile.hidePageLoadingMsg(true); 
		        
		    //cuando tenemos respuesta
		    },success : function(){
		    	
	           //hay que redireccionar para que refresque la página
			    window.location.href="<?php base_url('home','refresh') ?>";
			       	
			}
				
		});
		
	});

})


//en el evento de cuando la pg3 haya iniciado
$('#pg3').live('pageinit',function(event, ui){

	
	$(".logout").live('click',function(){
		
		
		$.ajax({
		    url: '<?php echo base_url('logout/salir') ?>',		
			beforeSend: function() {
	           //mientras hacemos la petición mostramos un spinner
	        	$.mobile.showPageLoadingMsg(true); 
	            
	        },complete : function(){
		          	
		       //cuando ya se ha completado la petición ocultamos el spinner
		        $.mobile.hidePageLoadingMsg(true); 
		        
		    //cuando tenemos respuesta
		    },success : function(){
		    	
	           //hay que redireccionar para que refresque la página
			    window.location.href="<?php base_url('home','refresh') ?>";
			       	
			}
				
		});
		
	});

})	





//en el evento de cuando la pg3 haya iniciado
$('#pg4').live('pageinit',function(event, ui){

	
	$(".logout").live('click',function(){
		
		
		$.ajax({
		    url: '<?php echo base_url('logout/salir') ?>',		
			beforeSend: function() {
	           //mientras hacemos la petición mostramos un spinner
	        	$.mobile.showPageLoadingMsg(true); 
	            
	        },complete : function(){
		          	
		       //cuando ya se ha completado la petición ocultamos el spinner
		        $.mobile.hidePageLoadingMsg(true); 
		        
		    //cuando tenemos respuesta
		    },success : function(){
		    	
	           //hay que redireccionar para que refresque la página
			    window.location.href="<?php base_url('home','refresh') ?>";
			       	
			}
				
		});
		
	});

})	







//en el evento de cuando la pg3 haya iniciado
$('#pg5').live('pageinit',function(event, ui){

	
	$(".logout").live('click',function(){
		
		
		$.ajax({
		    url: '<?php echo base_url('logout/salir') ?>',		
			beforeSend: function() {
	           //mientras hacemos la petición mostramos un spinner
	        	$.mobile.showPageLoadingMsg(true); 
	            
	        },complete : function(){
		          	
		       //cuando ya se ha completado la petición ocultamos el spinner
		        $.mobile.hidePageLoadingMsg(true); 
		        
		    //cuando tenemos respuesta
		    },success : function(){
		    	
	           //hay que redireccionar para que refresque la página
			    window.location.href="<?php base_url('home','refresh') ?>";
			       	
			}
				
		});
		
	});

})	













	
//si no existe la sesión antes de la carga de la pg2, pg3 enviamos con
//una transición fade a la pg que es el formulario
$('#pg2,#pg3').live('pagebeforeshow',function(event, ui){
	
	//si el usuario ya habia cerrado la sesión
	if(user == '' || user == undefined || !user)
	{
				
		$.mobile.changePage("#pg", { transition : "fade" });
			
	}	

});



</script>
	</head>
	<body>
		
	<!--página en la que hacemos registro y login-->
	<div data-role="page" id="pg">
		<!--cabecera de la página-->
		<div class="ui-title" data-role="header" data-theme="e">
		    <h1>AmazonAS</h1>
		</div>

		<div data-role="content">
			
			<?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false') ;
                        $this->session->set_userdata(array('num' => 0));
                        
			echo form_open(base_url('perfil'),$attr) ?>
 
                
				
                <input type="submit" class="registro" data-theme="b" value="Iniciar Sesión" />
                
                <div data-role="fieldcontain">
					<label id="error" class="ui-hide-label"></label>
				</div>
            
           <?php echo form_close() ?>
			
        </div>
        
    </div>
      <!--final de la pg, formulario de registro-->
        
    <div data-role="footer" data-theme="e">
		<h4>AmazonAS</h4>
	</div>
		
	<!--pg2, aquí llegamos cuando iniciamos sesión-->	
	<div data-role="page" id="pg2">
		<!--cabecera de la página-->
		<div data-role="header" data-theme="e">
		    <h1>Bienvenido <?php echo $this->session->userdata('usuario') ?></h1>
		</div>		
                
                
                <div data-role="content">
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php echo form_open(base_url('home/consultarTienda'),$attr) ?>
 
                
				
                <input type="submit" class="registro" data-theme="b" value="Ingresar a la Tienda" />
                
                
            
           <?php echo form_close() ?>
                    
                    
                    
                    
                    
                    
   
			
			<?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false') ?>

			<?php echo form_open(base_url('pedido/consultarCompras'),$attr) ?>
 
                
				
                <input type="submit" class="registro" data-theme="b" value="Consultar Status - Compras" />
                
                
            
           <?php echo form_close() ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
      
			
        </div>
                
                
                
                
                <div id="saludo"><a href="#" data-role="button" class="logout">Salir</a></div>
                
                
           		
		
	
		
		<div data-role="footer" data-theme="e">
			<h4>AmazonAS</h4>
		</div>
                
                
                
	</div>
	<!--final de la pg2-->
	
	<!--Esta es la pg3, otra página a la que accedemos si hemos hecho login con un botón para 
		abrir en un popup la página popup-->	
	<div data-role="page" id="pg3">
		<!--cabecera de la página-->
		<div data-role="header" data-theme="e">
		    <h1>Estados de Compras -  <?php echo $this->session->userdata('usuario') ?></h1>
		</div>		
                
         
                
                
		

		<div data-role="content" id="saludo" data-theme="a">
                    
			
                        
                        
                        
                        
                 


                <TABLE WIDTH="60%" CELLPADDING="5" CELLSPACING="0" BORDER="1" ALIGN ="CENTER">

                    <TR>
                        <TD WIDTH="33%" ALIGN ="CENTER">Fecha Pedido</TD>
                        <TD WIDTH="33%" ALIGN ="CENTER">Status</TD>
                    </TR>
                    <?php
                    $i = 0;
                    $numCompras = $this->session->userdata('numCompras');
                    while ($i <= $numCompras) {

                        $arreglo = $this->session->userdata($i);


                        $this->session->set_userdata($arreglo);

                        $fecha_pedido = $this->session->userdata('fecha_pedido');

                        $subcadena = substr($fecha_pedido, 0, 10);
                        ?>
                        <TR>
                            <TD WIDTH="33%" ALIGN ="center"><?php echo $subcadena; ?></TD>
                            <TD WIDTH="33%" ALIGN ="center"><?php echo $this->session->userdata('status'); ?></TD>
                        </TR>
                        <?php
                        $i++;
                    }
                    ?>




                </TABLE>
       
                        
                        
                        
                        
       
                        
                        
                        
		</div>	
                
                <p><a href="#pg2" id="volver_inicio" data-role="button" data-icon="back">Regresar</a></p>	
                
                <div id="saludo"><a href="#" data-role="button" class="logout">Salir</a></div>
		
	
		
		<div data-role="footer" data-theme="e">
			<h4>AmazonAS</h4>
		</div>
	</div>
	<!--final de la pg3-->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
           <!--pg4, aquí llegamos cuando se clickea Ingresar a la Tienda en el menú de la pg2-->	
	<div data-role="page" id="pg4">
		<!--cabecera de la página-->
		<div data-role="header" data-theme="e">
		    <h1>Bienvenido <?php echo $this->session->userdata('usuario') ?></h1>
		</div>		
                
                
                <div data-role="content">
                    
                    			<?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false');
                        
                     
                        ;?>
                    
                    <?php echo form_open(base_url('buscar/buscar_producto_movil'),$attr) ?>
 
              
                    
				
                    <input type="text" name="palabra_clave" id="textfield" class="text longfield" />
                    
                    <input type="submit" class="registro" data-theme="b" value="Buscar" />
                
                
            
           <?php echo form_close() ?>
                    
                
                
                <div data-role="content" id="saludo" data-theme="a">
                
                    
                    
                  
                    
                    
                <TABLE WIDTH="40%" CELLPADDING="5" CELLSPACING="0" BORDER="1" ALIGN ="CENTER">

                    
                    <?php
                    
                    
                    $i = 0;
                    //$numCompras = $this->session->userdata('numCompras');
                    while ($i <= 4) {

                        $arreglo = $this->session->userdata($i);


                        $this->session->set_userdata($arreglo);

                        
                        ?>
                        <TR>
                            
                            <TD WIDTH="10%" ALIGN ="center">
                      <?php $foto= $this->session->userdata('nombreFoto').".jpg";  ?>
                                
                                
                                
                       <?php echo '<img border="0" width="200" height="200" alt="Imagen" src="/amazonAS/images/images_productos/' . $foto .  '">';?>                             
                                
                            <TD WIDTH="30%" ALIGN ="center">
                                <?php echo $this->session->userdata('nombreProducto'). 
                                        "<br> Precio: ". $this->session->userdata('precio_unit').
                                        "<br>Estado: ". $this->session->userdata('estado_producto'); 
                                                  
                                
                                ?>
                            
                            </TD>           
 
                               
                            
                        </TR>
                        <?php
                        $i++;
                    }
                    ?>




                </TABLE>
       
            	
                    
             
                    
     
        </div>
                
                
                
                
                
                </div>
                
                   <p><a href="#pg2" id="volver_inicio" data-role="button" data-icon="back">Regresar</a></p>	
                
                <div id="saludo"><a href="#" data-role="button" class="logout">Salir</a></div>
                
                

                    
		
	
		
		<div data-role="footer" data-theme="e">
			<h4>AmazonAS</h4>
		</div>
                
                
                
	</div>
	<!--final de la pg4-->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
           <!--pg5, aquí llegamos cuando se clickea Buscar en la pg4-->	
	<div data-role="page" id="pg5">
		<!--cabecera de la página-->
		<div data-role="header" data-theme="e">
		    <h1>Bienvenido <?php echo $this->session->userdata('usuario') ?></h1>
		</div>		
                
                
                <div data-role="content">
                    
                    
                    
                    
                    
                    
                    	<?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false');
                        
                        
                        
                        ;?>
                    
                    <?php echo form_open(base_url('buscar/buscar_producto_movil'),$attr) ?>
 
              
                    
				
                    <input type="text" name="palabra_clave" id="textfield" class="text longfield" />
                    
                    <input type="submit" class="registro" data-theme="b" value="Buscar" />
                
                
            
           <?php echo form_close() ?>
                    
                
                
                    
                    
                    
                    
                    
                     <div data-role="content" id="saludo" data-theme="a">
                
                
                
                    
                    
                    
                    
                    
                    
                    
                    
                <TABLE WIDTH="40%" CELLPADDING="5" CELLSPACING="0" BORDER="1" ALIGN ="CENTER">

                    
                    <?php
                    
                    
                    $i = 0;
                    //$numCompras = $this->session->userdata('numCompras');
                    while ($i <= 4) {

                        $arreglo = $this->session->userdata($i);


                        $this->session->set_userdata($arreglo);

                        
                        ?>
                        <TR>
                            
                            <TD WIDTH="10%" ALIGN ="center">
                      
                  
 
                      <?php $foto= $this->session->userdata('nombreFoto').".jpg";  ?>          
                                
                                
        <?php echo '<img border="0" width="200" height="200" alt="Imagen" src="/amazonAS/images/images_productos/' . $foto .  '">';?>                             
                            <TD WIDTH="30%" ALIGN ="center">
                                <?php echo $this->session->userdata('nombreProducto'). 
                                        "<br> Precio: ". $this->session->userdata('precio_unit').
                                        "<br>Estado: ". $this->session->userdata('estado_producto'); 
                                                  
                                
                                ?>
                            
                            </TD>           
 
                               
                            
                        </TR>
                        <?php
                        $i++;
                    }
                    ?>




                </TABLE>
       
            
	
                    
     
        </div>
                    </div>
                
                
                <?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false');
                        
   
                        
                        ?>
                    
                    
                    <?php echo form_open(base_url('buscar/buscar_producto_movil_adelante'),$attr) ?>
 
              
                    
				
                
                    
                    <input type="submit" class="registro" data-theme="b" value="Siguiente" />
                
                
            
           <?php echo form_close() ?>
                
                    
                    
                    
                    
                    
                    
                    
                    <?php //ATRASSSSSSSSSSSSSSSSSSSSSSSSSSSSS?>
                    
                    
                    
                    
                    	<?php 
			//es importante poner data-ajax en false para que haga la petición sin ajax
			$attr = array('content' => 'content', 'data-ajax' => 'false');
                        
                       
                        ;?>
                    
                    <?php echo form_open(base_url('buscar/buscar_producto_movil_atras'),$attr) ?>
 
              
                    
				
                    
                    
                    <input type="submit" class="registro" data-theme="b" value="Atrás" />
                
                
            
           <?php echo form_close() ?>
                    
                
                   <p><a href="#pg2" id="volver_inicio" data-role="button" data-icon="back">Regresar</a></p>	
                
                

                <div id="saludo"><a href="#" data-role="button" class="logout">Salir</a></div>
                
                

                    
		
	
		
		<div data-role="footer" data-theme="e">
			<h4>AmazonAS</h4>
		</div>
                
                
                
	</div>
	<!--final de la pg5-->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	
	<!-- Éste es nuestro popup -->
	<div data-role="page" id="popup">
	
		<div data-role="header" data-theme="e">
			<h1>Dialog con jquery mobile</h1>
		</div>
	
		<div data-role="content" data-theme="d">	
			<h2>Popup</h2>
			<p>Hola <?php echo $this->session->userdata('usuario') ?></p>		
			<p><a href="#pg2" id="volver_inicio" data-role="button" data-icon="back">Volver al inicio</a></p>	
		</div>
		
		<div data-role="footer">
			<h4>AmazonAS</h4>
		</div>
	</div>
	<!--final del popup-->
		
</body>

</html>
