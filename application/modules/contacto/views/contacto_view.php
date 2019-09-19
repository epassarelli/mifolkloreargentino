<!--
<div class="row">
<div class="panel panel-default">
  <div class="panel-body">	
	<div class="col-md-8 col-md-offset-2">
		<div id="contactus">
-->
			<h1>Contactenos</h1>
			<hr>
			<form role="form" method="post" action="">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Nombre" name="name" >
					<?php echo form_error('name', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Email" name="email">
					<?php echo form_error('email', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" placeholder="Sitio Web" name="website">
					<?php echo form_error('website', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Asunto" name="subject">
					<?php echo form_error('subject', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="5" placeholder="Mensaje" name="message"></textarea>
					<?php echo form_error('message', '<div class="alert alert-danger contact-warning">', '</div>'); ?>
				</div>
				<hr>
				<div class="form-group">
					<button type="reset" class="btn btn-danger">Borrar</button>
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
<!--			
		</div>
	</div>
</div>
</div>
</div>-->