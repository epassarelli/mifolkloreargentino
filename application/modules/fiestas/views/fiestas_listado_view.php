<?php $this->load->view($sidebar); ?> 

<div class="row">


  <div class="col-xs-12 col-sm-8">

    <h1 itemprop="name" class="titulo"><?php echo $title;?></h1>  
	

	<?php if(isset($filas)): ?>
	  	
        <div class="row">

        <?php foreach($filas as $fila): ?>
		  
          <div class="col-sm-6">

          <div class="thumbnail">
            <a href="<?php echo base_url()?>fiestas-tradicionales-argentina/<?php echo $fila->fies_alias?>" itemprop="url">
              <img class="img-responsive" alt="<?php echo $fila->fies_nombre?>" title="<?php echo $fila->fies_nombre?>" src="<?php echo base_url()?>assets/upload/fiestas/<?php echo $fila->fies_foto;?>" itemprop="image">
              
              <div class="caption">
              <h4 itemprop="name"><?php echo $fila->fies_nombre?></h4></a>
              <p><?php echo substr(trim(strip_tags($fila->fies_detalle)), 0, 150);?>...</p>
            </div>
          </div>

          </div>

	  	<?php endforeach; ?>

      </div>   
           
	<?php else: ?>
		<div class="alert alert-danger" role="alert">No tenemos fiestas cargadas aun con dicho criterio.</div>
	<?php endif; ?>

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