<ol class="breadcrumb">
  <li><a href="<?php echo base_url()?>">Inicio</a></li>
  <li><a href="<?php echo base_url()?>biografias">Biografias</a></li>
  <li class="active"><?php echo $title?></li>
</ol>

<div class="row">
  <div class="col-md-12">

    <?php //$this->load->view('indice_alfabetico_view');    ?>  
   
    <div class="row">   	               	
		<!--   Columna izquierda   -->
		<div class="col-md-8 col-xs-12">
			<?php if(isset($fila)): ?>
			<div class="row"> 
			
            <div class="col-md-9">
				<h1><?php echo $title?></h1>
				<?php $this->load->view('fb_compartir_view');  ?>
				<hr />
				<span class="glyphicon glyphicon-headphones"></span> - <a href="<?php echo base_url()?>discografias/<?php echo $fila->inte_id?>-<?php echo url_title($fila->inte_nombre)?>.html">Discografia</a>
				 - <span class="glyphicon glyphicon-music"></span> - <a href="<?php echo base_url()?>letras-de-canciones/<?php echo $fila->inte_id?>-<?php echo url_title($fila->inte_nombre)?>.html">Canciones</a>
				 - <span class="glyphicon glyphicon-picture"></span> - <a href="<?php echo base_url()?>fotos/<?php echo $fila->inte_id?>-<?php echo url_title($fila->inte_nombre)?>">Fotos</a>
				 - <span class="glyphicon glyphicon-film"></span> - <a href="<?php echo base_url()?>videos/<?php echo $fila->inte_id?>-<?php echo url_title($fila->inte_nombre)?>">Videos</a>
				 - <span class="glyphicon glyphicon-calendar"></span> - <a href="<?php echo base_url()?>shows/<?php echo $fila->inte_id?>-<?php echo url_title($fila->inte_nombre)?>">Shows</a>
			</div>

			<div class="col-md-3">
				<?
                $foto = "assets/upload/interpretes/".$fila->inte_foto;
				if (is_dir($foto)) { $foto = "assets/upload/sin_foto.jpg"; }
                ?>				
              	<img src="<?php echo base_url()?><?php echo $foto?>" width="150" height="150" alt="<?php echo $fila->inte_nombre?>" title="<?php echo $fila->inte_nombre?>">
            </div>			
			
			<?php echo $fila->inte_biografia?>
			<?php else: ?>
				<p>No tenemos la biografia que esta buscando</p>
			<?php endif; ?> 	  
			</div>
		</div>
	
		<!--   Columna derecha   -->
		<div class="col-md-4 col-xs-12">
			<?php $this->load->view('biografias_sidebar_view');    ?>  		
		</div>
    </div>
	
  </div>
</div>



