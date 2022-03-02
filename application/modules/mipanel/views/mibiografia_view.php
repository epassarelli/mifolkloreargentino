<div class="row">
  <div class="col-md-9">	

    <h1>Biograf&iacute;a del artista</h1>

    <?php
    $foto = base_url() . "assets/upload/interpretes/" . $fila->inte_foto;
    if (is_dir($foto)) { $foto = base_url() . "assets/upload/sin_foto.jpg"; }
    ?>        

    <div class="media">
      <div class="media-left">
        <a href="#">
          <img class="media-object" src="<?php echo $foto; ?>" alt="<?php echo $fila->inte_nombre ?>">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $fila->inte_nombre ?></h4>
        <p><?php echo $fila->inte_biografia ?></p>
      </div>
    </div>
    
    <a href="<?php echo base_url();?>mipanel/mibiografia/editar" class="btn btn-success" type="button">Editar</a>

  </div>

    <div class="col-md-3">

        <h2>Preguntas Frecuentes</h2>

    </div>

</div>
