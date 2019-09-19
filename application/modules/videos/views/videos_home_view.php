<div class="row">  
<?php if(isset($interpretes)): ?>
  	<?php foreach($interpretes as $fila): ?>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <div class="thumbnail interpretes">
                <?php
                $foto = "assets/upload/interpretes/".$fila->inte_foto;
                if (is_dir($foto)) {
                    $foto = "assets/upload/sin_foto.jpg";
                }
                ?>	
                <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>" title="<?php echo $fila->inte_nombre?>">
                <p><a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias?>"><?php echo $fila->inte_nombre?></a></p>
            </div>
		</div>
  	<?php endforeach; ?>
<?php else: ?>
	<p>No tenemos el video que esta buscando</p>
<?php endif; ?>    
</div>