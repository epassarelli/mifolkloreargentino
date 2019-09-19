<div class="row">
  <div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>mipanel">Mi Panel</a></li>
	  <li><a href="<?php echo base_url()?>mipanel/misshows">Mis eventos</a></li>
	  <li class="active">Agregar Nuevo</li>
	</ol>	


	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>


    <h4>Datos de contacto / Prensa / Contrataciones</h4>


	<div class="form-group">
    	<div class="row">
    	
        <div class="col-md-3">
    	<label for="correo1">Correo</label>    
		<input type="text" class="form-control" name="correo1" value="<?php echo set_value('correo1', @$fila->inte_correo1)?>" >
        </div>
        
        <div class="col-md-3">
    	<label for="correo2">Correo 2</label>    
		<input type="text" class="form-control" name="correo2" value="<?php echo set_value('correo2', @$fila->inte_correo2)?>" >        
        </div>

        <div class="col-md-3">
    	<label for="telefono1">Telefono</label>    
		<input type="text" class="form-control" name="telefono1" value="<?php echo set_value('telefono1', @$fila->inte_telefono1)?>" >        
        </div>        

        <div class="col-md-3">
    	<label for="telefono2">Telefono 2</label>    
		<input type="text" class="form-control" name="telefono2" value="<?php echo set_value('telefono2', @$fila->inte_telefono2)?>" >        
        </div> 
        
        </div>
	</div>	


    <h4>Redes Sociales</h4>

	<div class="form-group">
	<div class="row">
		
		<div class="col-md-3">
    	<label for="facebook">FACEBOOK</label>    
		<input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook', @$fila->inte_facebook)?>" placeholder="Ej: Centro Cultural Horacio Guarany">
    	</div>

		<div class="col-md-3">
        <label for="twitter">TWITTER</label>    
		<input type="text" class="form-control" name="twitter" value="<?php echo set_value('twitter', @$fila->inte_twitter)?>" placeholder="Ej: Avda. Belgrano Nro 3500">
		</div>
		
		<div class="col-md-3">
    	<label for="youtube">YOUTUBE</label>    
		<input type="text" class="form-control" name="youtube" value="<?php echo set_value('youtube', @$fila->inte_youtube)?>" placeholder="Ej: Centro Cultural Horacio Guarany">
    	</div>

		<div class="col-md-3">
        <label for="instagram">INSTAGRAM</label>    
		<input type="text" class="form-control" name="instagram" value="<?php echo set_value('instagram', @$fila->inte_instagram)?>" placeholder="Ej: Avda. Belgrano Nro 3500">
		</div>

	</div>	
    </div> 
    
	

	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?//=$inte_id?>">
		<button type="submit" class="btn btn-success">Actualizar datos</button>
	</div>
	
	</form>

</div>
</div>