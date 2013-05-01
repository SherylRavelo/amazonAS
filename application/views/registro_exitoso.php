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
                <ul>    <li class="current"><a href="#">Inicio</a></li>

                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contáctanos</a></li>
                  
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
                   
                    </div>
                    <div >
                        

                    </div>
                </div>
                
            </div>
            <?php
            //$this->load->helper('html');
            
            ?>
            <br></br>
            <h1>¡Felicidades!</h1>            
            <br></br>
            <h3>Gracias por registrarse, se la ha enviado un correo con un código de activación <?php echo $this->session->userdata('name')?> <?php echo anchor('home', 'Regresar');?></h3>
            <br />
            
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










