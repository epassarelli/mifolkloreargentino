Bienvenid@ a <?php echo $site_name; ?>,

Gracias por unirte a <?php echo $site_name; ?>. 
Incluimos los detalles de su inicio de sesión a continuación, asegúrate de mantenerlos a salvo.

Siga este enlace para iniciar sesión en el sitio:

<?php echo site_url('/auth/login/'); ?>

<?php if (strlen($username) > 0) { ?>

Su usuario es: <?php echo $username; ?>
<?php } ?>

Su email: <?php echo $email; ?>

<?php /* Your password: <?php echo $password; ?>

*/ ?>

Recuerde que como usuario registrado usted podra agregar contenidos en el sitio como:
- Artistas
- Letras de canciones
- Peñas
- Radios folkloricas y mucho más...

El equipo de <?php echo $site_name; ?>