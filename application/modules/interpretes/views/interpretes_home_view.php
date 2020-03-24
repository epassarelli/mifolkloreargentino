<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_view"); } ?>

<div class="row">

  <div class="col-xs-12">
    
    <p>Artistas folkloricos de nuestro país reunidos en el Portal del Folklore Argentino. Encontrá toda la información relacionada, biografías, letras de canciones, discos editados, proximos shows, gacetillas de prensa y videos musicales. </p>
    <p>Si conocés un grupo folklorico que no se encuentra en nuestro sitio o formás parte de el te invitamos a que lo agregues vos mismo.</p>

    <?php $this->load->view('interpretes_sugerir_view'); ?>
    <!--
    <a class="btn btn-success" href="<?php echo base_url();?>admin/interpretes/add" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar un Interprete</a>-->
  
  </div>
  
  <div class="col-xs-12 col-sm-8">

      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Ultimas artistas agregadas</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <!--
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          -->
          </div>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <ul class="products-list product-list-in-box">
            
          <?php     
          foreach($ultimos as $fila):
                $foto = "assets/upload/interpretes/" . $fila->inte_foto;
                if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }
          ?> 

            <li class="item col-xs-12 col-sm-6 col-md-4">
              <div class="product-img">
                <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>">
              </div>
              <div class="product-info">
                <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>" class="product-title">
                  <?php echo $fila->inte_nombre; ?>
                </a>
                <span class="product-description">
                      <?php echo $fila->inte_nombre?>
                </span>
              </div>
            </li>
            <!-- /.item -->
          <?php endforeach; ?>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. fin bloque ultimos -->


<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>


      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Artistas más visitados</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <!--
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          -->
          </div>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <ul class="products-list product-list-in-box">
            
          <?php     
          foreach($populares as $fila):
                $foto = "assets/upload/interpretes/" . $fila->inte_foto;
                if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }
          ?> 

            <li class="item col-xs-12 col-sm-6 col-md-4">
              <div class="product-img">
                <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>">
              </div>
              <div class="product-info">
                <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>" class="product-title">
                  <?php echo $fila->inte_nombre; ?>
                </a>
                <span class="product-description">
                      <span class="badge"><?php echo $fila->inte_visitas;?></span> veces visto
                </span>
              </div>
            </li>
            <!-- /.item -->
          <?php endforeach; ?>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. fin bloque + visitados -->


  </div>

  <!-- Sidebar -->
  <div class="col-xs-12 col-sm-4">
    
    <?php $this->load->view($sidebar); ?> 
  
  </div>

</div>