<div class="row">

	<div class="col-xs-12">
		<p>Las letras de canciones son interpretadas por los artistas folkloricos asociados a las mismas. No significa que dichas letras hayan sido escritas y/o compuestas por los mismos.</p> 
		<p>Simplemente se trata de canciones que son cantadas por dichos artistas del Folklore Argentino y quizás en algunos casos pueda llegar a ser de su autor&iacute;a</p>
	</div>


<div class="row">
	<div class="col-xs-12 col-md-8">

		<div class="box box-warning">
		
		<div class="box-header with-border">
		  <h3 class="box-title">Ultimas letras agregadas</h3>
		</div>

		<div class="box-body">
		  <ul class="products-list product-list-in-box">
		    
			<?php foreach($ultimas as $fila): ?> 

		    <li class="item col-xs-12 col-sm-4 col-md-4">
		      
		        <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
		        	<?php echo $fila->canc_titulo; ?>
		        </a>
		        <span class="product-description">
		              <?php echo $fila->inte_nombre?>
		        </span>
		      
		    </li>
			<?php endforeach; ?>
		  </ul>
		</div>
	</div>



	<div class="box box-warning">
	
	<div class="box-header with-border">
	  <h3 class="box-title">Canciones m&aacute;s visitadas por los usuarios</h3>
	</div>

	<div class="box-body">
	  	<ul class="products-list product-list-in-box">
	    
		<?php foreach($xvisitas as $fila): ?> 

	    <li class="item col-xs-12 col-sm-4 col-md-4">
	      
	        <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title"><?php echo $fila->canc_titulo; ?>
	        </a>
	        <span class="product-description">
	              <?php echo $fila->inte_nombre?>
	        </span>
	        <span class="label label-default "><?php echo $fila->canc_visitas;?></span> veces vista
	      
	    </li>

		<?php endforeach; ?>
	  	</ul>
		</div>

		</div>

	</div>


    <div class="col-xs-12 col-sm-4">
    
        <?php $this->load->view($sidebar); ?>
        
    </div>

</div>