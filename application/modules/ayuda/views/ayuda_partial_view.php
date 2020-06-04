<div class="box box-warning">

    <div class="box-header with-border">
      <h5 class="box-title">Preguntas frecuentes</h5>
    </div>

    <div class="box-body">
      <p>Si no encuentra la respuesta a su pregunta por favor contactese con nosotros a través de nuestro formulario de contacto - <a href="<?php echo './contacto'; ?>">
        <i class="fa fa-arrow-right"></i> Ir al formulario</a>
      </p>

      <?php if($faqs > 0): ?>
      <?php foreach ($faqs as $faq): ?>

      <div class="panel box box-default">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
              <?php echo $faq->pregunta; ?>
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
          <div class="box-body">
            <?php echo $faq->respuesta; ?>
          </div>
        </div>
      </div>

      <?php endforeach; ?>
      <?php endif; ?>    


    </div>

</div>