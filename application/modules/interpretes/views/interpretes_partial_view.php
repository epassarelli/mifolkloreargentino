<h5><?php echo $titulo;?></h5>

<?php foreach($interpretes as $fila): ?>   

    <div class="media">
      <div class="media-left">
        <a itemprop="url" href="<?php echo base_url()?>biografia-de-<?php echo $fila->inte_alias?>">
          <img class="media-object" src="<?php echo base_url()?>assets/upload/interpretes/<?php echo $fila->inte_foto?>" alt="<?php echo $fila->inte_nombre?>">
        </a>
      </div>
      <div class="media-body">
        <span class="published" itemprop="category">Biografias Folkloricas</span>
        <h4 class="media-heading"><a itemprop="url" href="<?php echo base_url()?>biografia-de-<?php echo $fila->inte_alias?>"><?php echo $fila->inte_nombre?></a></h4>
      </div>
    </div>

<?php endforeach; ?>   