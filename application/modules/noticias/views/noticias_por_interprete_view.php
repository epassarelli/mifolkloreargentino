<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_noticias_view"); }?>


<div class="row">
	
	<div class="col-xs-12 col-sm-8 col-md-8">
	
	
	<?php if(isset($filas) and count($filas)>0): ?>
	
	<div class="row">
	
	<?php 
		$i = 0;

		foreach ($filas as $n): 

			if( $i%2==0 )
				{ echo '</div><div class="row">'; }			
			?>

		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="box">
			  <div class="box-header with-border">
			    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
					<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
				</a>

			    <!-- /.box-tools -->
			  </div>
			  <!-- /.box-header -->
			  <div class="box-body">
			    <h4 class="box-title">						
			    	<a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
						<?php echo $n->noti_titulo; ?>
					</a>
				</h4>
			  </div>
			  <!-- /.box-body -->
			  <div class="box-footer">
			    <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
			  </div>
			  <!-- box-footer -->
			</div>
			<!-- /.box -->
		</div>

		<?php 
		$i++; 
		endforeach; 
		?>
	
	</div>

	<?php else: ?>
		
		<div class="alert alert-danger" role="alert">
			<p>Aun no tenemos noticias por mostrar en nuestra base del artista solicitado.</p>
		</div>

	<?php endif; ?>	


	</div>



	<div class="col-xs-12 col-sm-4 col-md-4">

	 	<?php $this->load->view('menu_seccion_por_interprete_view'); ?>
	 	
		<?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

		<?php echo Modules::run( 'discografias/masVistoPorArtista', $fila->inte_id, 'albu_visitas', 3, 'album' ); ?>

		<?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php //echo Modules::run( 'videos/masVistoPorArtista', $fila->inte_id, 'vide_visitas', 3, 'video' ); ?>

		<?php //echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>

	</div>

</div>

<?php $this->load->view('noticias_sidebar_view'); ?>