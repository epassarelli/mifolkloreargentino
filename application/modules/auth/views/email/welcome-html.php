
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head><meta name="robots" content="noindex, nofollow"><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/> 
<!--[if !mso]><!--> 
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<!--<![endif]-->                                                                             
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<title>Bienvenid@ a <?php echo $site_name; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Bienvenid@ a <?php echo $site_name; ?>!</h2>
Gracias por unirte a <?php echo $site_name; ?>. Incluimos los detalles de su inicio de sesión a continuación, asegúrate de mantenerlos a salvo.<br />
Siga este enlace para iniciar sesión en el sitio:<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/login/'); ?>" style="color: #3366cc;">Ir a <?php echo $site_name; ?> ahora!</a></b></big><br />
<br />
Si el enlace no funciona, copie el siguiente enlace a la barra de direcciones de su navegador:<br />
<nobr><a href="<?php echo site_url('/auth/login/'); ?>" style="color: #3366cc;"><?php echo site_url('/auth/login/'); ?></a></nobr><br />
<br />
<br />
<?php if (strlen($username) > 0) { ?>Su usuario es: <?php echo $username; ?><br /><?php } ?>
Su email: <?php echo $email; ?><br />
<?php /* Your password: <?php echo $password; ?><br /> */ ?>
<br />
<br />
Recuerde que como usuario registrado usted podra agregar contenidos en el sitio como:<br />
- Artistas<br />
- Letras de canciones<br />
- Peñas<br />
- Radios folkloricas y mucho más...<br />
<br />
El equipo de <?php echo $site_name; ?>
</td>
</tr>
</table>
</div>
</body>
</html>