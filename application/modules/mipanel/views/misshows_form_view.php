<script type="text/javascript">
    $( function() {            
		$("#provincia").change( function() {                
			$("#provincia option:selected").each( function() {
                provincia = $('#provincia').val();                   
				$.post( 
					"<?php echo base_url();?>admin/localidades/getLocalidadesForm", 
					{ provincia : provincia }, 
					function(data) {
                    	$("#localidad").html(data);
                });					
            });            
		});       	
	});	
</script>	



<div class="row">
  <div class="col-md-12">

  
	<h4>Nuevo evento</h4>

	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
    <?php echo form_open(current_url()) ?>
	

	<div class="form-group">
    	<div class="row">
        
        <div class="col-md-6">
    	<label for="titulo">Evento</label>    
		<input type="text" class="form-control" name="titulo" value="<?php echo set_value('titulo', @$fila->even_titulo)?>" placeholder="Ej: Encuentro por el folklore 2015">
		
        </div>   

        <div class="col-md-3">
    	<label for="fecha">Fecha</label>    
		<input type="date" class="form-control" name="fecha" value="<?php echo set_value('fecha', @$fila->even_fecha)?>" >
        </div>
        
        <div class="col-md-3">
    	<label for="hora">Hora</label>    
		<input type="time" class="form-control" name="hora" value="<?php echo set_value('hora', @$fila->even_hora)?>" >        
        </div>
        
        </div>
	</div>	

	<div class="form-group">
	<div class="row">
		<div class="col-md-6">
		<label for="provincia">Provincia</label>   
        <select name="provincia" id="provincia" class="form-control">
			<?php foreach($provincias as $prov): ?>
				<option value="<?php echo $prov->prov_id ?>" <?php if ($prov->prov_id == @$fila->prov_id) echo 'selected="selected"'; ?>><?php echo $prov->prov_nombre ?></option>
			<?php endforeach; ?>
		</select>


		<label for="localidad">Localidad</label>   
        <select name="localidad" id="localidad" class="form-control">
            <?php
			// SI es un nuevo evento
			if( $accion == 'nuevo'):
			?>
			<option value="">Selecciona primero la provincia</option>
			<?php
			// SINO muestro la Localidad 
			else:			
				foreach($localidades as $loc): ?>
				<option value="<?php echo $loc->loca_id ?>" <?php if ($loc->loca_id == @$fila->loca_id) echo 'selected="selected"'; ?>><?php echo $loc->loca_nombre ?></option>
				<?php 
				endforeach; 
			endif;
			?>
    	</select>
    	

    	<label for="lugar">Lugar</label>    
		<input type="text" class="form-control" name="lugar" value="<?php echo set_value('lugar', @$fila->even_lugar)?>" placeholder="Ej: Centro Cultural Horacio Guarany">

    	
        <label for="direccion">Direcci&oacute;n</label>    
		<input type="text" class="form-control" name="direccion" value="<?php echo set_value('direccion', @$fila->even_direccion)?>" placeholder="Ej: Avda. Belgrano Nro 3500">

    	</div>

		<div class="col-md-6">
		<label for="detalle">Detalles</label>
      	<textarea class="form-control" name="detalle" rows="10"><?php echo set_value('detalle', @$fila->even_detalle)?></textarea>
      	
      	<span id="helpBlock" class="help-block">Aqu&iacute; puede poner quien lo organiza, d&oacute;nde se compran entradas y su valor, a d&oacute;nde contactarse para m&aacute;s datos, etc.</span>
		</div>
	</div>	
    </div> 

	
	<div class="form-group">
		<input type="hidden" name="inte_id" value="<?//=$inte_id?>">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
	
	</form>

</div>
</div>