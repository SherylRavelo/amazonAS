<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela</title>
        <link href="/amazonAS/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/amazonAS/css/forms.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/amazonAS/jqueryui/js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="/amazonAS/jqueryui/development-bundle/ui/ui.core.js"></script>
        <script type="text/javascript" src="/amazonAS/jqueryui/development-bundle/ui/effects.core.js"></script>
        <script type="text/javascript" src="/amazonAS/jqueryui/development-bundle/ui/effects.highlight.js"></script>
        <script type="text/javascript" src="/amazonAS/jqueryui/development-bundle/ui/ui.tabs.js"></script>

        
        <script type="text/javascript">
            $(function() {
                $("#tabs").tabs({
                    event: 'mouseover'
                });
            });
	
            $(function() {
                //run the currently selected effect
                function runEffect(){
                    //get effect type from 
                    var selectedEffect = $('#highlight').val();
			
                    //most effect types need no options passed by default
                    var options = {};
                    //check if it's scale, transfer, or size - they need options explicitly set
                    if(selectedEffect == 'scale'){  options = {percent: 0}; }
                    else if(selectedEffect == 'size'){ options = { to: {width: 200,height: 60} }; }
			
                    //run the effect
                    $("#searchdiv").toggle(selectedEffect,options,500);
                };
		
                //set effect from select menu value
                $("#searchnow").click(function() {
                    runEffect();
                    return false;
                });

            });

        </script>

        <link href="/amazonAS/css/ajaxui.css" rel="stylesheet" type="text/css" />
    
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
                <!--
                <div id="topcategorieslink" class="clear">
                    <h2>Filtar Resultados</h2>
                    <ul>
                        <li><a href="#">Por Precio</a> </li>

                        <li><a href="##">Por Estado </a> </li>
                        
                        <li><a href="##">Por Categoría </a> </li>

                        <li><a class="highlight" href="#" id="click">Buscar otra vez</a> </li>

                    </ul>
                </div>
                -->
                <div class="clear">&nbsp;</div>

                <div id="main">
                    <h1><?php echo $nombreProducto; ?></h1>
                    <div id="single_item_details">
                        <div id="leftcolumn"><!--<img src="/amazonAS/images/imageholder_detailspage.jpg" alt="Image" width="220" height="220" class="previewimg" />-->
                        <img src="<?php echo '/amazonAS/images/images_productos/'.$imagen; ?>" alt="Image" width="220" height="220" class="previewimg" />


                        </div>

                        <div id="rightcolumn">
                            <h2><?php echo $detalle; ?></h2>
                            <p class="user"><img src="/amazonAS/images/usericon.gif" alt="user" /> Ver Calificaciones <a href="#">Aquí</a></p>
                            <p>Id #<?php echo $idProducto; ?> <br />
                                Estado: <?php echo $estado; ?>
                            </p>
                            <p>&nbsp;</p>
                            <p class="price">Precio: Bs.F <?php echo $precio; ?></p>
                            <br />
                            <?php if ($idUsuario != null) {?>
                            <div class="listingbtns"> <span class="listbuttons"> <?php echo anchor('producto/carritoDeCompras/'. $idUsuario.'/'.$nombreUser. '/'.$idProducto, "Añadir al Carrito", array('title' => 'Añadir')); ?></span> </div>
                            <?php }else { ?>
                            <div class="listingbtns"> <span class="listbuttons"> <?php echo anchor('producto/carritoDeCompras/', "Añadir al Carrito", array('title' => 'Añadir')); ?></span> </div>
                            <?php } ?>
                            
                            
                            
                            
                            
                              <a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-text="Te invito a chequear este producto: " data-lang="es" data-hashtags="TiendaAmazonAS">Twittear</a>   
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='http://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            
                            
                            <!--
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Save This</a></li>
                                    <li><a href="#tabs-2">Send This</a></li>

                                    <li><a href="#tabs-3">Report This</a></li>
                                </ul>
                                <div id="tabs-1" class="hiddentab">
                                    <p><img src="/amazonAS/images/fav.gif" alt="FAv" width="18" height="13" />&nbsp;<a href="#">To My Favorites</a></p>
                                    <p><img src="/amazonAS/images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">To Email Alerts</a></p>
                                    <p><img src="/amazonAS/images/sms.gif" alt="sms" width="18" height="16" />&nbsp;<a href="#">To SMS Alerts</a></p>
                                </div>
                                <div id="tabs-2" class="hiddentab">
                                    <p><img src="/amazonAS/images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">By Email</a></p>
                                    <p><img src="/amazonAS/images/sms.gif" alt="sms" width="18" height="16" />&nbsp;<a href="#">By SMS</a></p>
                                </div>
                                <div id="tabs-3" class="hiddentab">
                                    <p><img src="/amazonAS/images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">Report Spam</a></p>
                                </div>

                            </div>
                            -->

                        </div>

                        <div class="clear">&nbsp;</div>
                    </div>
                    <div id="midraw_details">
                        
                        <div id="imagesgallerylisting">
                            <div class="imagegallink"><a href="#">Ver imágenes</a> <span><?php echo $numFotos; ?> Imágenes Cargadas</span></div>
                        </div>
                        <div class="clear">&nbsp;</div>
                    </div>
                    <div id="moredetails">
                        <div id="listing_details">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><h3>Descripción y Características</h3></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><ul>
                                        
                                            <li><?php echo $descripcion; ?></li>
                                            <?php if ($marca != null) {?><li>Marca: <?php echo $marca; ?></li> <?php }?>
                                            <?php if ($modelo != null) {?><li>Modelo: <?php echo $modelo; ?></li> <?php }?>
                                            <?php if ($color != null) {?><li>Color: <?php echo $color; ?></li> <?php }?>
                                            <?php if ($peso != null) {?><li>Peso: <?php echo $peso; ?></li> <?php }?>
                                            <?php if ($alto != null) {?><li>Alto: <?php echo $alto; ?></li> <?php }?>
                                            <?php if ($ancho != null) {?><li>Ancho: <?php echo $ancho; ?></li> <?php }?>
                                            <?php if ($largo != null) {?><li>Largo: <?php echo $largo; ?></li> <?php }?>
                                            
                                      </ul></td>
                                </tr>
                            </table>
                        </div>
                        <div class="clear">&nbsp;</div>

                    </div>
                    <p>&nbsp;</p>
                    <!--
                    <h1>Similar Items</h1>
                    <ul class="listing"><li>
                            <div class="listinfo">
                                <img src="images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
                            <div class="listingbtns">
                                <span class="listbuttons">
                                    <a href="#">View Details</a></span>
                                <span class="listbuttons">
                                    <a href="#">Add To Favorites</a></span>
                                <span class="listbuttons">
                                    <a href="#">Contact Seller</a></span></div>
                            <div class="clear">&nbsp;</div>
                        </li>

                        <li>
                            <div class="listinfo">
                                <img src="images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
                            <div class="listingbtns">
                                <span class="listbuttons">
                                    <a href="#">View Details</a></span>
                                <span class="listbuttons">
                                    <a href="#">Add To Favorites</a></span>
                                <span class="listbuttons">
                                    <a href="#">Contact Seller</a></span></div>
                            <div class="clear">&nbsp;</div>
                        </li>

                        <li>
                            <div class="listinfo">
                                <img src="images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
                            <div class="listingbtns">
                                <span class="listbuttons">
                                    <a href="#">View Details</a></span>
                                <span class="listbuttons">
                                    <a href="#">Add To Favorites</a></span>
                                <span class="listbuttons">
                                    <a href="#">Contact Seller</a></span></div>
                            <div class="clear">&nbsp;</div>
                        </li>
                    </ul>
                    -->

                </div>
                <div id="home_sidebar">
                    <div class="block smsalert">
                        <p>Create a SMS Alert Filter and we will send you SMS alerts whenever a new lsting match your criteria. What are you waiting for ? It is <strong>absolutely FREE</strong>! Start saving time now!</p>
                        <p><a href="#"><img src="/amazonAS/images/smsbutton.gif" alt="SMS Alerts" /></a></p>
                    </div>
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
            <?php include '/../includes/footer.php';?>
        </div>
    </body>
</html>
