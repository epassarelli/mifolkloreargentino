<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Pr&oacute;ximas presentaciones</h3>

	  <div class="box-tools pull-right">
	    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	    </button>
	    <!--
	    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		-->
	  </div>
	</div>
	<!-- /.box-header -->

	<div class="box-body">

	<?php if(isset($shows) and (count($shows) > 0) ): ?>

	<ul class="products-list product-list-in-box">	

		<?php foreach($shows as $e): ?>
		
		<?php 
	      $foto = "assets/upload/interpretes/" . $fila->inte_foto;
	      if (is_dir($foto)) 
	      	{ $foto = "assets/upload/sin_foto.jpg"; }
		?>


	      <li class="item">
	        <div class="product-img">
	          <img src="<?php echo $foto?>" alt="<?php echo $e->inte_nombre?>">
	        </div>
	        <div class="product-info">
	          <?php echo $e->even_titulo?> | <?php echo $e->inte_nombre?>
	          <span class="product-description">
	            <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $e->even_lugar?><br>
	              <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $e->even_direccion?> - 
	              <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $e->even_hora?> hs.<br>
	              <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $e->loca_nombre?>, <?php echo $e->prov_nombre?></p>
	          </span>
	        </div>
	      </li>

		<?php endforeach; ?>
	
	</ul>


	<?php else: ?>
		
	    <p>No tenemos agendado ningún evento próximo de <?php echo $fila->inte_nombre?>. Agregar un nuevo show del artista</p>

		<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/shows/add" role="button">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar un show</a>
	    
	<?php endif; ?>

	</div>
	<!-- /.box-body -->
	
	<div class="box-footer text-center" style="">
	  <a href="<?php echo site_url('shows-de-'.$fila->inte_alias)?>" class="uppercase">Ver todos sus shows</a>
	</div>


</div>

