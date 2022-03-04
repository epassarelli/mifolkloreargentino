<!-- Default box -->
<div class="box">
  
  <div class="box-body">
  <?php if(isset($mensaje)){ echo $mensaje; } ?>
	<?php //echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>

  <form method="POST" action="<?php echo site_url('mipanel/interpretes/'.$accion); ?>"  enctype="multipart/form-data" >

  <div class="col-md-6">

    <div class="form-group">
      <label for="titulo">Nombre del Grupo o Solista</label>    
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre', @$fila->inte_nombre)?>" placeholder="Ej: Los Rojenses" > 
      <?php echo form_error('nombre','<span class="text-red">','</span>'); ?>
    </div>


    <div class="form-group">
      <label for="correo">E-mail de contacto</label>    
      <input type="text" class="form-control" id="correo" name="correo" value="<?php echo set_value('correo', @$fila->inte_correo)?>" placeholder="Ej: losrojenses@gmail.com">
      <?php echo form_error('correo','<span class="text-red">','</span>'); ?>
    </div>


    <div class="form-group">
      <label for="titulo">Tel. Contrataciones</label>    
      <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono', @$fila->inte_telefono)?>" placeholder="Ej: 11 15 8888-9999">
      <?php echo form_error('telefono','<span class="text-red">','</span>'); ?> 
    </div>


    <div class="form-group">
      <label for="facebook">Página de Facebook</label>    
      <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo set_value('facebook', @$fila->inte_facebook)?>" placeholder="Ej: https://web.facebook.com/LosRojenses/">
      <?php echo form_error('facebook','<span class="text-red">','</span>'); ?> 
    </div>


    <div class="form-group">
      <label for="youtube">Canal de Youtube</label>    
      <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo set_value('youtube', @$fila->inte_youtube)?>" placeholder="Ej: https://www.youtube.com/channel/UCp0x0iqZJhBIRYhuhwWX91A"> 
    </div>


    <div class="form-group">
      <label for="twitter">Twitter</label>    
      <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo set_value('twitter', @$fila->inte_twitter)?>" placeholder="Ej: https://twitter.com/losrojenses"> 
    </div>


    <div class="form-group">
      <label for="instagram">Instagram</label>    
      <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo set_value('instagram', @$fila->inte_instagram)?>" placeholder="Ej: https://www.instagram.com/losrojenses/"> 
    </div>

  </div>



  <div class="col-md-6">
    
    <div class="form-group">
        <label for="titulo">Trayectoria / Biografía</label> 
        <textarea class="form-control" id="biografia" name="biografia" rows="15" ><?php echo set_value('biografia', @strip_tags(html_entity_decode($fila->inte_biografia))); ?></textarea>
        <?php echo form_error('biografia','<span class="text-red">','</span>'); ?>
        <span id="helpBlock" class="help-block">Aqu&iacute; puede poner la trayectoria, biografía, etc.</span>
    </div>

    
    <div class="form-group">
      <label for="userfile">Foto</label>
      <input type="file" class="form-control" id="userfile" name="userfile" >
      <p class="help-block">La foto debe ser .JPG, no pesar más de 300 kb y se recortará a un tamaño máximo de 480 x 480 px.<br></p>
      <?php echo form_error('userfile','<span class="text-red">','</span>'); ?>
    </div>
    

  </div>


  <div class="col-xs-12">
    <div class="form-group">
      <!--       
      <div class="g-recaptcha" data-sitekey="6LcEtjIUAAAAAKs-QTqMVw6vsZs-Z11iFUHyQnzY"></div>
       -->      
      <input type="submit" value="Guardar" class="btn btn-success">
      <a href="<?php echo site_url('mipanel/' . $this->objeto); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Volver al listado</a>
    </div>    
  </div>

</form>
  

  </div>
  <!-- /.box-body -->


</div>
<!-- /.box -->