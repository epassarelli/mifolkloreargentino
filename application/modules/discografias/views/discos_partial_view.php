<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Discos m&aacute;s vistos</h3>

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

	<?php if(isset($discos) and (count($discos) > 0) ): ?>
	  
	  <ul class="products-list product-list-in-box">			

	    
		<?php foreach ($discos as $fila): ?> 
		<?php 
	    $foto = base_url()."assets/upload/albunes/".$fila->albu_foto;
	    if (is_dir($foto)) { $foto = "assets/upload/sin_foto.jpg"; }
	    ?> 
	    <li class="item">
	      <div class="product-img">
		    <a href="<?php echo site_url('discografia-de-'.$fila->inte_alias.'/'.$fila->albu_alias);?>">
			      <img class="img-responsive" src="<?php echo $foto;?>" alt="<?php echo $fila->inte_nombre?>">
			</a>
	      </div>
	      <div class="product-info">
	        <a itemprop="url" href="<?php echo site_url('discografia-de-'.$fila->inte_alias.'/'.$fila->albu_alias);?>"><?php echo $fila->albu_titulo?></a>
	        <span class="product-description">
	            <?php echo $fila->albu_anio?> <span class="badge"><?php echo $fila->albu_visitas;?></span> visitas
	        </span>
	      </div>
	    </li>
	    <!-- /.item -->
		<?php endforeach; ?>
	  </ul>

	<?php else: ?>
			
	    <p>No tenemos discos por mostrar de <?php echo $fila->inte_nombre?>. Vos podes agregar un disco del interprete.</p>

		<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/discos/add" role="button">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar un disco</a>
	        
	<?php endif; ?>

	</div>
	<!-- /.box-body -->
	<div class="box-footer text-center" style="">
	  <a href="<?php echo site_url('discografia-de-'.$fila->inte_alias);?>" class="uppercase">Ver todos los discos</a>
	</div>
	<!-- /.box-footer -->



</div>

