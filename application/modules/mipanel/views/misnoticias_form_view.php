<div class="row">
  <div class="col-md-12">

  
	<!-- <h4>Nuevo evento</h4> -->

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>
	

	<div class="form-group">
    	<div class="row">
        
        <div class="col-md-8">
    	<div class="row">

        <div class="col-md-12">
    	<label for="titulo">Titulo</label>    
		<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo', @$fila->even_titulo)?>" placeholder="Ej: Encuentro por el folklore 2020" id="titulo" >
		</div>
		

		<div class="col-md-8">
		<label for="alias">Alias</label>    
		<input type="text" class="form-control" name="alias" id="alias" value="<?php echo set_value('alias', @$fila->even_alias)?>" > 
		</div>

        <div class="col-md-4">
    	<label for="fecha">Fecha</label>    
		<input type="date" class="form-control" name="fecha" value="<?php echo set_value('fecha', @$fila->even_fecha)?>" >
		</div>

		<div class="col-md-12">
		<label for="interprete">Interprete</label>   
        <select name="interprete[]" id="interpretes" multiple class="form-control chosen-select" data-placeholder="Seleccione un interprete..." tabindex="4">
		<option value=""></option>
			<?php foreach($interpretes as $int): ?>
				<option value="<?php echo $int->inte_id ?>" <?php if ($int->inte_id == @$fila->inte_id) echo 'selected="selected"'; ?>><?php echo $int->inte_nombre ?></option>
			<?php endforeach; ?>
		</select>
		</div>	

		<div class="col-md-12">
		<label for="detalle">Detalles</label>
      	<textarea class="form-control" name="detalle" rows="18"><?php echo set_value('detalle', @$fila->even_detalle)?></textarea>
      	
      	<span id="helpBlock" class="help-block">Aqu&iacute; puede poner quien lo organiza, d&oacute;nde se compran entradas y su valor, a d&oacute;nde contactarse para m&aacute;s datos, etc.</span>
		</div>
		</div>
		</div>

		<div class="col-md-4">
			<div class="row">
			<div class="col-md-12">
				<label for="Imagen" class="control-label">Imagen
					<img src="<?php echo base_url('assets/img/400x300.jpg');?>" class="img-responsive" alt="Responsive image" height="300" id="IMG" >
				</label>
					
				<input type="hidden" name="Fileqs" id="Fileqs" class="FileQs" value="">
				
				<input type="file" class="show-for-sr Imagen"  name="noti_img" id="Imagen"  required
									oninvalid="setCustomValidity('La imagen es Obligatoria')" 
									oninput="setCustomValidity('')"
									/>
			</div>
			
			</div>
		</div>
        </div>   

	</div>	


	
	<div class="form-group">
		<input type="hidden" name="show_id" value="<?php echo @$fila->even_id?>">
		<button type="submit" class="btn btn-success"><?php echo $a = ($accion === 'editar') ? 'Editar' : 'Guardar'; ?></button>
		<a href="<?php echo site_url('mipanel/shows'); ?>"><button type="button" class="btn btn-outline-secondary">Volver a listado</button></a>

	</div>
	
	</form>

</div>
</div>