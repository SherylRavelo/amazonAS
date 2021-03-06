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
                    <?php if ($idUsuario != null) {?>
                    <li class="current"><?php echo anchor('homeusuario/index/' . $idUsuario, "Inicio", array('title' => 'Inicio')); ?></li>

                    <li><?php echo anchor('home/sobre_nosotros/'.$idUsuario.'/'.$nombreUser, 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    <li><?php echo anchor('perfil/miCuenta/'.$idUsuario, 'Mi Cuenta', array('title' => 'Mi Cuenta')); ?></li>
                    
                    <?php }  else { ?>
                    <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>
                    <li><?php echo anchor('home/sobre_nosotros', 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    <li><?php echo anchor('home/servicio_web', 'Servicio Web', array('title' => 'Servicio Web')); ?></li>
                   <?php }?>
                    
                    
                    
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

                <div id="topcategorieslink" class="clear">
                    <h2>Filtar Resultados</h2>
                    <ul>
                        <li><a href="#">Por Precio</a> </li>

                        <li><a href="#">Por Estado </a> </li>
                        
                        <li><a href="#">Por Categoría </a> </li>

                        <li><a class="highlight" href="#" id="click">Buscar otra vez</a> </li>

                    </ul>
                </div>
                <div class="clear">&nbsp;</div>

                <div id="main">
                    <div id="searchdiv"> 
                        <div id="home_main"><div id="search"> 
                        <div class="tab">
                            <h2>Buscar productos</h2>
                        </div>
                        <div class="container">
                            <?php 
                            $atributos = array('id' => 'form1');
                            $oculto = array('idUsuario' => $idUsuario,'nombreUser' => $nombreUser);
                            echo form_open('buscar', $atributos,$oculto);
                            ?>
                                <table class="search_form" style="width:100%; border:none;">
                                    <tr>
                                        <td class="label">Buscar</td>
                                        <td colspan="3"><label>
                                                <input type="text" name="palabra_clave" id="textfield" class="text longfield" />
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td class="label">&nbsp;</td>
                                        <td colspan="3">Ejemplo: Sillas para bebe / Perfume Dior </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Estado</td>
                                        <td><label>
                                                <select name="select_estado" id="select" class="select_field">
                                                    <option selected="selected" value="0">Seleccione</option>
                                                    <option value="1">Nuevo</option>
                                                    <option value="2">Usado</option>
                                                </select>
                                            </label></td>
                                        <td class="label">Precio Mín. Bs.F</td>
                                        <td><input type="text" name="precio_min" id="textfield4" class="text smalltextarea" maxlength="7" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" /></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Categorías</td>
                                        <td>
                                            <?php echo form_dropdown('id_categoria',$categorias,0); ?>
                                        </td>
                                        <td class="label">Precio Máx. Bs.F</td>
                                        <td><input type="text" name="precio_max" id="textfield2" class="text smalltextarea" maxlength="7" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" /></td>
                                    </tr>                                    
                                    <tr>
                                        <td class="label">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="2" class="label"><label>
                                                <input type="image" src="/amazonAS/images/searchbtn.png" alt="search" name="button2" id="button2" value="Submit" />
                                            </label></td>
                                    </tr>
                                </table>



                            <?php echo form_close();?>

                        </div>
                    </div></div>
                        <div class="clear">&nbsp;</div>
                    </div>

                    <h1><?php echo $start . "-" . $hasta; ?> de <?php echo $cantProductos; ?> Productos encontrados</h1>
                    <ul class="listing">
                        <?php foreach ($lista as $fila) : ?>
                            <li>
                                <div class="listinfo">
                                    <!--<img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />-->
                                    <img src="<?php echo '/amazonAS/images/images_productos/'.$fila->foto; ?>" alt="Listing Image" width="100" height="100" class="listingimage" />
                                    <h3><?php echo $fila->nombre; ?></h3>
                                    <p><?php echo $fila->detalle; ?></p>
                                    <span class="price">Bs.F <?php echo $fila->precio_unit; ?></span>
                                    <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> <?php echo $fila->cant_imagen; ?> imágenes </span></div>
                                <div class="listingbtns"> 
                                    <?php if ($idUsuario != null) {?>
                                    <span class="listbuttons">
                                        <?php echo anchor('producto/viewProducto/'.$fila->id_producto.'/'.$idUsuario.'/'.$nombreUser, "Ver Detalles", array('title' => 'Detalles')); ?></span>
                                    <?php } else {?>
                                    <span class="listbuttons">
                                        <?php echo anchor('producto/viewProducto/'.$fila->id_producto, "Ver Detalles", array('title' => 'Detalles')); ?></span>
                                    
                                    <?php }?>
                                    <!--
                                    <span class="listbuttons">
                                        <a href="#">Add To Favorites</a></span>
                                    <span class="listbuttons">
                                        <a href="#">Contact Seller</a></span>
                                    -->
                                    </div>
                                <div class="clear">&nbsp;</div>                              
                            </li>
                        <?php endforeach; ?>                        
                    </ul>
                    <div id="paginations">
                        <ul>
                            <!-- <li><a href="#">&laquo;</a></li> -->
                              
                            <li class="current">
                                <li><?php echo $paginacion; ?></li>
                            </li>
                        </ul>
                        <div class="clear">&nbsp;</div>
                    </div>
                </div>

                <div id="home_sidebar">
                    <div class="block smsalert">
                        <p>Si deseas conocer sobre el equipo de amazonAS, te invitamos a visitar la sección  <strong>Sobre Nosotros</strong>! y podrás ponerte en contacto!</p>
                        <p align ="center"><a href="#"><img src="/amazonAS/images/searchbtn.png" alt="SMS Alerts" /></a></p>
                    </div>
                    <!--
                    <div class="hot">
                        <h2 class="sidebar_head"><span class="h2link"><a href="#">View More</a></span> Hot Properties </h2>
                        <ul>
                            <li><span class="imageholder">
                                    <img src="/amazonAS/images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                            <li><span class="imageholder">
                                    <img src="/amazonAS/images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                            <li><span class="imageholder">
                                    <img src="/amazonAS/images/imageplaceholder.jpg" alt="Image Place Holder" width="66" height="66" />
                                </span>
                                <h3><a href="#">5 Room Flat at PlaceName</a></h3>
                                <p class="description">
                                    Lorem Ipsum Dolor Sit Amet
                                    <span class="price">Rs. 500,000.00</span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                        </ul>
                    </div>
                    -->
                </div>
                    
                <!--
                <div id="sidebar">
                    <div class="block advert">
                        <img src="/amazonAS/images/advertisehere.jpg" alt="Advertise Here" />
                    </div>
                    <div class="menulist block">
                        <h2 class="sidebar_head">Quick Links</h2>
                        <ul class="normalmenu">
                            <li><a href="#">Pro Agent Account</a></li>
                            <li><a href="#">Find Agents</a></li>
                            <li><a href="#">Banking &amp; Finance Help</a></li>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">SMS Alerts</a></li>
                            <li><a href="#">Email Alerts</a></li>
                            <li><a href="#">Advertising in RealOne</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                        <div class="clear">&nbsp;</div>
                    </div>
                    <div class="block">
                        <img src="/amazonAS/images/dreamcar.jpg" alt="Own Your Dream Car" />

                    </div>
                    <div class="block"><img src="/amazonAS/images/dreamcar.jpg" alt="Own Your Dream Car" /></div>
                    <div class="block"><img src="/amazonAS/images/dreamcar.jpg" alt="Own Your Dream Car" /></div>
                </div>
                -->

                <div class="clear">&nbsp;</div>
            </div>
            <?php include 'includes/footer.php';?>
        </div>
    </body>
</html>
