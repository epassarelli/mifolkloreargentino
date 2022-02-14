<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_view"); } ?>

<div class="row">

  <div class="col-xs-12">
    
    <p>Artistas folkloricos de nuestro país reunidos en el Portal del Folklore Argentino. Encontrá toda la información relacionada, biografías, letras de canciones, discos editados, proximos shows, gacetillas de prensa y videos musicales. </p>
    <p>Si conocés un grupo folklorico que no se encuentra en nuestro sitio o formás parte de el te invitamos a que lo agregues vos mismo.</p>
  
  </div>


  
  <div class="col-xs-12">

      <div class="box box-warning">
        
        <div class="box-header with-border">
          <h3 class="box-title">Ultimos artistas ingresados</h3>
        </div>
  
        <div class="box-body">
            
          <?php 

            foreach($ultimos as $fila): 
              
              $foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
              if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }

          ?> 
            
            <div class="col-xs-12 col-sm-4 col-md-2 interpretes">
              
              <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>">
                
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto;?>" alt="<?php echo $fila->inte_nombre;?>" title="<?php echo $fila->inte_nombre?>">
              
                <h4 class="profile-username text-center"><?php echo $fila->inte_nombre?></h4>

              </a>

            </div>
            
          <?php endforeach; ?>

        </div>
        
      </div>

  </div>




  <div class="col-xs-12">      

      <div class="box box-warning">
        
        <div class="box-header with-border">
          <h3 class="box-title">Artistas más visitados</h3>
        </div>
  
        <div class="box-body">

          <?php 

            foreach($populares as $fila): 
              
              $foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
              if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }

          ?> 
            
            <div class="col-xs-12 col-sm-4 col-md-2 interpretes">
              
              <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>">
                
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto;?>" alt="<?php echo $fila->inte_nombre;?>" title="<?php echo $fila->inte_nombre?>">
              
                <h4 class="profile-username text-center"><?php echo $fila->inte_nombre?></h4>

              </a>

              <p class="text-muted text-center"><?php echo $fila->inte_visitas;?> visitas</p>

            </div>
            
          <?php endforeach; ?>
        
        
      </div>



  </div>

</div>

 
  
    
    <?php $this->load->view($sidebar); ?> 
  


</div>