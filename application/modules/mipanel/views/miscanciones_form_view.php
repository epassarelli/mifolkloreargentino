<div class="row">
	
	<div class="col-xs-12 col-sm-8 col-md-6">  
	<h1>Agregar una canci&oacute;n</h1>

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>
	
	<div class="form-group">
      <label for="inte_id">Interprete</label>
      <select class="form-control" name="inte_id" >
      	<?php foreach ($interpretes as $inte): ?>
			<option value="<?php echo $inte->inte_id?>"> <?php echo $inte->inte_nombre?> </option> 
		<?php endforeach; ?>
	  </select>

    </div>
	
	<div class="form-group">
      	<label for="canc_id">Titulo de la Cancion</label>
 		<input type="text" class="form-control" name="canc_titulo" placeholder="Titulo de la cancion">
      	</select>
    </div>
	
	<div class="form-group">
      <label for="canc_contenido">Letra</label>
      <textarea class="form-control" name="canc_contenido" rows="10"></textarea>
    </div>
	
	<div class="form-group">
		<input type="hidden" name="user_id" value="<?php echo $this->tank_auth->get_user_id();?>">
		<button type="reset" class="btn btn-warning btn-sm">Limpiar formulario</button>
        <button type="submit" class="btn btn-success btn-sm">Agregar cancion</button>
	</div>
	
	</form>

	</div>
  
  	<div class="col-md-3">
  	
	<h2>Preguntas frecuentes</h2>

  	</div>
 
</div>