<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
	<div>
          <a href="<?php echo base_url();?>admin/interpretes">Interpretes</a> | 
          <a href="<?php echo base_url();?>admin/discos">Discos</a> | 
          <a href="<?php echo base_url();?>admin/canciones">Canciones</a> | 
          <a href="<?php echo base_url();?>admin/videos">Videos</a> | 
          <a href="<?php echo base_url();?>admin/fotos">Fotos</a> | 
          <a href="<?php echo base_url();?>admin/comidas">Comidas</a> | 
          <a href="<?php echo base_url();?>admin/mitos">Mitos</a> | 
          <a href="<?php echo base_url();?>admin/penias">Pe&ntilde;as</a> | 
          <a href="<?php echo base_url();?>admin/shows">Cartelera</a> | 
          <a href="<?php echo base_url();?>admin/efemerides">Efemerides</a> | 
          <a href="<?php echo base_url();?>admin/usuarios">Usuarios</a> | 
          <a href="<?php echo base_url();?>admin/festivales">Festivales</a> | 
          <a href="<?php echo base_url();?>admin/roles">Roles</a> | 
          <a href="<?php echo base_url();?>admin/faqs">Preguntas Frecuentes</a> | 
          <a href="<?php echo base_url();?>admin/categoriasfaqs">Categorias FAQs</a> | 
          <a href="<?php echo base_url();?>interpretes/sugeridos">Interpretes Sugeridos</a> | 
          <a href="<?php echo base_url();?>interpretes/pendientesDeAdministracion">Solicitudes de Voceros</a> | 	
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
