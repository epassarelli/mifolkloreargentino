<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>usuarios">Mi Panel</a></li>
	  <li class="active">Mis Videos</li>
	</ol>		
   
	<h1>Mis Videos</h1>
	<a class="btn btn-success" href="<?php echo base_url()?>usuarios/misvideos/nuevo" role="button">Agregar Nuevo</a>	
	<!--Columna izq-->

	<?php if(isset($filas)): ?>
		<table class="table table-hover">
		<thead>
        <tr>
            <th>Video</th>
            <th>Titulo</th>
            <th>Cancion</th>
            <th>-</th>            
        </tr>    
        </thead>
        <tbody>
        <?php foreach($filas as $fila): ?>
		<tr>
			<td><?php echo $fila->vide_anio;?></td>
			<td><?php echo $fila->vide_titulo;?></td>
			<td><?php echo $fila->albu_titulo;?></td>
			<td><a class="btn btn-success" href="<?php echo base_url()?>usuarios/misvideos/editar/<?php echo $fila->albu_id?>" role="button">Editar</a></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		</table>

	<?php else: ?>

		<p>No hemos encontrado en nuestra Base de Datos lo solicitado</p>

	<?php endif; ?>
	
    
	</div>
	
  </div>
</div>