<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li><a href="<?php echo base_url()?>cartelera-folklorica">Cartelera</a></li>
	  <li class="active">Mis eventos</li>
	</ol>		


	  		<a class="btn btn-success" href="<?php echo base_url()?>usuarios/misshows/nuevo" role="button">Agregar Nuevo</a>
            <h4>Ayuda</h4>
            <p>Recuerde que los eventos que se muestran son de todos</p>

		<?php 
		if( isset( $_SESSION['mensje'] ) ) 
		echo "<div>" . $_SESSION['mensje'] . "</div>";
		
		// borro el mensaje de la session
		$_SESSION['mensje'] = '';
		?>

		<h1>Mis próximos eventos</h1>
    
		<?php if(isset($filas)): ?>

		<table class="table table-hover">
		<thead>
        <tr>
        <th>Fecha</th>
        <th>Titulo</th>
        <th>Detalle</th>
        <th>Modificar</th>
        </thead>
		<?php foreach($filas as $e): ?>
			<tr>
			<td><?php echo date('d-m-Y',strtotime($e->even_fecha))?></td>
            <td><?php echo $e->even_titulo?></td>
			<td><?php echo substr($e->even_detalle, 0, 100)?>...</td>
			<td><a class="btn btn-success" href="<?php echo base_url()?>usuarios/misshows/editar/<?php echo $e->even_id?>" role="button">Editar</a></td>
			</tr>		
		<?php endforeach; ?>

		</table>

	<?php else: ?>

		<p>No hemos encontrado en nuestra Base de Datos canciones del interprete solicitado</p>

	<?php endif; ?>
	
	
  </div>
</div>