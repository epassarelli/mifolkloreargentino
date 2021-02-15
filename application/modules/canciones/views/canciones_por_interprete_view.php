<div class="row">

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>
    
  </div>


<div class="col-xs-12 col-sm-8">

	<div class="box box-warning">
	
	<div class="box-header with-border">
	  <h3 class="box-title">Letras de canciones de <strong><?php echo $fila->inte_nombre ?></strong></h3>
	</div>

	<div class="box-body">
	  	    
	<?php if(count($filas) > 0): ?>
		
		<ul class="products-list product-list-in-box">
		
		<?php foreach($filas as $c): ?> 

		    <li class="item col-xs-12 col-sm-4 col-md-4">

		        <a href="<?php echo site_url('letras-de-canciones-de-'.$c->inte_alias.'/'.$c->canc_alias)?>" class="product-title">
		        	<?php echo $c->canc_titulo; ?><br>
		        	<p><?php echo $fila->inte_nombre ?></p>
		        </a>

		    </li>
	    
		<?php endforeach; ?>

	  </ul>

	<?php else: ?>

		<div>No hemos encontrado en nuestra Base de Datos canciones del interprete solicitado</div>

	<?php endif; ?>

	</div>
	
	</div>

	</div>


	
		<?php //$this->load->view('menu_seccion_por_interprete_view'); ?>
		
		<?php $this->load->view($sidebar); ?>



</div>