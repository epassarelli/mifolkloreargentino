<div class="row">
<div class="panel panel-default">
  <div class="panel-body">


<h3>Sugerir letra de cancion</h3>

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(site_url('canciones/sugerir')) ?>
	
	<div class="form-group">
      <label for="inte_id">Interprete</label>
      <select class="form-control" name="inte_id" >
      	<?php foreach ($interpretes as $inte): ?>
			<option value="<?php echo $inte->inte_id?>"> <?php echo $inte->inte_nombre?> </option> 
		<?php endforeach; ?>
	  </select>

    </div>
	
	<div class="form-group">
      	<label for="canc_titulo">Titulo de la Cancion</label>
 		<input type="text" class="form-control" name="canc_titulo" placeholder="Titulo de la cancion">
      	</select>
    </div>

	<div class="form-group">
      	<label for="canc_youtube">Codigo de Youtube</label>
 		<input type="text" class="form-control" name="canc_youtube" placeholder="Codigo de Youtube">
      	</select>
    </div>

	<div class="form-group">
      	<label for="canc_spotify">Codigo de Spotify</label>
 		<input type="text" class="form-control" name="canc_spotify" placeholder="Codigo de Spotify">
      	</select>
    </div>
	
	<div class="form-group">
      <label for="canc_contenido">Letra</label>
      <textarea class="form-control" name="canc_contenido" rows="10"></textarea>
    </div>
	
	<div class="form-group">
		<input type="hidden" name="user_id" value="<?php echo $this->tank_auth->get_user_id();?>">
		<button type="reset" class="btn btn-warning">Limpiar formulario</button>
        <button type="submit" class="btn btn-success">Agregar cancion</button>
	</div>
	
	</form>

	</div>

    
  </div>
</div>
</div>