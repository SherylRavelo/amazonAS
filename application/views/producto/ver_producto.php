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

                <div id="topcategorieslink" class="clear">
                    <h2>Filtar Resultados</h2>
                    <ul>
                        <li><a href="#">Por Precio</a> </li>

                        <li><a href="##">Por Estado </a> </li>
                        
                        <li><a href="##">Por Categoría </a> </li>

                        <li><a class="highlight" href="#" id="click">Buscar otra vez</a> </li>

                    </ul>
                </div>
                <div class="clear">&nbsp;</div>

                <div id="main">
                    <h1>5 Room Villa at PlaceName</h1>
                    <div id="single_item_details">
                        <div id="leftcolumn"><img src="images/imageholder_detailspage.jpg" alt="Image" width="220" height="220" class="previewimg" />


                        </div>

                        <div id="rightcolumn">
                            <h2>New Condo house, modern light &amp; garden. 50 Acres</h2>
                            <p class="user"><img src="images/usericon.gif" alt="user" /> Posted by <a href="#">Chris002</a></p>
                            <p>Ref# :CO1 <br />
                                Posted On : Thursday 05th of February 2009</p>
                            <p>&nbsp;</p>
                            <p class="price">Offered at: $225,000</p>
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Save This</a></li>
                                    <li><a href="#tabs-2">Send This</a></li>

                                    <li><a href="#tabs-3">Report This</a></li>
                                </ul>
                                <div id="tabs-1" class="hiddentab">
                                    <p><img src="images/fav.gif" alt="FAv" width="18" height="13" />&nbsp;<a href="#">To My Favorites</a></p>
                                    <p><img src="images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">To Email Alerts</a></p>
                                    <p><img src="images/sms.gif" alt="sms" width="18" height="16" />&nbsp;<a href="#">To SMS Alerts</a></p>
                                </div>
                                <div id="tabs-2" class="hiddentab">
                                    <p><img src="images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">By Email</a></p>
                                    <p><img src="images/sms.gif" alt="sms" width="18" height="16" />&nbsp;<a href="#">By SMS</a></p>
                                </div>
                                <div id="tabs-3" class="hiddentab">
                                    <p><img src="images/emailalert.gif" alt="email" width="18" height="15" />&nbsp;<a href="#">Report Spam</a></p>
                                </div>

                            </div>

                        </div>

                        <div class="clear">&nbsp;</div>
                    </div>
                    <div id="midraw_details">
                        <div class="listingbtns"> <span class="listbuttons"> <a href="#">Make An Offer</a></span> <span class="listbuttons"> <a href="#">Request Details</a></span> <span class="listbuttons"> <a href="#">Contact Seller</a></span></div>
                        <div id="imagesgallerylisting">
                            <div class="imagegallink"><a href="#">view  Image Gallery</a> <span>12 Images Submitted</span></div>
                        </div>
                        <div class="clear">&nbsp;</div>
                    </div>
                    <div id="moredetails">
                        <div id="listing_details">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><h3>Property Features</h3></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><ul>

                                            <li>Status:  Active-Exclusive Right</li>
                                            <li>County:  Clark</li>
                                            <li>Community Name:  Southern Highlands</li>
                                            <li>Year Built: 2005</li>
                                            <li>3 total bedroom(s)</li>
                                            <li>4 total bath(s)</li>
                                            <li>1 total full bath(s)</li>
                                            <li>2 total three-quarter bath(s)</li>
                                            <li>1 total half bath(s)</li>
                                            <li>Approximately 3220 sq. ft.</li>
                                            <li>Master bedroom is 18X15</li>
                                            <li>Dining room is 14X13</li>
                                            <li>2 fireplaces</li>
                                            <li>Fireplace features:  Gas, In Living/Great room, On Courtyard patio</li>
                                            <li>4 or more car garage</li>
                                        </ul>          </td>
                                    <td><ul>
                                            <li>Attached parking</li>
                                            <li>Heating features:  2+ units, Central, Gas</li>
                                            <li>Central air conditioning</li>
                                            <li>Roofing:  Tile like</li>
                                            <li>Lot is 12632 sq. ft.</li>
                                            <li>Approximately 0.29 acre(s)</li>
                                            <li>Lot size is less than 1/2 acre</li>
                                            <li>Elementary School:  Frias Charles &amp; Phyllis</li>
                                            <li>Jr. High School:  Lawrence</li>
                                            <li>High School:  Sierra Vista High</li>
                                        </ul>
                                        <ul>
                                            <li>Two story</li>
                                            <li>Master bedroom</li>
                                            <li>Dining room</li>
                                            <li>Bathroom(s) on main floor</li>
                                            <li>Bedroom(s) on main floor</li>

                                        </ul></td>
                                </tr>
                            </table>
                        </div>
                        <div class="clear">&nbsp;</div>

                    </div>
                    <p>&nbsp;</p>
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

                </div>
                <div id="home_sidebar">
                    <div class="block smsalert">
                        <p>Create a SMS Alert Filter and we will send you SMS alerts whenever a new lsting match your criteria. What are you waiting for ? It is <strong>absolutely FREE</strong>! Start saving time now!</p>
                        <p><a href="#"><img src="images/smsbutton.gif" alt="SMS Alerts" /></a></p>
                    </div>
                </div>
                <div id="sidebar">
                    <div class="block advert">
                        <img src="images/advertisehere.jpg" alt="Advertise Here" />
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
                        <img src="images/dreamcar.jpg" alt="Own Your Dream Car" />

                    </div>
                    <div class="block"><img src="images/dreamcar.jpg" alt="Own Your Dream Car" /></div>
                    <div class="block"><img src="images/dreamcar.jpg" alt="Own Your Dream Car" /></div>
                </div>

                <div class="clear">&nbsp;</div>
            </div>
            <div id="footer">
                <div id="upperfooter"> <a href="#">Home</a> | <a href="#">Search</a> | <a href="#">Register</a> | <a href="#">Pro Agent Account</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> |<a href="#"> Privacy Policy</a> <a href="#">Terms Of Use</a> | <a href="#">Advertise With Us</a> </div>
                <div id="lowerfooter"> <span class="backtotop"> <a href="#">Back To Top</a> </span>

                    <!-- Removing this link back to Ramblingsoul.com will be violation of the Creative Commons Attribution 3.0 Unported License, under which this template is released for download -->
                    <a href="http://ramblingsoul.com" title="Download High Quality CSS Layouts">CSS Layout</a> by RamblingSoul.com
                    <!-- Copyright - Ramblingsoul.com -->

                </div>
            </div>
        </div>
    </body>
</html>
