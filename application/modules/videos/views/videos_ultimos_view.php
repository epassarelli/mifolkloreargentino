<h5>Ultimos Videos</h5>

<?php foreach($filas as $vid): ?>

<div class="media">
  
  <div class="media-left">
    <a itemprop="url" href="<?php echo base_url()?>videos-de-<?php echo $vid->inte_alias?>">
      <img class="media-object" src="<?php echo base_url()?>assets/upload/interpretes/<?php echo $vid->inte_foto?>" alt="<?php echo $vid->inte_nombre?>">
    </a>
  </div>
  
  <div class="media-body">
    
    <a href="<?php echo base_url()?>videos-de-<?php echo $vid->inte_alias;?>">Videos de <?php echo $vid->inte_nombre;?></a>
    <h4 class="media-heading"><a itemprop="url" href="<?php echo base_url()?>videos-de-<?php echo $vid->inte_alias?>"><?php echo $vid->canc_titulo;?></a></h4>
    <span class="published" itemprop="category">Folklore Argentino</span>
  </div>

</div>

<?php endforeach; ?>