<!-- Default box -->
<div class="box">
  
  <div class="box-body">

  <?php if(isset($mensaje)){ echo "<h1>$mensaje</h1>"; } ?>
	<?php echo validation_errors('<div class="alert alert-danger"><p>','</p></div>') ?>

  <?php echo form_open_multipart('mipanel/misnoticias/nueva');?>

  <div class="col-md-6">

    <div class="form-group">
      <label for="titulo">Titulo</label>    
      <input type="text" class="form-control" name="titulo" value="<?php echo set_value('nombre', @$fila->inte_nombre)?>" placeholder="Ej: Los Rojenses"> 
    </div>


    <div class="form-group">
    <label for="provincia">Artista</label>   
        <select name="provincia" id="provincia" class="form-control">
      <?php foreach($provincias as $prov): ?>
        <option value="<?php echo $prov->prov_id ?>" <?php if ($prov->prov_id == @$fila->prov_id) echo 'selected="selected"'; ?>><?php echo $prov->prov_nombre ?></option>
      <?php endforeach; ?>
    </select>
    </div>


    <div class="form-group">
      <label for="userfile">Foto</label>
      <input type="file" class="form-control" name="userfile">
      <p class="help-block">La foto debe ser .JPG, no pesar más de 300 kb y se recortará a un tamaño máximo de 800 x 450 px.<br></p>
    </div>


  </div>



  <div class="col-md-6">
    
    <div class="form-group">
        <label for="titulo">Gacetilla</label> 
        <textarea class="form-control" name="gacetilla" rows="15"><?php echo set_value('gacetilla', @strip_tags(html_entity_decode($fila->inte_gacetilla))); ?></textarea>
        <span id="helpBlock" class="help-block">Detalle de la noticia</span>
    </div>
    

  </div>


  <div class="col-xs-12">
    <div class="form-group">
      <!--       
      <div class="g-recaptcha" data-sitekey="6LcEtjIUAAAAAKs-QTqMVw6vsZs-Z11iFUHyQnzY"></div>
       -->      
      <button type="submit" class="btn btn-success">Enviar</button>
      <a href="<?php echo site_url('mipanel/misnoticias'); ?>" class="btn btn-default"><i class="fa fa-reply"></i> Volver al listado</a>
    </div>    
  </div>

  </form>
  

  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->