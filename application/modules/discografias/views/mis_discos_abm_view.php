<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>usuarios">Mi Panel</a></li>
	  <li class="active">Mis Discos</li>
	</ol>		
   
	<h1>Mis discos</h1>
	<a class="btn btn-success" href="<?php echo base_url()?>usuarios/misdiscos/nuevo" role="button">Agregar Nuevo</a>	
	<!--Columna izq-->

	<?php if(isset($filas)): ?>
		<table class="table table-hover">
		<thead>
        <tr>
            <th>A&ntilde;o</th>
            <th>Portada</th>
            <th>Titulo</th>
            <th>-</th>            
        </tr>    
        </thead>
        <tbody>
        <?php foreach($filas as $fila): ?>
		<tr>
			<td><?php echo $fila->albu_anio;?></td>
			<td><img src="<?php echo base_url();?>assets/upload/albunes/<?php echo $fila->albu_foto;?>" width="50" height="50" /></td>
			<td><?php echo $fila->albu_titulo;?></td>
			<td><a class="btn btn-success" href="<?php echo base_url()?>usuarios/misdiscos/editar/<?php echo $fila->albu_id?>" role="button">Editar</a></td>
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