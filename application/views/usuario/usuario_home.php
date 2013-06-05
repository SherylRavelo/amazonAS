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
                    <li><?php echo anchor('perfil/miCuenta/'.$idUsuario, 'Mi Cuenta', array('title' => 'Mi Cuenta')); ?></li>
                    <li><?php echo anchor('home/servicio_web/'. $idUsuario. '/'. $nombreUser, 'Servicio Web', array('title' => 'Servicio Web')); ?></li>
                    
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
                <div id="useractions">
                    <div id="headings"> 
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <?php echo $nombreUser; ?> </h2>   
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



                            <?php echo form_close(); ?>

                        </div>
                    </div></div>


                <div class="clear">&nbsp;</div>
            </div>
                
            <?php include '/../includes/footer.php';?>
        </div>
    </body>
</html>


