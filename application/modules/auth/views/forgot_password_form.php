<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class' => 'form-control input-sm',	
	'placeholder' => 'Ingrese el correo',	
);

$submit = array(
        'name'  => 'reset',
        'type'  => 'submit',
        'value' => 'Enviar el nuevo password',
        'class' => 'btn btn-warning btn-block',
    );

if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email o usaurio';
} else {
	$login_label = 'Email';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="google-site-verification" content="b4e3xgPWj0Fwb1N4ggo93LYs33S1uZ7EAUnyEaIGP90" />
    
    <!-- Stylesheets
    ============================================= -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-social.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.css">
    <style type="text/css">
        body {
          padding: 15px auto;
          margin: 15px auto;
          /*background-color: #683914;*/
        }
    </style>

</head>

<body>


<div class="container">
<div class="row">	

  <div class="col-md-4 col-md-offset-4">


    <div class="social-auth-links text-center">
      <p>- Ingresar con mi red social -</p>
      <a href="<?php echo $authUrl; ?>" class="btn btn-lg btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Ingresar con Facebook</a>
    </div>

<?php echo form_open($this->uri->uri_string()); ?>

		<?php //echo form_label($login_label, $login['id']); ?>
		<?php //echo form_input($login); ?>
		<?php //echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>

	<?php //echo form_submit('reset', 'Enviar el nuevo password'); ?>

    <br>
    <p align="center">Recuperar contrase&ntilde;a</p>

  <div class="form-group">
    <?php echo form_input($login); ?>
    <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
  </div>

  <div class="form-group">
    <?php echo form_input($submit); ?>
  </div>


<?php echo form_close(); ?>

<a href="<?php echo base_url()?>">
  <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Volver al sitio
</a>

</div>
</div>
</div>

</body>

</html>