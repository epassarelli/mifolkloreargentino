<div class="row">

  <?php
  if (count($filas) > 0) :
    $i = 0;
    foreach ($filas as $n) :
      //var_dump('I: ' . $i);
  ?>

      <?php if ($i < 2) : ?>


        <div class="col-xs-12 col-sm-6 h-100 clearfix">
          <div class="box">

            <div class="box-body">

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <?php
                $foto = "assets/upload/noticias/" . $n->noti_foto;
                if (is_dir($foto)) {
                  $foto = "assets/img/noticiasinimagen.jpg";
                }
                ?>
                <img class="img-responsive" src="<?php echo $foto; ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
              </a>

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <h4><?php echo $n->noti_titulo; ?></h4>
              </a>

            </div>

            <div class="box-footer">
              <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
            </div>

          </div>

        </div>

      <?php elseif ($i < 8) : ?>

        <?php if ($i == 2) {
          echo '</div><div class="row">';
        } ?>

        <div class="col-xs-12 col-sm-6 col-md-4 h-100 clearfix">
          <div class="box">

            <div class="box-body">

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <?php
                $foto = "assets/upload/noticias/" . $n->noti_foto;
                if (is_dir($foto)) {
                  $foto = "assets/img/noticiasinimagen.jpg";
                }
                ?>
                <img class="img-responsive" src="<?php echo $foto; ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
              </a>

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <h4><?php echo $n->noti_titulo; ?></h4>
              </a>

            </div>

            <div class="box-footer">
              <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
            </div>

          </div>

        </div>



      <?php else : ?>

        <?php if (($i == 8) or (fmod($i, 4) == 0)) {
          echo '</div><div class="row">';
        } ?>

        <div class="col-xs-12 col-sm-6 col-md-3 h-100">
          <div class="box">

            <div class="box-body">

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <?php
                $foto = "assets/upload/noticias/" . $n->noti_foto;
                if (is_dir($foto)) {
                  $foto = "assets/img/noticiasinimagen.jpg";
                }
                ?>
                <img class="img-responsive" src="<?php echo $foto; ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
              </a>

              <a href="<?php echo site_url('noticias/ver/' . $n->noti_alias); ?>">
                <h4><?php echo $n->noti_titulo; ?></h4>
              </a>

            </div>

            <!-- <div class="box-footer">
							<span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
						</div> -->

          </div>

        </div>


      <?php endif; ?>



    <?php
      $i++;
    endforeach;
    ?>


  <?php else : ?>

    <div class="alert alert-danger" role="alert">
      <p>Aun no tenemos noticias por mostrar en nuestra base del artista solicitado.</p>
    </div>

  <?php endif; ?>





</div>