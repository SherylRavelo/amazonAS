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
                    <?php if ($idUsuario != null) { ?>
                        <li class="current"><?php echo anchor('homeusuario/index/' . $idUsuario, "Inicio", array('title' => 'Inicio')); ?></li>
                        <li><?php echo anchor('home/sobre_nosotros/' . $idUsuario . '/' . $nombreUser, 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>


                    <?php } else { ?>
                        <li class="current"><?php echo anchor('home/index/', "Inicio", array('title' => 'Inicio')); ?></li>
                        <li><?php echo anchor('home/sobre_nosotros', 'Sobre Nosotros', array('title' => 'Sobre Nosotros')); ?></li>
                    <?php } ?>

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
                <?php if ($idUsuario != null) { ?>
                    <div id="useractions">
                        <div id="headings"> 
                            <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <?php echo $nombreUser; ?></h2>   
                        </div>
                    </div>
                <?php } else { ?>
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
                <?php } ?>
            </div>
            <div id="content">
                <div id="home_main">
                        <div class="tab">
                            <h2>Carrito de Compras</h2>
                        </div>
                    
                        <br/>
                            <?php echo form_open('ruta/al/controlador/update/function'); ?>

                            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

                                <tr>
                                    <th>Cantidad</th>
                                    <th>Descripción</th>
                                    <th style="text-align:right">Precio</th>
                                    <th style="text-align:right">Sub-Total</th>
                                </tr>
                            

                            <?php $i = 1; ?>

                                
                                <?php foreach ($this->cart->contents() as $items): ?>

                                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                                    <tr>
                                        <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                                        <td>
                                        <?php echo $items['name'];  ?>

                                            <!-- CUANDO TIENE OPCIONES EL CARRITO -->
                                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                                <p>
                                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                                <?php endforeach; echo $items['name'];  ?>
                                                </p>

                                                <?php endif; ?>
                                            <!-- FIN DE CUANDO TIENE OPCIONES EL CARRITO -->

                                        </td>
                                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                    </tr>

                                        <?php $i++; ?>

                                <?php endforeach; ?>

                                <tr>
                                    <td colspan="2"> </td>
                                    <td class="right"><strong>Total</strong></td>
                                    <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                </tr>

                            </table>
                    
                           

                            <p><?php echo form_submit('', 'Actualice su Carrito'); ?></p>
                            <?php echo form_close(); ?>

                    </div>

                    
                
                <div id="home_sidebar"><div class="hot">
                        <h2 class="sidebar_head"> Pagar Pedido </h2>
                        <ul>
                            <?php 
                            $atributos = array('id' => 'form1');
                            $oculto = array('idUsuario' => $idUsuario,'nombreUser' => $nombreUser);
                            echo form_open('pedido/pagarPedido',$atributos,$oculto); 
                            foreach ($formadepago as $i => $pago): ?> 
                            <li>
                                <h3><?php echo form_radio('radio', $pago->id_formadepago, FALSE); echo set_radio('radio', $pago->id_formadepago); echo "Tarjeta $i"; ?></h3>
                                <p class="description">
                                    <?php echo 'Num. Tarjeta: '.$pago->num_tarjeta_credito; ?>
                                    <span class="price"><?php echo "F. Venc: ".$pago->fecha_venc; ?></span>
                                </p>
                                <div class="clear">&nbsp;</div>
                            </li>
                            
                            <?php endforeach; ?>
                            <br/>
                            <p align ="center"><?php echo form_submit('', 'Pagar pedido'); ?></p>
                            <?php echo form_close(); ?>
                        </ul>
                    </div></div>


                <div class="clear">&nbsp;</div>
            </div>

                    <?php include '/../includes/footer.php'; ?>
       
        </div>
    </body>
</html>






