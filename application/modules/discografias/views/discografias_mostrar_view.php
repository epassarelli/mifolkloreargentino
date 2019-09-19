<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_discografias_view"); }?>


<div class="row">

	<div class="col-xs-12 col-sm-8 col-md-8">

		<div class="box box-warning">
		  <div class="box-header with-border">
				<?php echo $disco->albu_titulo?>	
		    <!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  
		  <div class="box-body">
		  	<?php
			$foto = base_url()."assets/upload/albunes/".$disco->albu_foto;
				if (is_dir($foto)){
					$foto = base_url()."assets/upload/sin_foto.jpg";
					}
			?>	
			<img src="<?php echo $foto; ?>" width="120" height="120" alt="<?php echo $disco->albu_titulo?>" title="<?php echo $disco->albu_titulo?>">
	
		    <p>A&ntilde;o: <?php echo $disco->albu_anio?> - Autor: </p>
			<?php foreach($canciones as $cancion): ?>
				<p><span class="glyphicon glyphicon-music"></span> <a href="<?php echo base_url()?>letras-de-canciones/<?php echo $cancion->canc_id?>-<?php echo url_title($cancion->canc_titulo)?>.html"><?php echo $cancion->canc_titulo?></a></p>        
			<?php endforeach; ?>

		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">

		  </div>
		  <!-- box-footer -->
		</div>
		<!-- /.box -->

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4">

		<?php $this->load->view('menu_seccion_por_interprete_view'); ?>

		<?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

		<?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>

		<?php $this->load->view($sidebar); ?> 

	</div>


</div>