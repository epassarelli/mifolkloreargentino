<?php $this->load->view($sidebar); ?> 


<!-- start:row -->
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8">
    
<!--Columna izq-->
<h1>Eventos folkloricos para el dia <?php echo $dia;?></h1>

<?php if(isset($filas)): ?>
	
	<?php foreach($filas as $e): ?>

	<div class="media">
	  <div class="media-left">
	    <a href="#">
	    <img class="media-object" src="<?php echo base_url()?>assets/upload/interpretes/<?php echo $e->inte_foto?>" alt="<?php echo $e->inte_nombre?>">
	    </a>
	  </div>
	  <div class="media-body">
	    <h4 class="media-heading"><?php echo $e->even_titulo?> - <?php echo $e->even_fecha?> | <?php echo $e->inte_nombre?></h4>
		<p><strong>Provincia: </strong><?php echo $e->prov_nombre?><p>
		<p><strong>Localidad: </strong><?php echo $e->loca_nombre?><p>
		<p><strong>Lugar: </strong><?php echo $e->even_lugar?><p>
		<p><strong>Hora: </strong><?php echo $e->even_hora?><p>
		<p><strong>Direccion: </strong><?php echo $e->even_direccion?><p>
		<p><strong>Detalles: </strong><?php echo $e->even_detalle?><p>
	  </div>
	</div>

	<?php endforeach; ?>
	
	<?php else: ?>

        <div class="alert alert-danger" role="alert">No hemos encontrado en nuestra Base de Datos eventos para el día solicitado</div>

    <?php endif; ?>

</div>

</div><!-- end:row -->    