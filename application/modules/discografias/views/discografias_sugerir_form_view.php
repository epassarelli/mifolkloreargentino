<div class="row">
<div class="panel panel-default">
  <div class="panel-body">	
  
	<h1>Sugerir un Disco</h1>
	<hr>
	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open_multipart(current_url()) ?>


	<div class="form-group">
    	<div class="row">
		
        <div class="col-md-2">
    	<label for="hora">A&ntilde;o</label>    
		<input type="number" class="form-control" name="anio" value="<?php echo set_value('anio', @$fila->albu_anio)?>"  min="1900" max="2015" step="1">        
        </div>    	
		
        <div class="col-md-10">
    	<label for="fecha">Titulo</label>    
		<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo', @$fila->albu_titulo)?>" >
        </div>
        
        </div>
	</div>	
	
	<div class="form-group">
		<label for="provincia">Portada</label>   
        <input type="file" name="userfile" size="20" class="form-control" value="<?php echo set_value('foto', @$fila->albu_foto)?>" />
    </div>
        
	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?//=$inte_id?>">
		<button type="submit" class="btn btn-success btn-sm">Enviar</button>
	</div>
	
	</form>

</div>
</div>
</div>