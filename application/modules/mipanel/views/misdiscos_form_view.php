<!-- Default box -->
<div class="box">  
  
  <div class="box-body">

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open_multipart(current_url()) ?>


	<div class="form-group">   	
    	<label for="interprete">Interprete</label>   
        <select name="interprete" id="interpretes" class="form-control">
			<?php foreach($interpretes as $int): ?>
				<option value="<?php echo $int->inte_id ?>" <?php if ($int->inte_id == @$fila->inte_id) echo 'selected="selected"'; ?>><?php echo $int->inte_nombre ?></option>
			<?php endforeach; ?>
		</select>
	</div>	
	
	<div class="form-group">
    	<label for="anio">A&ntilde;o</label>    
		<input type="number" class="form-control" name="anio" value="<?php echo set_value('anio', @$fila->albu_anio)?>"  min="1900" max="2015" step="1">        
	</div>	
	
	<div class="form-group">		
    	<label for="titulo">Titulo</label>    
		<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo', @$fila->albu_titulo)?>" >
	</div>	
	
	<div class="form-group">
		<label for="foto">Portada</label>   
        <input type="file" name="userfile" size="20" class="form-control" value="<?php echo set_value('foto', @$fila->albu_foto)?>" />
    </div>
        
	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?//=$inte_id?>">
		<button type="submit" class="btn btn-success">Enviar</button>
      	<a href="<?php echo site_url('mipanel/' . $this->objeto); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Volver al listado</a>
	</div>
	
	</form>

  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->