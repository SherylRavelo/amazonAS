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
                    <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>

                    <li><?php echo anchor('home/sobre_nosotros', 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    
                    <li><?php echo anchor('home/servicio_web/', 'Servicio Web', array('title' => 'Servicio Web')); ?></li>
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
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <?php echo anchor('registro', "Crear Cuenta", array('title' => 'registro')); ?></h2>   
                    </div>
                    <div id="login">
                        <p><strong> ¿Ya estás registrado en AmazonAS?</strong> Ingresa aquí con tu cuenta Google</p>
                        <div id="loginform">
                            <?php 
							
							 $formulario = array('id' => 'form1');
                            $this->session->set_userdata(array('num' => 1));
							
							echo form_open('perfil'); ?> <!--<form action="#"> -->
                                <div class="formblock">
                                    <input type="image" src="/amazonAS/images/g+32.png" name="button" id="button" value="Submit" />
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
                            <h2>Buscar productos</h2>
                        </div>
                        <div class="container">
                            <?php 
                            $atributos = array('id' => 'form1');
                            echo form_open('buscar', $atributos);
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



                            <?php echo form_close(); ?>

                        </div>
                    </div></div>

<!--
                <div id="home_sidebar"><div class="hot">
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
                    </div></div>
                
                
                <div id="topcategorieslink" class="clear">
                    <h2>Categorías</h2>
                    <ul>
                        <li><a href="#">Villas</a> </li>

                        <li><a href="#">Houses</a> </li>

                        <li><a href="#">Flats</a> </li>

                        <li><a href="#">Apartments</a> </li>

                        <li><a href="#">Raw Land</a> </li>

                        <li><a href="#">Estates</a> </li>

                        <li><a href="#">Shop / OFfice</a> </li>
                        <li><a href="#">For Rent</a> </li>
                    </ul>
                </div>
                <div class="clear">&nbsp;</div>
                <div id="main"> 
                    <h1>Featured Listing</h1>
                    <ul class="listing">
                        <li>
                            <div class="listinfo">
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                                <img src="/amazonAS/images/imageholder.jpg" alt="Listing Image" class="listingimage" />
                                <h3>5 Room Villa at PlaceName</h3>
                                <p>
                                    Lorem Ipsum Dolor Sit Amet</p>
                                <span class="price">Rs. 500,000  </span>
                                <span class="media"> <img src="/amazonAS/images/icon_img.jpg" alt="Images" width="19" height="15" /> 12 Images <img src="images/videos_icon.jpg" alt="Videos" width="21" height="18" /></span> 1 Video</div>
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
                </div>


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
            <?php $idUsuario = "";?>
            <?php include 'includes/footer.php';?>
        </div>
    </body>
</html>


