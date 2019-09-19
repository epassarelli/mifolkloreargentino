<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>usuarios">Mi Panel</a></li>
	  <li class="active">Biograf&iacute;a</li>
	</ol>		
   
	
	<!--Columna izq-->

		<?php if(isset($fila)): ?>
		<h1>Biografia de <?php echo $fila->inte_nombre;?></h1>
		<table class="table table-hover">
		<thead>
        <tr>
            <th>Biografia</th>
            <th></th>
        </thead>

			<tr>
			<td><?php echo nl2br($fila->inte_biografia);?></td>
			<td><a class="btn btn-success" href="<?php echo base_url()?>usuarios/mibiografia/editar/<?php echo $fila->inte_id?>" role="button">Editar</a></td>
			</tr>

		</table>

	<?php else: ?>

		<p>No hemos encontrado en nuestra Base de Datos lo solicitado</p>

	<?php endif; ?>
	
    
	</div>
	
  </div>
</div>