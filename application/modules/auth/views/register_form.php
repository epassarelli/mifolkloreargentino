<?php
if ($use_username) {

$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'class' => 'form-control input-sm',
		'placeholder' => 'Nick / Usuario',
	);
}

$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class' => 'form-control input-sm',
	'placeholder' => 'Correo',
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control input-sm',
	'placeholder' => 'Password',
);

$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control input-sm',
	'placeholder' => 'Reingrese el Password',
);

$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control input-sm',
	'placeholder' => 'Ingrese el codigo de seguridad',
);
    
$submit = array(
        'name'  => 'register',
        'type'  => 'submit',
        'value' => 'Registrarse',
        'class' => 'btn btn-warning btn-block',
    );

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

  <br>
  <p align="center">Formulario de registracion</p>
    

	<?php if ($use_username) { ?>

  <div class="form-group">
    <?php //echo form_label('Usuario', $username['id']); ?>
	<?php echo form_input($username); ?>
	<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
  </div>
				
	<?php } ?>

  <div class="form-group">
		<?php //echo form_label('Email', $email['id']); ?>
		<?php echo form_input($email); ?>
		<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
  </div>

  <div class="form-group">
		<?php //echo form_label('Password', $password['id']); ?>
		<?php echo form_password($password); ?>
		<?php echo form_error($password['name']); ?>
  </div>

  <div class="form-group">
		<?php //echo form_label('Repetir Password', $confirm_password['id']); ?>
		<?php echo form_password($confirm_password); ?>
		<?php echo form_error($confirm_password['name']); ?>
  </div>
	
	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
		
			<div id="recaptcha_image"></div>		
		
			<a href="javascript:Recaptcha.reload()">Ver otro CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>			
		
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
		<?php echo form_error('recaptcha_response_field'); ?>
		<?php echo $recaptcha_html; ?>
	
	<?php } else { ?>			

  <div class="form-group">
			<p>Ingrese exactamente el codigo de la imagen:</p>
			<?php echo $captcha_html; ?>
  </div>		
	
  <div class="form-group">
		<?php //echo form_label('Codigo de seguridad', $captcha['id']); ?>
		<?php echo form_input($captcha); ?>
		<?php echo form_error($captcha['name']); ?>
  </div>	
	
	<?php }
	} ?>

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