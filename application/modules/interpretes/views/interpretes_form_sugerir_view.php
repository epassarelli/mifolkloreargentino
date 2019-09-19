<div class="row">
<div class="panel panel-default">

  <div class="panel-heading">
    <h1 class="panel-title">Sugerir interprete</h1>
  </div>
  
  <div class="panel-body">

  
	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>
  <div class="alert alert-danger"><p><?php echo @$mensaje?></p></div>
  <?php echo form_open_multipart('interpretes/sugerir');?>

  <div class="col-md-6">

    <div class="form-group">
      <label for="titulo">Nombre del Grupo o Solista</label>    
      <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre', @$nombre)?>" placeholder="Ej: Los de la guitarra"> 
    </div>

    <div class="form-group">
      <label for="userfile">Foto</label>
      <input type="file" class="form-control" name="userfile">
      <p class="help-block">La foto debe ser .JPG, no pesar más de 300 kb y se recortará a un tamaño máximo de 640 x 480 px.<br></p>
    </div>

    <div class="form-group">
      <div class="g-recaptcha" data-sitekey="6LcEtjIUAAAAAKs-QTqMVw6vsZs-Z11iFUHyQnzY"></div>
      <button type="submit" class="btn btn-success">Sugerir</button>
    </div>

  </div>

  <div class="col-md-6">
    <div class="form-group">
        <label for="titulo">Trayectoria</label> 
        <textarea class="form-control" name="biografia" rows="10"><?php echo set_value('biografia', @$biografia)?></textarea>
        <span id="helpBlock" class="help-block">Aqu&iacute; puede poner la trayectoria, biografía, etc.</span>
    </div>
  </div>

</form>
  

  </div>
</div>
</div>