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
                <ul>    <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>

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
                <div id="shoutout"><img src="/amazonAS/images/joinnow_shoutout.jpg" alt="Join Now! It's Free" width="168" height="126" /></div>
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
            </div>
            <div id="content">
                <div id="home_main"><div id="search"> 
                        <div class="tab">
                            <h2>Sobre Nosotros</h2>
                        </div>
                        
                        <div class="container">
                            <p>  Somos un equipo de desarrolladores conformado por:</p>
                            <br />
                            <p>  Alberyl Martínez <br />
                                 Cel: 0426 - 4132065 <br />
                                 Correo: alberlymartinez@gmail.com 
                            </p>
                            <br /><br />
                            <p>  Sheryl Ravelo <br />
                                 Cel: 0414 - 2122941 <br />
                                 Correo: sheryl.ravelo@gmail.com <br />
                            </p>
                            
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


