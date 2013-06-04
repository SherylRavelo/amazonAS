<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Compra los mejores Productos | AmazonAS Venezuela </title>
        <link href="/amazonAS/css/layoutservicioweb.css" rel="stylesheet" type="text/css" />
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
                        <h2><img src="/amazonAS/images/create_indi_usr.jpg" alt="Individual User" width="25" height="22" /> <?php echo "$nombreUser"; ?></h2>   
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
                            <h2>Documentacion - Servicio Web</h2>
                        </div>
                        
                        <div class="container">
                            <br />
                            <p> <h4>  Servicio API para desarrolladores: Búsqueda de productos en AmazonAS</h4> </p>
                            <br />
                            
                            
                            <p> 
                             
                                
<h4> Formato de la URL base </h4>
http://(direccion IP)/amazonAS/api/ <br />
<br />

<h4>Parámetros de búsqueda</h4>
<br />
* palabra (Obligatorio): Nombre del producto a consultar.<br />

* nropagina (Opcional): Nro. específico de página a consultar.<br />

* nroporpagina (Opcional): Nro. de productos listados en el resultado de la consulta.<br />

* formato (Opcional): Formato de salida de los resultados.<br />

<br />


<h4>Métodos de búsqueda</h4>
<br />

<h4>* buscar_palabra</h4>
<br />
- Parámetros: palabra.
<br />

- Resultado: Productos cuyo nombre contengan el valor del parámetro "palabra", listando por defecto los 
10 primeros productos que cumplan con la condición.
<br />
<br />

<h4>* buscar_palabra_por_nropagina</h4>
<br />
- Parámetros: palabra, nropagina.
<br />
- Resultado: Productos cuyo nombre contengan el valor del parámetro "palabra",
mostrando el número de página especificado para el parámetro "nropagina". Por defecto AmazonAS lista
10 productos por página.
<br />
<br />

<h4>* buscar_palabra_por_nroporpagina</h4>
<br />
- Parámetros: palabra, nroporpagina.
<br />
- Resultado: Productos cuyo nombre contengan el valor del parámetro "palabra",
mostrando por página la cantidad de productos especificado para el parámetro "nroporpagina".
Por defecto AmazonAS lista los primeros "nroporpagina" productos encontrados.
<br />
<br />

<h4>* buscar_palabra_por_ambas</h4>
<br />
- Parámetros: palabra, nropagina, nroporpagina.
<br />

Resultado: Productos cuyo nombre contengan el valor del parámetro "palabra",
listando los productos contenidos en la página "nropagina" con la cantidad de productos "nroporpagina".
<br />
<br />




<h4>Llamar métodos</h4>
<br />
Para llamar a los métodos se agrega el nombre de dicho método a la dirección URL base separados por "/", por ejemplo: 
<br />
<br />
http://(direccion IP)/amazonAS/api/buscar_palabra
<br />
<br />
La dirección anterior está llamando al método buscar_palabra.
<br />
<br />

<h4>Enviar argumentos</h4>
<br />

Los argumentos se envían seguidamente del nombre del método, separados por "/"
colocando el parámetro y el argumento.
por ejemplo:
<br />
<br />


> http://(direccion IP)/amazonAS/api/buscar_palabra/palabra/discos

<br />
<br />

La dirección anterior está llamando al método buscar_palabra con el parámetro "palabra" y el argumento a buscar "discos".

<br />
<br />

> http://(direccion IP)/amazonAS/api/buscar_palabra_por_nropagina/palabra/discos/nropagina/3

<br />
<br />

La dirección anterior está llamando al método buscar_palabra_por_nropagina con el argumento del producto a buscar "discos" y el número
de página a mostrar "3".

<br />
<br />



<h4>Formatos de Salida</h4>
<br />


* xml 
<br />
* json
<br />
* jsonp
<br />
* php
<br />
* html
<br />
* csv
<br />

<br />


<h4>Mensajes de error</h4>
<br />
Cuando no se encuentran productos se devuelve el mensaje: "No se encontraron productos para mostrar".


<br />
<br />
<br />
                                
                                
                                 
                                 
                            </p>
                            
                            
                            
                            <p>  
                               <h4>  Explorar API:    
                    <?php echo anchor('home/buscador_api/', "Consultar API", array('title' => 'Consultar API')); ?> </h4> 
                    
                </ul>
                                   
                                   
                            </p>
                            <br /><br />
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div>
                 </div></div>



                <div class="clear">&nbsp;</div>
                
                
            </div>
            <?php include 'includes/footer.php';?>
        </div>
    </body>
</html>


