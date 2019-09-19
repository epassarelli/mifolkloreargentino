<div class="row">
  <div class="col-md-12">	
  	<?php
    switch ($this->session->flashdata('mensaje')) {
    	case 'ok':
    		# code...
    		echo '<div class="alert alert-success"><p>Biografia actualizada correctamente!</p></div>';
    		break;
    	case 'error':
    		# code...
    		echo '<div class="alert alert-danger"><p>Lo sentimos pero NO se pudo actualizar la Biografia</p></div>';
    		break;  
    	default:
    		# code...
    		break;
    }
    ?>
  
  <h1>Editar datos de la biograf&iacute;a / trayectoria</h1>

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>  
  
	<div class="form-group">
      <?php $biografia = html_entity_decode(strip_tags($fila->inte_biografia)); ?>
      <textarea class="form-control" name="biografia" rows="10"><?php echo set_value('biografia', @$biografia)?></textarea>
      <span id="helpBlock" class="help-block">Aqu&iacute; puede poner la trayectoria, etc.</span>
    </div>

	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?php echo $this->tank_auth->get_user_inte_id();?>">
		<button type="submit" class="btn btn-success">Actualizar datos</button>
	</div>
	
	</form>

  </div>
</div>
