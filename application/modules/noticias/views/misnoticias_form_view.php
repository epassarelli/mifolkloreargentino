<div class="row">
  <div class="col-md-12">

  
	<h4>Nueva gacetilla / noticia</h4>

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>
	

	<div class="form-group">
    	<div class="row">
        
    	<label for="titulo">Titulo</label>    
		<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo', @$fila->noti_titulo)?>" placeholder="Ej: Adelanto de nuevo CD">

		<label for="detalle">Detalles</label>
      	<textarea class="form-control" name="detalle" rows="10"><?php echo set_value('detalle', @$fila->noti_detalle)?></textarea>

		</div>	
    </div> 

	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
	
	</form>

</div>
</div>