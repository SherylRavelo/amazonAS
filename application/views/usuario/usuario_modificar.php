<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela</title>
        <link href="/amazonAS/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/amazonAS/css/forms.css" rel="stylesheet" type="text/css" />
        <script src="/amazonAS/js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
	  
                $('#searchdiv').hide();
   
                $('a').click(function(){
			
                    $('#searchdiv').fadeIn('slow');
   
                });
   
                $('a#close').click(function(){
                    $('#searchdiv').fadeOut('slow');
                })
   
            });
        </script>

    </head>

    <body>
        <?php $this->load->helper('html'); ?>
        <div id="wrap">
            <div id="topbar">
                <ul>    <li class="current"><a href="#">Inicio</a></li>

                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contáctanos</a></li>
                    <li><a href="#">Mi Cuenta</a></li>
                    <li><a href="#">Ayuda &amp; Soporte</a></li>
                    <li></li>
                </ul>
            </div>
            <div id="header">
                <div id="sitename">
                    <h1 id="logo">AmazonAS</h1>
                </div>
                <div id="shoutout"><img src="/amazonAS/images/joinnow_shoutout.jpg" alt="Join Now! It's Free" width="168" height="126" /></div>
                <div id="useractions">
                    <div id="headings"> 
                        <h2><img src="images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> Opciones de Usuario</h2>   
                    </div>
                    <div >
                        <?php //echo anchor('usuario/index/' . $idUsuario . '/modificar', 'Modificar Datos de Usuario', array('title' => 'Modificar')); ?>

                    </div>
                </div>

            </div>


            <?php
            $attributes = array('id' => 'form_modificar');
            echo form_open('/usuario/modificarUsuario/' . $idUsuario, $attributes);
            ?>
            <fieldset>
                <label>Nombre</label>
                    <input name='nombre_new'  id='nombre_new' type='text' class='text' title='Ingrese su nombre' value='<?php echo $nombre; ?>' />

                <p><input type="submit" value="Modify" name="submit" id="submit" /></p>
            </fieldset>
            <?php echo form_close(); ?>

            <div id="footer">
                <div id="upperfooter"> <a href="#">Inicio</a> | <a href="#">Search</a> | <a href="#">Register</a> | <a href="#">Pro Agent Account</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> |<a href="#"> Privacy Policy</a> <a href="#">Terms Of Use</a> | <a href="#">Advertise With Us</a> </div>
                <div id="lowerfooter"> <span class="backtotop"> <a href="#">Volver arriba</a> </span>

                    <!-- Removing this link back to Ramblingsoul.com will be violation of the Creative Commons Attribution 3.0 Unported License, under which this template is released for download -->
                    <a href="http://ramblingsoul.com" title="Download High Quality CSS Layouts">CSS Layout</a> by RamblingSoul.com | Programming by Alberly Martínez & Sheryl Ravelo
                    <!-- Copyright - Ramblingsoul.com -->

                </div>
            </div>
        </div>
    </body>
</html>
