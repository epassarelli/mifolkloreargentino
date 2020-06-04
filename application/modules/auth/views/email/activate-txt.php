Bienvenid@ a <?php echo $site_name; ?>,

Gracias por registrarse en <?php echo $site_name; ?>.
Incluimos los detalles de su inicio de sesión a continuación, asegúrate de mantenerlos a salvo.

Verifique su correo registrado haciendo click en el siguiente link:

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>


Verifique su correo electrónico dentro de las <?php echo $activation_period; ?> horas, de lo contrario su registro será inválido y tendrá que registrarse nuevamente. 

<?php if (strlen($username) > 0) { ?>

Su usuario: <?php echo $username; ?>
<?php } ?>

Su email: <?php echo $email; ?>
<?php if (isset($password)) { /* ?>

Your password: <?php echo $password; ?>
<?php */ } ?>

Recuerde que como usuario registrado usted podra agregar contenidos en el sitio como:
- Artistas
- Letras de canciones
- Peñas
- Radios folkloricas y mucho más...

El equipo de <?php echo $site_name; ?>