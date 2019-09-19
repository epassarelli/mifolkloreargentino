<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_discografias_view"); }?>

<div class="row">


<div class="col-xs-12 col-sm-8 col-md-8">


    <section class="discografias">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $fila->inte_nombre?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          

            <?php if(isset($filas)): ?>
            
            <?php $i = 0; ?>

            <?php foreach($filas as $fil): ?>

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

            <?php else: ?>
                
                <div class="alert alert-danger" role="alert">Aun no tenemos albunes por mostrar en nuestra discografia</div>
                
            <?php endif; ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>






  </div>

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>

    
    <?php echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

    <?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

    <?php //echo Modules::run( 'videos/masVistoPorArtista', $fila->inte_id, 'vide_visitas', 3, 'video' ); ?>

    <?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>

    <?php $this->load->view($sidebar); ?> 
    
  </div>


</div>