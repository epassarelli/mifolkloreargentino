<!-- Default box -->
<div class="box">
  
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title; ?></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  
  <div class="box-body">


  
	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>

  <?php echo form_open_multipart($this->objeto . '/sugerir');?>

  <div class="col-md-6">

    <div class="form-group">
      <label for="titulo">Nombre del Grupo o Solista</label>    
      <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre', @$nombre)?>" placeholder="Ej: Los Rojenses"> 
    </div>


    <div class="form-group">
      <label for="correo">E-mail de contacto</label>    
      <input type="text" class="form-control" name="correo" value="<?php echo set_value('correo', @$correo)?>" placeholder="Ej: losrojenses@gmail.com"> 
    </div>


    <div class="form-group">
      <label for="titulo">Tel. Contrataciones</label>    
      <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre', @$nombre)?>" placeholder="Ej: 11 15 8888-9999"> 
    </div>


    <div class="form-group">
      <label for="facebook">Página de Facebook</label>    
      <input type="text" class="form-control" name="facebook" value="<?php echo set_value('facebook', @$facebook)?>" placeholder="Ej: https://web.facebook.com/LosRojenses/"> 
    </div>


    <div class="form-group">
      <label for="youtube">Canal de Youtube</label>    
      <input type="text" class="form-control" name="youtube" value="<?php echo set_value('youtube', @$youtube)?>" placeholder="Ej: https://www.youtube.com/channel/UCp0x0iqZJhBIRYhuhwWX91A"> 
    </div>


    <div class="form-group">
      <label for="twitter">Twitter</label>    
      <input type="text" class="form-control" name="twitter" value="<?php echo set_value('twitter', @$twitter)?>" placeholder="Ej: https://twitter.com/losrojenses"> 
    </div>


    <div class="form-group">
      <label for="instagram">Instagram</label>    
      <input type="text" class="form-control" name="instagram" value="<?php echo set_value('instagram', @$instagram)?>" placeholder="Ej: https://www.instagram.com/losrojenses/"> 
    </div>


  </div>



  <div class="col-md-6">
    
    <div class="form-group">
        <label for="titulo">Trayectoria / Biografía</label> 
        <textarea class="form-control" name="biografia" rows="15"><?php echo set_value('biografia', @$biografia)?></textarea>
        <span id="helpBlock" class="help-block">Aqu&iacute; puede poner la trayectoria, biografía, etc.</span>
    </div>

    
    <div class="form-group">
      <label for="userfile">Foto</label>
      <input type="file" class="form-control" name="userfile">
      <p class="help-block">La foto debe ser .JPG, no pesar más de 300 kb y se recortará a un tamaño máximo de 640 x 480 px.<br></p>
    </div>
    

  </div>


  <div class="col-xs-12">
    <div class="form-group">
      <!--       
      <div class="g-recaptcha" data-sitekey="6LcEtjIUAAAAAKs-QTqMVw6vsZs-Z11iFUHyQnzY"></div>
       -->      
      <button type="submit" class="btn btn-success">Enviar Artista Sugerido</button>
      <a href="<?php echo site_url('mipanel/' . $this->objeto); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Volver al listado</a>
    </div>    
  </div>

</form>
  



  </div>
  <!-- /.box-body -->
  
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->

</div>
<!-- /.box -->