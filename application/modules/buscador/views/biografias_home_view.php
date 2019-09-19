<div class="row">
  <div class="col-md-12">

	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url()?>">Inicio</a></li>
	  <li class="active"><?php echo $title?></li>
	</ol>

 	<div class="row">
		<!--Columna izquierda-->
		<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">  
		<div class="row">
		<?php if(isset($filas)): ?>
		  	<?php foreach($filas as $fila): ?>
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <div class="thumbnail interpretes">
                        <?php $foto = "assets/upload/interpretes/".$fila->inte_foto;
                        if (is_dir($foto)) { $foto = "assets/upload/sin_foto.jpg"; }
                        ?>	
                      	<img src="<?php echo $foto?>" width="180" height="120" alt="<?php echo $fila->inte_nombre?>" title="<?php echo $fila->inte_nombre?>">
                		<p><a href="<?php echo base_url()?>biografia-de-<?php echo $fila->inte_alias?>"><?php echo $fila->inte_nombre?></a></p>
                    </div>
				</div>
		  	<?php endforeach; ?>
		<?php else: ?>
			<p>No tenemos la biografia que esta buscando</p>
		<?php endif; ?>    
		</div>
        </div>

		<!--Columna derecha-->
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<?php $this->load->view('biografias_sidebar_view'); ?>      
		</div> 
  
  </div>
</div>
</div>