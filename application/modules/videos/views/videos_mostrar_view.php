<section class="videos">

  <div class="row">

      <div class="col-xs-12 col-sm-4">
      
        <?php $this->load->view('menu_seccion_por_interprete_view'); ?>
      
      </div>



    <div class="col-xs-12 col-sm-8">

      <div class="box box-warning">

        <div class="box-header with-border">
          <h3 class="box-title">Presentaciones de <strong><?php echo $fila->inte_nombre ?></strong></h3>
        </div>

        <div class="box-body">

          <h1 itemprop="name"><?php echo $fila->inte_nombre?> - <?php echo $video->canc_titulo?></h1>

          <div class="head-video relative">

              <iframe width="100%" height="580" frameborder="0" src="https://www.youtube.com/embed/<?php echo $video->vide_codigo;?>?feature=oembed&amp;wmode=opaque" allowfullscreen="" style="height: 313.6px;">        
              </iframe>

          </div>

        </div>

      </div>

    </div>

  <?php if(isset($filas)): ?>

    <div class="col-xs-12 col-sm-8">

      <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Otros videos de <strong><?php echo $fila->inte_nombre ?></strong></h3>
      </div>

      <div class="box-body">
          
        <ul class="products-list product-list-in-box">
        

        <?php 
          foreach($filas as $v): 

                    $foto = "assets/upload/interpretes/" . $fila->inte_foto;
                  
                    if (is_dir($foto)) 
                      { $foto = "assets/upload/sin_foto.jpg"; }
        ?> 


          <li class="item col-xs-12 col-sm-4 col-md-3">
            <a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>/<?php echo $v->canc_alias?>">
                    
                    <div class="product-img">
                      <img src="<?php echo $foto; ?>" alt="<?php echo $fila->canc_titulo; ?>">
                    </div>
                    
                    <div class="product-info">
                      <?php echo $v->canc_titulo; ?>

                      <span class="product-description">
                          <?php echo $fila->inte_nombre?>
                      </span>
                      
                    </div>

                  </a>
              </li>

          <?php endforeach; ?>

        </ul>
          
        </div>
      </div>
    </div>

  <?php endif; ?>
  </div>  
  <?php //$this->load->view('fb_comentarios_view'); ?>
</section>