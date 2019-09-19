<style type="text/css">
  .dia{
    text-align: center;
    font-size: 2em;
    display: block;
    background: #000;
    color: #FFF;   
  }

  .mes{
    text-align: center;
    font-size: 1em;
    border: 1px solid #000;
    padding: 5px;
    display: block;    
  }
</style>

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_artista_1_view"); }?>

<div class="row">

	<div class="col-xs-12 col-sm-8 col-md-8">


	  <div class="box box-warning">
	  
	  <div class="box-header with-border">
	    <h3 class="box-title">Agenda de <?php echo $fila->inte_nombre; ?></h3>

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
	      
	    <?php     
	    foreach($filas as $e):
	          $foto = "assets/upload/interpretes/" . $e->inte_foto;
	          if (is_dir($foto)) 
	            { $foto = "assets/upload/sin_foto.jpg"; }
	    ?> 

	      <li class="item col-xs-12 col-sm-6 col-md-6">
	        <div class="product-img">
	          <img src="<?php echo $foto?>" alt="<?php echo $e->inte_nombre?>" width="50" heigth="50">
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
	      <!-- /.item -->
	    <?php endforeach; ?>
	    </ul>

	    <?php else: ?>
	    
	      <p>No hemos encontrado en nuestra Base de Datos eventos para el d&iacute;a solicitado</p>
	    
	    <?php endif; ?>

    </div>

  </div>
  </div><!-- end:row -->


  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>

		<?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

		<?php echo Modules::run( 'discografias/masVistoPorArtista', $fila->inte_id, 'albu_visitas', 3, 'album' ); ?>

		<?php //echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php //echo Modules::run( 'videos/masVistoPorArtista', $fila->inte_id, 'vide_visitas', 3, 'video' ); ?>

		<?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>
    
    <?php $this->load->view($sidebar); ?>   
    
  </div>


</div>

<!--
	<?php //$this->load->view('cartelera_sidebar_view'); ?>

	<?php //$this->load->view('menu_seccion_por_interprete_view'); ?>

	<?php //if(isset($filas)): ?>
		
		<?php //foreach($filas as $e): ?>
		
		<div class="media">
		  <div class="media-left">
		    <a href="#">
	      <img class="media-object" src="<?php //echo base_url()?>assets/upload/interpretes/<?php //echo $e->inte_foto?>" alt="<?php //echo $e->inte_nombre?>">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><?php //echo $e->even_titulo?> | <?php //echo $e->inte_nombre?></h4>
			<p><strong>Fecha: </strong><?php //echo $e->even_fecha?> - <strong>Provincia: </strong><?php //echo $e->prov_nombre?> - 
			<strong>Localidad: </strong><?php //echo $e->loca_nombre?><p>
			<p><strong>Lugar: </strong><?php //echo $e->even_lugar?> - <strong>Direccion: </strong><?php //echo $e->even_direccion?>
			<strong>Hora: </strong><?php //echo $e->even_hora?><p>
			<p><strong>Detalles: </strong><?php //echo $e->even_detalle?><p>
		  </div>
		</div>
	
		<?php //endforeach; ?>
	

	<?php //else: ?>

        <div class="alert alert-danger" role="alert">No hemos encontrado en nuestra Base de Datos eventos para el artista solicitado</div>

    <?php //endif; ?>
-->