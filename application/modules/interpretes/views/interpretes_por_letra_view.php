<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>


<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_view"); } ?>

<div class="row">
  
  <div class="col-xs-12 col-sm-8">


    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Artistas con la letra <?php echo $letra;?></h3>

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
        foreach($filas as $fila):
              $foto = "assets/upload/interpretes/" . $fila->inte_foto;
              if (is_dir($foto)) 
                { $foto = "assets/upload/sin_foto.jpg"; }
        ?> 

          <li class="item col-xs-12 col-sm-4 col-md-4">
            <div class="product-img">
              <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>" width="50" heigth="50">
            </div>
            <div class="product-info">
              <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>" class="product-title">
                <?php echo $fila->inte_nombre; ?>
              </a>
              <span class="product-description">
                    <span class="badge"><?php echo $fila->inte_visitas;?></span> veces visitado
              </span>
            </div>
          </li>
          <!-- /.item -->
        <?php endforeach; ?>
        </ul>
      </div>
      <!-- /.box-body -->

    </div>


    <?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_enlaces_top_view"); } ?>


  </div>

  <!-- Sidebar -->
  <div class="col-xs-12 col-sm-4">
    
    <?php $this->load->view($sidebar); ?> 
  
  </div>

</div>