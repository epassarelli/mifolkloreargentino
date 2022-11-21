<div class="row">

  <div class="col-xs-12 col-sm-4 col-md-4">

    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>

  </div>

  <div class="col-xs-12 col-sm-8 col-md-8">

    <section class="discografias">

      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $fila->inte_nombre ?></h3>
        </div>

        <div class="box-body">

          <?php if (count($filas) > 0) : ?>

            <?php $i = 0; ?>

            <?php foreach ($filas as $fil) : ?>

              <?php if ($i % 3 == 0) : ?>

                <?php if ($i == 0) : ?>
                  <div class="row">

                  <?php else : ?>
                  </div>


                  <div class="row">

                  <?php endif; ?>

                <?php endif; ?>


                <?php
                $foto = "assets/upload/albunes/" . $fil->albu_foto;
                if (is_dir($foto)) {
                  $foto = "assets/upload/sin_foto.jpg";
                }
                ?>

                <div class="col-xs-12 col-sm-4 col-md-4">

                  <div class="thumbnail">
                    <article class="thumb thumb-lay-two discografias" itemscope="" itemtype="http://schema.org/Article">
                      <div class="thumb-wrap relative">
                        <a itemprop="url" href="<?php echo base_url() ?>discografia-de-<?php echo $fila->inte_alias ?>/<?php echo $fil->albu_alias ?>">
                          <img itemprop="image" src="<?php echo $foto ?>" alt="<?php echo $fil->albu_titulo ?>" class="img-responsive"></a>
                        <?php echo $fil->albu_anio ?> - <?php echo $fila->inte_nombre ?>
                      </div>
                      <h4 itemprop="name"><a itemprop="url" href="<?php echo base_url() ?>discografia-de-<?php echo $fila->inte_alias ?>/<?php echo $fil->albu_alias ?>"><?php echo $fil->albu_titulo ?></a></h4>
                    </article>
                  </div>

                </div>


                <?php $i++; ?>

              <?php endforeach; ?>

                  </div>

                <?php else : ?>

                  <div class="alert alert-danger" role="alert">Aun no tenemos albunes por mostrar en nuestra discografia</div>

                <?php endif; ?>

        </div>

        <div class="box-footer">

        </div>

      </div>


    </section>



  </div>




  <?php $this->load->view($sidebar); ?>

</div>