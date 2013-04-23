
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela </title>

        <link href="/amazonAS/css/layoutregistro.css" rel="stylesheet" type="text/css" />
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
                    <li><?php echo anchor('home/sobre_nosotros/'.$idUsuario.'/'.$nombreUser, 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    
                    
                    <li><?php echo anchor('perfil/miCuenta/'.$idUsuario, 'Mi Cuenta', array('title' => 'Mi Cuenta')); ?></li>
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
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> 
                            <?php echo "$nombreUser $apellido"; ?> </h2>   
                    </div>
                </div>
            </div>





            <div id="content">
                <div id="home_main"><div id="search"> 
                        <div class="tab">
                            <h2>Actualizacion de Datos</h2> 
                        </div>
                        <div class="container">




                            <?php
                            $atributos = array('id' => 'form_registrarPago');
                            echo form_open('/usuario/modificarUsuario/' . $idUsuario, $atributos);
                            ?>



                            <table class="search_form" style="width:100%; border:none;">
                                <tr>
                                    <td class="label">Nombre</td>
                                    <td colspan="3"><label>
                                            <input type="text"  readonly="readonly" name="nuevo_nombre" id="nuevo_nombre" class="text longfield" value="<?php echo $nombre; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">Apellido</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_apellido" id="nuevo_apellido" class="text longfield" value="<?php echo $apellido; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">Cedula</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_cedula" id="nuevo_cedula" class="text longfield" value="<?php echo $cedula; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">F. Nacimiento</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_fnacimiento" id="nuevo_fnacimiento" class="text longfield" value="<?php echo $fecha_nac ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">F. Registro</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_fregistro" id="nuevo_fregistro" class="text longfield" value="<?php echo $fecha_registro; ?>"/>
                                        </label></td>
                                </tr>




                                <tr>
                                    <td class="label">Direccion</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="nuevo_direccion" id="nuevo_direccion" class="text longfield" value="<?php echo $direccion; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">Codigo Postal</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="nuevo_codigo" id="nuevo_codigo" class="text longfield" value="<?php echo $zona_postal; ?>"/>
                                        </label></td>
                                </tr>





                                <tr>
                                    <td class="label">Estado de cuenta</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_status" id="nuevo_status" class="text longfield" value="<?php echo $estado_usuario; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">Correo</td>
                                    <td colspan="3"><label>
                                            <input type="text" readonly="readonly" name="nuevo_correo" id="nuevo_correo" class="text longfield" value="<?php echo $correo; ?>"/>
                                        </label></td>
                                </tr>



                                <tr>
                                    <td class="label">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" class="label"><label>
                                            <input type="image" src="/amazonAS/images/offersubmit.gif" alt="search" name="button2" id="button2" value="Submit" />
                                        </label></td>
                                </tr>
                            </table>

                            </form>

                        </div>
                    </div></div>


                <div id="home_sidebar"><div class="hot">
                        <h2 class="sidebar_head"><span class="h2link"><a href="#">View More</a></span> Hot Properties </h2>
                        <ul>
                            <li><span class="imageholder">
                                    <img src="images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                            <li><span class="imageholder">
                                    <img src="images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>

                            <li><span class="imageholder">
                                    <img src="images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>

                            <li><span class="imageholder">
                                    <img src="images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                        </ul>
                    </div></div>





                <div class="clear">&nbsp;</div>
            </div>
            <?php include '/../includes/footer.php';?>
        </div>
    </body>
</html>

