<p>Si no encuentra la respuesta a su pregunta por favor contactese con nosotros a través de nuestro correo "mifolkloreargentino@gmail.com"</p>

<?php foreach ($faqs as $faq): ?>

    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $faq->pregunta; ?></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php echo $faq->respuesta; ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

<?php endforeach; ?>