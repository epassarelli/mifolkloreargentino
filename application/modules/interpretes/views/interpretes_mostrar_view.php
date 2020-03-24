<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>


<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_view"); } ?>

<div class="row">
  
  	<div class="col-xs-12 col-sm-8">


		<div class="box box-warning">
		  <div class="box-header with-border">
			<h2 class="box-title">
				<b><?php echo $fila->inte_nombre?></b> biografía e informacion
			</h2>	
		    <!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body">
		    <p><?php echo $fila->inte_biografia?></p>
		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">
		    
		  </div>
		  <!-- box-footer -->
		</div>
		<!-- /.box -->

	
		<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>


  	</div>

  	
  	<!-- Sidebar -->
	<div class="col-xs-12 col-sm-4 col-md-4">

	 	<?php $this->load->view('menu_seccion_por_interprete_view'); ?>
	 	
		<?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

		<?php echo Modules::run( 'discografias/masVistoPorArtista', $fila->inte_id, 'albu_visitas', 3, 'album' ); ?>

		<?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>

		<?php $this->load->view($sidebar); ?> 

	</div>

</div>