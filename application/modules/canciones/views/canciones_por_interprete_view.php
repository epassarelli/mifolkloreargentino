<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_enlaces_top_view"); }?>

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_artista_1_view"); }?>

<div class="row">

<div class="col-xs-12 col-sm-8">



	<div class="box box-warning">
	
	<div class="box-header with-border">
	  <h3 class="box-title">Letras de canciones de <strong><?php echo $fila->inte_nombre ?></strong></h3>

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
	  
	    
	<?php if(count($filas) > 0): ?>
		
		<ul class="products-list product-list-in-box">
		
		<?php foreach($filas as $c): ?> 

	    <li class="item col-xs-12 col-sm-4 col-md-4">

	        <a href="<?php echo site_url('letras-de-canciones-de-'.$c->inte_alias.'/'.$c->canc_alias)?>" class="product-title">
	        	<?php echo $c->canc_titulo; ?>
	        </a>
	        <span class="product-description">
	              <?php echo $c->inte_nombre?>
	        </span>

	    </li>
	    <!-- /.item -->
		<?php endforeach; ?>

	  </ul>

	<?php else: ?>

		<div>No hemos encontrado en nuestra Base de Datos canciones del interprete solicitado</div>

	<?php endif; ?>

	</div>
	<!-- /.box-body -->

	</div>

		<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_enlaces_top_view"); }?>

	</div>

	<div class="col-xs-12 col-sm-4">
	
		<?php $this->load->view('menu_seccion_por_interprete_view'); ?>


		<?php echo Modules::run( 'discografias/masVistoPorArtista', $fila->inte_id, 'albu_visitas', 3, 'album' ); ?>

		<?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php //echo Modules::run( 'videos/masVistoPorArtista', $fila->inte_id, 'vide_visitas', 3, 'video' ); ?>

		<?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>
		
		<?php $this->load->view($sidebar); ?>


	</div>

</div>
