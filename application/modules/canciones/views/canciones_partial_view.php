<div class="box box-warning">
<div class="box-header with-border">
  <h3 class="box-title">Canciones m&aacute;s populares</h3>

  <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <!--
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	-->
  </div>
</div>
<!-- /.box-header -->

<div class="box-body">
  
  <?php if(count($canciones) > 0): ?>

  <ul class="products-list product-list-in-box">    

	<?php foreach($canciones as $fila): ?> 

    <li class="item">

        <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
        	<?php echo $fila->canc_titulo; ?>
        </a>
        <span class="product-description">
              <?php echo $fila->inte_nombre?>
              	<div class="box-tools pull-right">
              		<span class="badge"><?php echo $fila->canc_visitas;?></span> veces vista
          		</div>
        </span>

    </li>
    <!-- /.item -->
	<?php endforeach; ?>
  </ul>
  
  <?php else: ?>

	<p>Aun no tenemos canciones de este artista. Agregar la primer letra de <?php echo $fila->inte_nombre?> </p>

  <?php endif; ?>

</div>
<!-- /.box-body -->
<div class="box-footer text-center" style="">
  <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias)?>" class="uppercase">Ver todas sus canciones</a>
</div>
<!-- /.box-footer -->
</div>
