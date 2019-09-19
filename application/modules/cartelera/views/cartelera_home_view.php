<style>
  .dia{
    text-align: center;
    font-size: 2em;
    display: block;
    background: #000;
    color: #FFF;   
  }

  .mes{
    text-align: center;
    font-size: 1em;
    border: 1px solid #000;
    padding: 5px;
    display: block;    
  }
</style>

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_artista_1_view"); }?>

<div class="row">

<div class="col-xs-12 col-sm-8 col-md-8">


  <div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Agenda de shows, recitales y festivales Folkloricos</h3>

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
    <p>Encuentre aqu&iacute; los pr&oacute;ximos shows de folclore en todo el pa&iacute;s. Shows por atistas</p>

    <?php if(isset($filas)): ?>

    <!-- <ul class="products-list product-list-in-box"> -->
      <div class="row">
      
    <?php     
    foreach($filas as $e):
          $foto = "assets/upload/interpretes/" . $e->inte_foto;
          if (is_dir($foto)) 
            { $foto = "assets/upload/sin_foto.jpg"; }

          $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
           
          $dia  = (int) date("d", strtotime($e->even_fecha));
          $mes  = date("m", strtotime($e->even_fecha));
          $mes  = (int) $mes;
          $anio = date("Y", strtotime($e->even_fecha));
    ?> 
    
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i>
            </span>


            <div class="info-box-content">
              <span class="info-box-text"><?php echo $e->even_lugar; ?></span>
              <span class="info-box-number"><?php echo $e->inte_nombre; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo $dia . ' de ' . $meses[$mes]; ?>
                    <div class="box-tools pull-right">
                      <!-- <i class="fa fa-arrow-circle-right"></i> Info -->
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo $e->even_id; ?>">
                        <i class="fa fa-plus-circle"></i> 
                      </button>
                    </div>
                  </span>     
            </div>
            <!-- /.info-box-content -->
            
          </div>
          <!-- /.info-box -->
        </div>



        <div class="modal fade" id="<?php echo $e->even_id; ?>" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $e->inte_nombre; ?></h4>
              </div>
              <div class="modal-body">
                <h4><?php echo $dia . ' de ' . $meses[$mes] . ' de ' . $anio; ?></h4>
                <p>
                  <span class="product-description">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $e->even_lugar?><br>
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $e->even_direccion?> - 
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $e->even_hora?> hs.<br>
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $e->loca_nombre?>, <?php echo $e->prov_nombre?>
                  </span>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


      <!-- <li class="item col-xs-12 col-sm-6 col-md-6">
        <div class="product-img">
          <img src="<?php echo $foto?>" alt="<?php echo $e->inte_nombre?>" width="50" heigth="50">
        </div>
        <div class="product-info">
          <?php echo $e->even_titulo?> | <?php echo $e->inte_nombre?>
          <span class="product-description">
            <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $e->even_lugar?><br>
              <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $e->even_direccion?> - 
              <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $e->even_hora?> hs.<br>
              <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $e->loca_nombre?>, <?php echo $e->prov_nombre?></p>
          </span>
        </div>
      </li> -->
      <!-- /.item -->
    <?php endforeach; ?>
    <!-- </ul> -->
</div>
    <?php else: ?>
    
      <p>No hemos encontrado en nuestra Base de Datos eventos para el d&iacute;a solicitado</p>
    
    <?php endif; ?>


    </div>
  </div>
  </div><!-- end:row -->

  <!-- start:row
  <div class="row">
    		<?php //foreach($filas as $e): ?>
        <div class="col-xs-12 col-sm-6">
        <div class="media">
          <div class="media-left">
            <img class="media-object" src="<?php //echo base_url()?>assets/upload/interpretes/<?php //echo $e->inte_foto?>" alt="<?php //echo $e->inte_nombre?>">
            <span class="dia"><?php //echo date('d',strtotime($e->even_fecha)); ?></span>
            <span class="mes"><?php //echo date('M',strtotime($e->even_fecha)); ?></span>
          </div>
          <div class="media-body">
          <p><?php //echo $e->even_detalle?></p>
          </div>
        </div>
      </div>
    	<?php //endforeach; ?>
  </div>-->

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view($sidebar); ?> 
    
  </div>


</div>



 