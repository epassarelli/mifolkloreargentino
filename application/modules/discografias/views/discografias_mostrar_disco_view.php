<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_discografias_view"); }?>

<div class="row">

	<div class="col-xs-12 col-sm-8 col-md-8">


      <!-- Disco a mostrar -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $disco->albu_titulo;?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">          
        
			<div class="col-md-4 thumbnail">
				<?php $foto = base_url()."assets/upload/albunes/".$disco->albu_foto;
					if (is_dir($foto)){
						$foto = base_url()."assets/upload/sin_foto.jpg";
						}
				?>	
				<img src="<?php echo $foto?>" alt="<?php echo $disco->albu_titulo?>" title="<?php echo $disco->albu_titulo?>">
			</div>
			
			<div class="col-md-8">
			<?php if(isset($canciones)): ?>			
				<ol class="nav nav-stacked">				
					<?php foreach($canciones as $cancion): ?>				
		                <li>
		                	<a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$cancion->canc_alias)?>" class="product-title">
		                	<?php echo $cancion->canc_titulo; ?> 						
							
							<?php if(strlen($cancion->canc_youtube) > 10): ?>
								<i class="pull-right fa fa-fw fa-youtube-play"></i>
							<?php endif; ?>
							<?php if(strlen($cancion->canc_contenido) > 20): ?>
								<i class="pull-right fa fa-fw fa-align-left"></i>
							<?php endif; ?>
		                	</a>
		            	</li>             	
	              	<?php endforeach; ?>             	
              	</ol>
			<?php else: ?>
				<p>A la brevedad asociaremos las canciones a &eacute;ste album</p>
			<?php endif; ?>
			</div>	  

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Año <?php echo $disco->albu_anio;?> 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /. FIN de Disco a mostrar -->

		

	<!-- Discos relacionados del mismo interprete -->
	<?php if(isset($relacionados)): ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Más discos de <?php echo $fila->inte_nombre; ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                      
            <?php $i = 0; ?>

            <?php foreach($relacionados as $fil): ?>

                    <?php if ($i % 3 == 0): ?>
                    
                        <?php if($i == 0): ?>
                            <div class="row">
                            <!-- start:row -->  
                        <?php else: ?>
                            </div>
                            <!-- end:row -->

                            <div class="row">
                            <!-- start:row -->
                        <?php endif; ?>    

                    <?php endif; ?>


                  <?php $foto = base_url()."assets/upload/albunes/".$fil->albu_foto;
                    if (is_dir($foto)) { $foto = "assets/upload/sin_foto.jpg"; }
                  ?>

                    <div class="col-xs-12 col-sm-4 col-md-4">
                    <!-- start:article -->
                        <div class="thumbnail">
                        <article class="thumb thumb-lay-two discografias" itemscope="" itemtype="http://schema.org/Article">
                            <div class="thumb-wrap relative">
                                <a itemprop="url" href="<?php echo base_url()?>discografia-de-<?php echo $fila->inte_alias?>/<?php echo $fil->albu_alias?>">
                                <img itemprop="image" src="<?php echo $foto?>" alt="<?php echo $fil->albu_titulo?>" class="img-responsive"></a>
                                <?php echo $fil->albu_anio?> - <?php echo $fila->inte_nombre?>
                            </div>                   
                            <h4 itemprop="name"><a itemprop="url" href="<?php echo base_url()?>discografia-de-<?php echo $fila->inte_alias?>/<?php echo $fil->albu_alias?>"><?php echo $fil->albu_titulo?></a></h4>
                        </article>
                        </div>
                    <!-- end:article -->
                    </div>
            

            <?php $i++; ?>

            <?php endforeach; ?>

            </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

	<?php endif; ?>
	<!-- /. FIN de Discos relacionados del mismo interprete -->


	
	</div>



	<div class="col-xs-12 col-sm-4 col-md-4">

		<?php $this->load->view('menu_seccion_por_interprete_view'); ?>

		<?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

		<?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

		<?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>

		<?php $this->load->view($sidebar); ?> 

	</div>

</div>