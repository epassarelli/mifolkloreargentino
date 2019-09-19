<div class="panel panel-default">

    <div class="panel panel-mfa">
    <div class="panel-body">
        <h2 class="panel-title"><?php echo $title?></h2>
    </div>
    </div>
  
  <a class="btn btn-success btn-block" href="<?php echo base_url();?>sugerir-una-efemeride" role="button">Sugerir una Efemeride</a>

  <div class="panel-body">
	<?php if(isset($filas)): ?>
	<?php foreach($filas as $fila): ?>
        <p><?php echo $fila->efem_contenido?><hr /></p>
    <?php endforeach; ?>
	<?php else: ?>
		<p>No hemos encontrado en nuestra Base de Datos efemerides para el dia de hoy.</p>
	<?php endif; ?>	
  </div>
</div>