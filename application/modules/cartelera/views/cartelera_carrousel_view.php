<?php if(isset($filas)): ?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php 
  $i = 1;
  foreach($filas as $e): 
    
    if($i == 1)
      { $clase = 'active'; }
      else
        { $clase = ''; }
  
  ?>    
    
    <div class="item <?php echo $clase;?>"><img src="<?php echo base_url();?>assets/upload/eventos/<?php echo $e->even_foto;?>" alt="<?php echo $e->even_titulo?>"></div>

  <?php 
  $i++;
  endforeach; 
  ?>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
</div>
        
  <?php else: ?>
    
    <p>No hemos encontrado en nuestra Base de Datos eventos que mostrar</p>
    
  <?php endif; ?>