<?php $this->load->view('menu_seccion_por_interprete_view'); ?>
<section class="videos">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        <h1 itemprop="name"><?php echo $fila->inte_nombre?> - <?php echo $video->canc_titulo?></h1>
        <div class="col-sx-12 col-sm-8">
          <div class="video-contenedor">
            <iframe width="720" height="480" src="//www.youtube.com/embed/<?php echo $video->vide_codigo?>?rel=0&controls=0&showinfo=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-sx-12 col-sm-4">
          <?php $this->load->view('adsense/adsense_videos_view');  ?>
        </div>
      </div>
    </div>
  </div>
  <?php if(isset($filas)): ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        <h2>Otros videos de <?php echo $fila->inte_nombre?> recomendados</h2>
        <div class="row">
          
          <?php foreach($filas as $v): ?>
          <div class=" col-xs-12 col-sm-3">
            <!-- start:article -->
            <div class="media">
              
              <div class="media-left">
                <a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>">
                  <img class="media-object" src="<?php echo base_url()?>assets/upload/interpretes/<?php echo $fila->inte_foto?>" alt="<?php echo $fila->inte_nombre?>">
                </a>
              </div>
              
              <div class="media-body">
                <span><a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>">Videos de <?php echo $fila->inte_nombre?></a></span>
                <a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>/<?php echo $v->canc_alias?>">
                <h5 class="media-heading"><?php echo $v->canc_titulo?></h5></a>
              </div>
            </div>
            
          </div>
          <!-- end:article -->
          <?php endforeach; ?>
          
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  
  <?php //$this->load->view('fb_comentarios_view'); ?>
</section>