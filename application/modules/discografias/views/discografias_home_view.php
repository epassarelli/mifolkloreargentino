<div class="row">


  <div class="col-xs-12">

      <div class="box box-warning">
        
        <div class="box-header with-border">
          <h3 class="box-title">Ultimos discos ingresados</h3>
        </div>
  
        <div class="box-body">
            
          <?php 

            foreach($ultimos as $fila): 
              
              $foto = "assets/upload/albunes/" . $fila->albu_foto;
              
              if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }

          ?> 
            
            <div class="col-xs-6 col-sm-6 col-md-3 interpretes">
              
              <a href="<?php echo site_url('discografia-de-') . $fila->inte_alias . '/' . $fila->albu_alias;?>">
                
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto;?>" alt="<?php echo $fila->albu_titulo;?>" title="<?php echo $fila->albu_titulo?>">
              
                <h4 class="text-center"><?php echo $fila->albu_titulo?></h5>
                <p class=" text-center"><?php echo $fila->inte_nombre?></p>

              </a>

            </div>
            
          <?php endforeach; ?>

        </div>
        
      </div>

  </div>



  <div class="col-xs-12">

      <div class="box box-warning">
        
        <div class="box-header with-border">
          <h3 class="box-title">Discos más visitados</h3>
        </div>
  
        <div class="box-body">
            
          <?php 

            foreach($populares as $fila): 
              
              $foto = "assets/upload/albunes/" . $fila->albu_foto;
              
              if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }

          ?> 
            
            <div class="col-xs-12 col-sm-6 col-md-3 interpretes">
              
              <a href="<?php echo site_url('discografia-de-') . $fila->inte_alias . '/' . $fila->albu_alias;?>">
                
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto;?>" alt="<?php echo $fila->albu_titulo;?>" title="<?php echo $fila->albu_titulo?>">
              
                <h4 class="text-center"><?php echo $fila->albu_titulo?></h5>

                <p class="text-center"><?php echo $fila->inte_nombre?>

                <br>
                <?php echo $fila->albu_visitas;?> visitas</p>
              
              </a>

            </div>
            
          <?php endforeach; ?>

        </div>
        
      </div>

  </div>


  <?php $this->load->view($sidebar); ?>

</div>