<div class="row">
  <div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>usuarios">Mi Panel</a></li>
	  <li><a href="<?php echo base_url()?>usuarios/mibiografia">Mi biografia</a></li>
	  <li class="active">Editar</li>
	</ol>	
  

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>
		
	<div class="form-group">
      <label for="detalle">Detalles del evento</label>
      <textarea class="form-control" name="biografia" rows="10"><?php echo set_value('biografia', @$fila->inte_biografia)?></textarea>
      <span id="helpBlock" class="help-block">Aqu&iacute; puede poner quien lo organiza, d&oacute;nde se compran entradas y su valor, a d&oacute;nde contactarse para m&aacute;s datos, etc.</span>
    </div>
	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?//=$inte_id?>">
		<button type="submit" class="btn btn-success btn-sm">Enviar</button>
	</div>
	
	</form>

  
</div>
</div>