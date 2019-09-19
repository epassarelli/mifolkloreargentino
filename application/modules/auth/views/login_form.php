<?php
    $login = array(
        'name'	=> 'login',
        'id'	=> 'login',
        'value' => set_value('login'),
        'maxlength'	=> 80,
        'size'	=> 30,
		'placeholder' => 'Email o usuario',
		'class' => 'form-control input-sm',
    );
    
    if (@$login_by_username AND $login_by_email) 
    {
        $login_label = 'Email o usuario';
        } 
        else if ( @$login_by_username) 
            {
                $login_label = 'Login';
            } 
            else 
                {
                $login_label = 'Email';
                }
    
    $password = array(
        'name'	=> 'password',
        'id'	=> 'password',
        'size'	=> 30,
		'placeholder' => 'Password',
		'class' => 'form-control input-sm',
    );
    
    $remember = array(
        'name'	=> 'remember',
        'id'	=> 'remember',
        'value'	=> 1,
        'checked'	=> set_value('remember'),
        'style' => 'margin:0;padding:0',
    );
    
    $captcha = array(
        'name'	=> 'captcha',
        'id'	=> 'captcha',
        'maxlength'	=> 8,
		'placeholder' => 'Codigo',
    );
    
    $submit = array(
        'name'  => 'submit',
        'type'  => 'submit',
        'value' => 'Entrar',
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
        <p align="center">- o -</p>

    <div class="form-group">
        <?php echo form_input($login); ?>
        <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
    </div>

    <div class="form-group">
        <?php echo form_password($password); ?>
        <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
    </div>

    <?php echo form_checkbox($remember); ?>
    <?php echo form_label('Recordarme', $remember['id']); ?>

    <div class="form-group">
        <?php echo form_input($submit); ?>
    </div>

    <?php echo anchor('/auth/forgot_password/', '¿Password?'); ?>
    - <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Registrarme'); ?>

    <?php echo form_close(); ?>
   
    <a href="<?php echo base_url()?>">
      <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Volver al sitio
    </a>
    
</div>
</div>
</div>




</body>

</html>