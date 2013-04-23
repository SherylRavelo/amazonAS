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

        <!--
        This CSS template is released under Creative Commons Attribution license. You shall not remove the link back to ramblingsoul.com from the pages.
        
        Designed by - Roshan M. Ravi
        URL - www.ramblingsoul.com
        -->


    </head>

    <body>
        <?php $this->load->helper('html'); ?>
        <div id="wrap">
            <div id="topbar">
                <ul>    
                     <li class="current"><?php echo anchor('homeusuario/index/' . $idUsuario, "Inicio", array('title' => 'Inicio')); ?></li>
                    <li><?php echo anchor('home/sobre_nosotros/'.$idUsuario.'/'.$nombre, 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    
                    
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
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> Opciones de Usuario</h2>   
                    </div>
                    <div >
                        <?php echo anchor('usuario/index/' . $idUsuario . '/modificar', 'Modificar Datos de Usuario', array('title' => 'Modificar')); ?>
                        <br></br>
                        
                        <?php echo anchor('usuario/registrarFormaDePago/' . $idUsuario , 'Registrar Forma de Pago'); ?>

                    </div>
                </div>
                
            </div>
            <?php
            //$this->load->helper('html');
            
            ?>

            <h3>Un correo ha sido enviado con la actualización de sus datos. </h3>
            <br />
            
            <?php include 'includes/footer.php';?>
        </div>
    </body>
</html>
