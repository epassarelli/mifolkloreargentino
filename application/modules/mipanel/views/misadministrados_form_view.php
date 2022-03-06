<!-- Default box -->
<div class="box">
  
  <div class="box-body">
  <?php if(isset($mensaje)){ echo $mensaje; } ?>
	<?php //echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>

  <form method="POST" action="<?php echo site_url('mipanel/interpretes/'.$accion); ?>"  enctype="multipart/form-data" >

  <div class="col-md-6">

    <div class="form-group">
      <label for="titulo">Nombre del grupo o solista <span class="text-danger">*</span></label>    
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre', @$fila->inte_nombre)?>" required> 
      <?php echo form_error('nombre','<span class="text-red">','</span>'); ?>
    </div>


    <div class="form-group">
      <label for="correo">E-mail de contacto</label>    
      <input type="text" class="form-control" id="correo" name="correo" value="<?php echo set_value('correo', @$fila->inte_correo)?>" >
      <?php echo form_error('correo','<span class="text-red">','</span>'); ?>
    </div>


    <div class="form-group">
      <label for="titulo">Tel. Contrataciones</label>    
      <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono', @$fila->inte_telefono)?>" >
      <?php echo form_error('telefono','<span class="text-red">','</span>'); ?> 
    </div>


    <div class="form-group">
      <label for="facebook">Página de Facebook</label>    
      <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo set_value('facebook', @$fila->inte_facebook)?>" >
      <?php echo form_error('facebook','<span class="text-red">','</span>'); ?> 
    </div>


    <div class="form-group">
      <label for="youtube">Canal de Youtube</label>    
      <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo set_value('youtube', @$fila->inte_youtube)?>" > 
    </div>


    <div class="form-group">
      <label for="twitter">Twitter</label>    
      <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo set_value('twitter', @$fila->inte_twitter)?>" > 
    </div>


    <div class="form-group">
      <label for="instagram">Instagram</label>    
      <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo set_value('instagram', @$fila->inte_instagram)?>" > 
    </div>

  </div>



  <div class="col-md-6">
    
    <div class="form-group">
        <label for="biografia">Trayectoria / Biografía <small id="temaMaxCaracter" class="text-muted">(25 caracteres mínimo)</small> <span class="text-danger">*</span></label> 
        <textarea class="form-control" id="biografia" name="biografia" rows="15" required><?php echo set_value('biografia', @strip_tags(html_entity_decode($fila->inte_biografia))); ?></textarea>
        <?php echo form_error('biografia','<span class="text-red">','</span>'); ?>
    </div>


    <!-- Foto -->
    <div class="form-group">
      <div class="col">
      <label for="userfile">Foto del grupo o solista<span class="text-danger">*</span></label>
        
        <!-- insertar documento -->
        <div class="botonFile">
          <label for="userfile" class="btn btn-primary"> 
          <i class="fa fa-upload text-white" aria-hidden="true" title="Subir foto" alt="Subir foto"></i> Subir foto
          <span class="sr-only"> Adjuntar foto</span> </label>
          <span class="fileIcon titleAd ml-1 text-recursos"> <!-- trae el nombre del documento en PDF del js/interpretes_foto.js --> </span><br>
          <?php echo form_error('userfile','<span class="text-red">','</span>'); ?>
        </div>   
        
        <!-- delete documento -->
        <div class="botonDelete"> 
          <input type="hidden" id="nameFoto" name="nameFoto" value="<?php echo set_value('userfile', @$fila->inte_foto); ?>" class="form-control-file">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalFile">
              <i class="fa fa-trash" aria-hidden="true" title="Borrar foto" alt="Borrar foto"></i><span class="sr-only">Eliminar foto</span>
            </button>
            <span class="ml-1 h6"><?php echo set_value('userfile', @$fila->inte_foto); ?> </span> 
        </div>

        <input type="file" name="userfile" id="userfile" class="sr-only form-control-file" required> 
        <?php echo form_error('userfile','<span class="text-red">','</span>'); ?>

      </div>  
    </div>



    

  </div>


  <div class="col-xs-12">
    <div class="form-group">
    <?php if($accion == 'editar'): ?>
      <input type="hidden" id="id" name="id" value="<?php echo set_value('inte_id', @$fila->inte_id); ?>">
    <?php endif; ?>
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


    <!-- INICIO myModal  -->
    <div class="modal fade" id="modalFile" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalFileLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modalFileLabel"><i class="fa fa-exclamation-triangle text-danger"></i> Advertencia</h3>        
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="font-weight-normal">¿Está seguro que desea eliminar la foto?</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="botonAcepto" class="btn btn-danger Eliminar">Eliminar</button>
            <button type="button" id="botonNoAcepto" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>     
        </div>
      </div>
    </div>
    <!-- FIN myModal  --> 