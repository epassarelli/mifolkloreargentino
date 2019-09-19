<div class="row">
  <div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>usuarios">Mi Panels</a></li>
	  <li><a href="<?php echo base_url()?>usuarios/misvideos">Mis Videos</a></li>
	  <li class="active">Agregar Nuevo</li>
	</ol>	
  
	<h1>Mis Discos</h1>
	<?php echo $error;?>
	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open_multipart(current_url()) ?>


	<div class="form-group">
    	<div class="row">
		
        <div class="col-md-2">
    	<label for="hora">Codigo</label>    
		<input type="text" class="form-control" name="codigo" value="<?php echo set_value('codigo', @$fila->codigo)?>" >        
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