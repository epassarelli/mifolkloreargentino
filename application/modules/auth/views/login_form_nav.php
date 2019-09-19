<?php
    $login = array( 'name'	=> 'login', 'id' => 'login', 'value' => set_value('login'), 'maxlength'	=> 80, 'size' => 30, );
    if (@$login_by_username AND $login_by_email){
        $login_label = 'Email o usuario';
        } 
        else if ( @$login_by_username){
                $login_label = 'Login';
            } 
            else{
                $login_label = 'Email';
                }
    $password = array( 'name' => 'password', 'id' => 'password', 'size' => 30, );
    $remember = array( 'name' => 'remember', 'id' => 'remember', 'value' => 1, 'checked' => set_value('remember'), 'style' => 'margin:0;padding:0', );
    $captcha = array( 'name' => 'captcha', 'id'	=> 'captcha', 'maxlength' => 8, );
 ?>

<form action="<?php echo base_url()?>auth/login" method="post" class="navbar-form pull-right">
	<input type="text" name="login" placeholder="Email" class="input-small">
	<input type="password" name="password" placeholder="Password" class="input-small">
	<button type="submit" class="btn btn-success btn-small">Entrar</button>
	<a href="<?php echo base_url()?>auth/register" class="btn btn-success btn-small">Registrarme</a>
</form>
