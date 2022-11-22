<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_fiestas_tradicionales_view"); } 
?>

<?php $this->load->view($sidebar); ?>

<div class="row">
  <div class="container">
    <p>Esta seccion tiene como finalidad dar a conocer las distintas festividades folkloricas que se realizan por todo el pais y durante todo el año. Los festivales folkloricos de Argentina mas convocantes y tradicionales como aquellos que no lo son tanto pero vienen creciendo año tras año.</p>
    <p>Te invitamos a que nos sugieras un festival en caso de que no lo tengamos en nuestro listado <a href="<?php echo base_url(); ?>admin/festivales/add">:: Sugerir un festival ::</a> </p>

  </div>
</div>



<div class="row">



  <!-- <div class="col-xs-12 col-sm-6 col-md-4 clearfix">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Ultimos festivales agregados</h3>

      </div>

      <div class="box-body">

        <?php if (isset($ultimasFiestas)) : ?>
          <?php foreach ($ultimasFiestas as $fila) : ?>

            <div class="thumbnail">
              <a href="<?php echo base_url() ?>fiestas-tradicionales-argentina/<?php echo $fila->fies_alias ?>" itemprop="url">
                <img class="img-responsive" alt="<?php echo $fila->fies_nombre ?>" title="<?php echo $fila->fies_nombre ?>" src="<?php echo base_url() ?>assets/upload/fiestas/<?php echo $fila->fies_foto; ?>" itemprop="image">

                <div class="caption">
                  <h4 itemprop="name"><?php echo $fila->fies_nombre ?></h4>
                  <p><?php echo substr(trim(strip_tags($fila->fies_detalle)), 0, 150); ?>...</p>
                </div>
              </a>
            </div>

          <?php endforeach; ?>
        <?php else : ?>
          <p>No tenemos fiestas por mostrar</p>
        <?php endif; ?>

      </div>
    </div>
  </div> -->





  <div class="col-xs-12 clearfix">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Festivales mas visitados</h3>

      </div>

      <div class="box-body">
        <div class="row">

          <?php if (isset($fiestasMasVisitadas)) : ?>
            <?php foreach ($fiestasMasVisitadas as $fila) : ?>
              <div class="col-xs-4 clearfix">
                <div class="thumbnail">
                  <a href="<?php echo base_url() ?>fiestas-tradicionales-argentina/<?php echo $fila->fies_alias ?>" itemprop="url">
                    <img class="img-responsive" alt="<?php echo $fila->fies_nombre ?>" title="<?php echo $fila->fies_nombre ?>" src="<?php echo base_url() ?>assets/upload/fiestas/<?php echo $fila->fies_foto; ?>" itemprop="image">

                    <div class="caption">
                      <h4 itemprop="name"><?php echo $fila->fies_nombre ?></h4>
                      <p><?php echo substr(trim(strip_tags($fila->fies_detalle)), 0, 150); ?>...<br>
                        <span class="badge"><?php echo $fila->fies_visitas; ?></span> veces vista
                      </p>
                    </div>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <p>No tenemos fiestas por mostrar</p>
          <?php endif; ?>

        </div>


      </div>
    </div>

  </div>





  <!-- <div class="col-xs-12 col-sm-6 col-md-4 clearfix">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Festivales de este mes</h3>

      </div>

      <div class="box-body">

        <?php if (isset($fiestasMesActual)) : ?>
          <?php foreach ($fiestasMesActual as $fila) : ?>

            <div class="thumbnail">
              <a href="<?php echo base_url() ?>fiestas-tradicionales-argentina/<?php echo $fila->fies_alias ?>" itemprop="url">
                <img class="img-responsive" alt="<?php echo $fila->fies_nombre ?>" title="<?php echo $fila->fies_nombre ?>" src="<?php echo base_url() ?>assets/upload/fiestas/<?php echo $fila->fies_foto; ?>" itemprop="image">

                <div class="caption">
                  <h4 itemprop="name"><?php echo $fila->fies_nombre ?></h4>
                  <p><?php echo substr(trim(strip_tags($fila->fies_detalle)), 0, 150); ?>...</p>
                </div>
              </a>
            </div>

          <?php endforeach; ?>
        <?php else : ?>
          <p>No tenemos fiestas por mostrar</p>
        <?php endif; ?>

      </div>
    </div>
  </div> -->


</div>