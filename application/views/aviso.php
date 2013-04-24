<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela </title>
        <link href="/amazonAS/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/amazonAS/css/forms.css" rel="stylesheet" type="text/css" />


    </head>
    <body>
        <?php $this->load->helper('html'); ?>
        <div id="wrap">
            <div id="topbar">
                <ul>    
                    <?php if ($idUsuario != null) {?>
                    <li class="current"><?php echo anchor('homeusuario/index/' . $idUsuario, "Inicio", array('title' => 'Inicio')); ?></li>
                    <li><?php echo anchor('home/sobre_nosotros/'.$idUsuario.'/'.$nombreUser, 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    
                        
                    <?php }  else { ?>
                    <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>
                    <li><?php echo anchor('home/sobre_nosotros', 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    <?php }?>
                    
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
                <?php if ($idUsuario != null) {?>
                <div id="useractions">
                    <div id="headings"> 
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <?php echo $nombreUser; ?></h2>   
                    </div>
                </div>
                <?php }  else { ?>
                <div id="useractions">
                    <div id="headings"> 
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <a href="#">Crear cuenta</a> </h2>   
                    </div>
                    <div id="login">
                        <p><strong> ¿Ya estás registrado en AmazonAS?</strong> Ingresa aquí con tu cuenta Google</p>
                        <div id="loginform">
                            <?php echo form_open('perfil'); ?> <!--<form action="#"> -->
                                <div class="formblock">
                                    <input type="image" src="/amazonAS/images/g+32.png" name="button" id="button" value="Submit" />
                                </div>
                                
                                <div class="clear">&nbsp;</div>
                                
                            </form>
                        </div>

                    </div>
                </div>
                <?php }?>
            </div>
            <div id="content">
                <div id="home_main"><div id="search"> 
                        <div class="tab">
                            <h2>Operación</h2>
                        </div>
                        <div class="container">
                            <?php echo $mensaje; ?>

                        </div>
                    </div></div>


                <div class="clear">&nbsp;</div>
            </div>
                
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


