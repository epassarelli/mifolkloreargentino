<div class="row">

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>
    
  </div>


<div class="col-xs-12 col-sm-8">

  <div class="box box-warning">
  
  <div class="box-header with-border">
    <h3 class="box-title">Fotos de <strong><?php echo $fila->inte_nombre ?></strong></h3>
  </div>

  <div class="box-body">

      <?php if(count($filas) > 0): ?>
      

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php $i = 1; ?>
          <?php foreach($filas as $fil): ?>
          <div class="item <?php if($i == 1) echo 'active'; ?>">
            <?php $foto = base_url()."assets/upload/fotos/".$fil->foto_foto; ?>
            <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>" title="<?php echo $fila->inte_nombre?>">
          </div>
          <?php $i++; ?>
          <?php endforeach; ?>
          
          
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      
      <?php else: ?>
        <div class="alert alert-danger" role="alert">Aun no tenemos fotos por mostrar en nuestra base del interprete deseado</div>
      <?php endif; ?>
      
      <?php //$this->load->view('fb_comentarios_view'); ?>
    </div>
  </div>
</div>