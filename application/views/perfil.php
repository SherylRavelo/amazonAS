<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Pefil del Usuario</title>
 </head>
 <body>
    <?php
    $this->load->helper('html');
   echo heading('Perfil del usuario',1);
   ?>
   
   <h2>Welcome <?php echo $minombre; ?>!</h2>
   <br />
   <?php echo "TOKEN = ".$token; ?>
   <br />
   <?php echo "  El correo es   =  ".$email; ?>
   
 </body>
</html>
