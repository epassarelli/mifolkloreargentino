<?php if ($_SERVER['SERVER_NAME'] != 'localhost') {
  $this->load->view("adsense/adsense_comidas_view");
} ?>

<div class="row">

  <div class="col-xs-12">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Comidas tipicas</strong> que comienzan con la letra <?php echo $letra ?></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->

      <div class="box-body">

        <?php if (isset($filas)) : ?>

          <!-- <ul class="products-list product-list-in-box"> -->

          <?php foreach ($filas as $fila) : ?>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-cutlery"></i></span>

                <div class="info-box-content">
                  <span class="progress-description">
                    <a href="<?php echo site_url('recetas-de-comidas-tipicas-con-' . substr($fila->titulo, 0, 1)); ?>">
                      Recetas de comida con letra <?php echo substr($fila->titulo, 0, 1); ?>
                    </a>
                  </span>

                  <span class="info-box-number">
                    <a href="<?php echo site_url('recetas-de-comidas-tipicas/' . $fila->id . '-' . url_title($fila->titulo) . '.html'); ?>">
                      <?php echo $fila->titulo ?>
                    </a>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <!-- <li class="item col-xs-12 col-sm-6 col-md-4">
                    
                    <a href="<?php echo site_url('recetas-de-comidas-tipicas/' . $fila->id . '-' . url_title($fila->titulo) . '.html'); ?>">
                        <?php echo $fila->titulo ?>                          
                    </a>
                    
                    <span class="product-description">
                        <a href="<?php echo site_url('recetas-de-comidas-tipicas-con-' . substr($fila->titulo, 0, 1)); ?>">
                        Recetas de comida con letra <?php echo substr($fila->titulo, 0, 1); ?>                       
                        </a>
                    </span>
                  
                </li> -->

          <?php endforeach; ?>

          <!-- </ul> -->



        <?php else : ?>

          <div class="alert alert-danger" role="alert">
            No hemos encontrado en nuestra Base de Datos recetas de comidas con dicha letra
          </div>

        <?php endif; ?>

      </div>
    </div>

    <?php $this->load->view('comidas_sidebar_view'); ?>

  </div>
</div>