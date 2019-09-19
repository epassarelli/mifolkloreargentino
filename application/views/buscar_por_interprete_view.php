<form role="form" action="<?php echo base_url();?>" method="post">
  <div class="form-group">
    <select name="interprete" id="interprete" class="form-control">
		<option value="">Seleccione otro Artista</option>
		<?php foreach($interpretes as $fila): ?>
			<option value="<?php echo base_url();?><?php echo $redirigir;?><?php echo $fila->inte_alias?>"><?php echo $fila->inte_nombre ?></option>
		<?php endforeach; ?>
	</select>
  </div>
</form>