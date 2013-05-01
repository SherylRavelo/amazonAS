


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela </title>

        <link href="/amazonAS/css/layoutregistro.css" rel="stylesheet" type="text/css" />
        <link href="/amazonAS/css/forms.css" rel="stylesheet" type="text/css" />
        <script src="/amazonAS/js/jquery.js" type="text/javascript"></script>




        <link rel="stylesheet" href="/amazonAS/css/jquery-ui.css" />

        <script src="/amazonAS/js/jquery-1.9.1.js" type="text/javascript"></script>

        <script src="/amazonAS/js/jquery-ui.js"></script>





        <script>
            $(function() {
                $("#datepicker").datepicker();

                $("#datepicker").datepicker("option", {dateFormat: "yy/mm/dd"});

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
                    <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>

                    <li><?php echo anchor('home/sobre_nosotros', 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    
                    <li><a href="#">Mi Cuenta</a></li>
                    <li><a href="#">Ayuda &amp; Soporte</a></li>
                    <li></li>
                </ul>
            </div>


            <div id="header">
                <div id="sitename">
                    <h1 id="logo">AmazonAS</h1>
                </div>
                <div id="shoutout"><img src="images/joinnow_shoutout.jpg" alt="Join Now! It's Free" width="168" height="126" /></div>
                <div id="useractions">
                    <div id="headings"> 
                        <h2><img src="images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> 
                            <a href='registro'>Crear cuenta</a> </h2>   
                    </div>
                    <div id="login">


                        <p><strong> ¿Ya estás registrado en AmazonAS?</strong> Ingresa aquí­ con tu cuenta Google</p>
                        <div id="loginform">
                            <?php echo form_open('perfil'); ?> <!--<form action="#"> -->
                            <div class="formblock">
                                <input type="image" src="images/g+32.png" name="button" id="button" value="Submit" />
                            </div>

                            <div class="clear">&nbsp;</div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div id="content">
                <div id="home_main"><div id="search"> 
                        <div class="tab">
                            <h2>Forma de Pago</h2> 
                        </div>
                        <div class="container">

 
                            <?php
$atributos = array('id' => 'form1');
echo form_open('usuario/registrar_forma_de_pago/' . $idUsuario, $atributos);
?>
                            <table class="search_form" style="width:100%; border:none;">
                                <tr>
                                    <td class="label">N° Tarjeta de Crédito</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="textfield_numero" id="textfield_numero" class="text longfield" maxlength="40" />
                                        </label></td>
                                </tr>
                                
                                
                                <tr>
                                    <td class="label">F. Vencimiento</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="datepicker" id="datepicker"  class="text longfield" maxlength="10"/>


                                        </label></td>
                                </tr>
                                



                                <tr>
                                    <td class="label">Marca</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="textfield_marca" id="textfield_marca" class="text longfield" maxlength="40" />
                                        </label></td>
                                </tr>


                                <tr>
                                    <td class="label">Codigo Tarjeta</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="textfield_codigo" id="textfield_codigo" class="text longfield" maxlength="20"/>
                                        </label></td>
                                </tr>


                                <tr>
                                    <td class="label">Nombre Tarjeta</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="textfield_nombre" id="textfield_nombre" class="text longfield" maxlength="50"/>
                                        </label></td>
                                </tr>


                                <tr>
                                    <td class="label">Documento Identidad</td>
                                    <td colspan="3"><label>
                                            <input type="text" name="textfield_documento" id="textfield_documento" class="text longfield" maxlength="50"/>
                                        </label></td>
                                </tr>




                                <tr>
                                    <td class="label">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" class="label"><label>
                                            <input type="image" src="images/offersubmit.gif" alt="search" name="button2" id="button2" value="Submit" />
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
            <div id="footer">
                <div id="upperfooter"> <a href="#">Inicio</a> | <a href="#">Search</a> | <a href="#">Register</a> | <a href="#">Pro Agent Account</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> |<a href="#"> Privacy Policy</a> <a href="#">Terms Of Use</a> | <a href="#">Advertise With Us</a> </div>
                <div id="lowerfooter"> <span class="backtotop"> <a href="#">Volver arriba</a> </span>

                    <!-- Removing this link back to Ramblingsoul.com will be violation of the Creative Commons Attribution 3.0 Unported License, under which this template is released for download -->
                    <a href="http://ramblingsoul.com" title="Download High Quality CSS Layouts">CSS Layout</a> by RamblingSoul.com | Programming by Alberly MartÃ­nez & Sheryl Ravelo
                    <!-- Copyright - Ramblingsoul.com -->

                </div>
            </div>
        </div>
    </body>
</html>

