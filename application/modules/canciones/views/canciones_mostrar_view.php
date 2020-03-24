  <style>
    .mxm-edit-letra-textarea{
    background-color: #fff;
    padding: 0;
    margin: 0;
    width: 100%;
    height: auto;
    min-height: 400px;
    border: none;
    overflow: auto;
    outline: none;
    resize: none;
    box-shadow: none;
    font-size: 18px;
    line-height: 1.78;
    color: #2c3e50;
    font-style: italic;     
    }
  </style>

<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_enlaces_top_view"); }?>

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_letra_1_view"); }?>

<!-- start:row -->
<div class="row">
                                
    <div class="col-xs-12 col-sm-8">

        <div class="box box-warning">

          <div class="box-header with-border">
          <h3 class="box-title"><?php echo $cancion->canc_titulo;?></h3>

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
            <?php if($cancion->canc_youtube != NULL): ?>    
                    <!-- start:cover video -->
                    <div class="head-video relative">

                        <iframe width="100%" height="580" frameborder="0" src="https://www.youtube.com/embed/<?php echo $cancion->canc_youtube;?>?feature=oembed&amp;wmode=opaque" allowfullscreen="" style="height: 313.6px;">        
                        </iframe>

                    </div>
                    <!-- end:cover video -->
            <?php endif; ?>
              
            <?php if(strlen($cancion->canc_contenido) > 20 ): ?>

              <p><?php echo $cancion->canc_contenido; ?></p>

            <?php else: ?>

              <h4>Letra no disponible</h4>
              <div id="error"></div>
              <div id="mensaje">
                
                  <textarea name="letra" id="letra" spellcheck="true" placeholder="Colaborar con la letra escribiendo aqui..." class="mxm-edit-letra-textarea" style="height: 256px;"></textarea>
                <br>
                <input id="send" name="send" type="submit" value="Sugerir letra" class="btn btn-success btn-sm">
              </div>               

            <?php endif; ?>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <p><?php //echo $cancion->canc_contenido; ?></p>
          </div>
          <!-- box-footer -->
        </div>
        <!-- /.box -->



        
      <?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_view"); } ?>

        
      <!-- Si tiene canciones relacionadas las muestro -->
      <?php if(isset($relacionadas)): ?>

        <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Otras canciones de <strong><?php echo $fila->inte_nombre?></h3>

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
          <ul class="products-list product-list-in-box">

            <?php foreach($relacionadas as $c): ?> 

            <li class="item col-xs-12 col-sm-4 col-md-4">

                <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$c->canc_alias)?>" class="product-title">
                    <?php echo $c->canc_titulo; ?>
                </a>
                <!-- <span class="product-description">
                      <?php echo $fila->inte_nombre?>
                </span> -->

            </li>
            <!-- /.item -->
            <?php endforeach; ?>
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center" style="">
          <a href="javascript:void(0)" class="uppercase">Ver todas las canciones</a>
        </div>
        <!-- /.box-footer -->
        </div>

      <?php endif; ?>
        
            

    </div>





    <div class="col-xs-12 col-sm-4">
    
        <?php $this->load->view('menu_seccion_por_interprete_view'); ?>

        <?php //echo Modules::run( 'canciones/masVistoPorArtista', $fila->inte_id, 5 ); ?>

        <?php echo Modules::run( 'discografias/masVistoPorArtista', $fila->inte_id, 'albu_visitas', 3, 'album' ); ?>

        <?php echo Modules::run( 'cartelera/ultimosPorArtista', $fila->inte_id, 'even_visitas', 3, 'evento' ); ?>

        <?php //echo Modules::run( 'videos/masVistoPorArtista', $fila->inte_id, 'vide_visitas', 3, 'video' ); ?>

        <?php echo Modules::run( 'noticias/ultimasPorArtista', $fila->inte_id, 'noti_visitas', 3, 'noticia' ); ?>
        
        <?php $this->load->view($sidebar); ?>
        
    </div>


</div><!-- end:row -->


  <?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_enlaces_top_view"); }?>


<?php //$this->load->view("canciones_sugerir_form_view");  ?>