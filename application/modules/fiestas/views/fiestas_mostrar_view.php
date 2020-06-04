<?php $this->load->view($sidebar); ?> 

<div class="row">

    <div class="col-xs-12 col-sm-8 col-md-8">
        
        <h1 class="titulo" itemprop="name"><?php echo $festival->fies_nombre;?></h1>

        <div class="thumbnail">
            <img src="<?php echo base_url()?>assets/upload/fiestas/<?php echo $festival->fies_foto;?>" title="<?php echo $festival->fies_nombre?>" alt="<?php echo $festival->fies_nombre?>" class="img-responsive" itemprop="image">
        </div>


        <?php echo $festival->fies_detalle;?>


        <aside class="tags">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>fiestas-tradicionales-argentina">Fiestas Tradicionales</a></li>
                <li><a href="<?php echo base_url()?>fiestas-tradicionales-y-festivales-en-<?php echo $festival->fies_mes;?>"><?php echo ucwords(str_replace("-", " ", $festival->fies_mes));?></a></li>
                <li><a href="<?php echo base_url()?>fiestas-tradicionales-argentina-provincia-<?php echo $festival->fies_provincia;?>"><?php echo ucwords(str_replace("-", " ", $festival->fies_provincia));?></a></li>
            </ol>
        </aside>


    </div>


    <div class="col-xs-12 col-sm-4 col-md-4">

          <h2 class="titulo alert alert-warning">Festivales mas visitados</h2>

          <?php if(isset($fiestasMasVisitadas)): ?>
            <?php foreach($fiestasMasVisitadas as $fila): ?> 

              <div class="thumbnail">
                <a href="<?php echo base_url()?>fiestas-tradicionales-argentina/<?php echo $fila->fies_alias?>" itemprop="url">
                  <img class="img-responsive" alt="<?php echo $fila->fies_nombre?>" title="<?php echo $fila->fies_nombre?>" src="<?php echo base_url()?>assets/upload/fiestas/<?php echo $fila->fies_foto;?>" itemprop="image">
                  
                  <div class="caption">
                  <h4 itemprop="name"><?php echo $fila->fies_nombre?></h4></a>
                  <p><?php echo substr(trim(strip_tags($fila->fies_detalle)), 0, 150);?>...<br>
                <span class="badge"><?php echo $fila->fies_visitas;?></span> veces vista</p>
                </div>
              </div>

            <?php endforeach; ?>
          <?php else: ?>
            <p>No tenemos fiestas por mostrar</p>
          <?php endif; ?>

    </div>

</div>