<div class="row">

	<div class="col-sx-12 col-sm-8 col-md-9">

	<div class="box box-warning">
	<div class="box-header with-border">
	  <h3 class="box-title">Radios para escuchar folklore Argentino</h3>
	</div>


	<div class="box-body">

	<?php if(isset($radios)): ?>

	  <ul class="products-list product-list-in-box">
		
		<div class="row">

		<?php foreach ($radios as $fila): ?>


	    <li class="item col-xs-12 col-sm-4 col-md-4">

	        <a href="<?php echo $fila->web?>" target="_blank">
			    <?php echo $fila->nombre?>			    	
			</a>
			
			<a href="<?php echo $fila->urlonline;?>" target="_blank">
				<span class="label label-warning pull-right">			
			    	<i class="fa fa-volume-up"></i> Escuchar				
				</span>
			</a>
			
	        <span class="product-description">
	              <?php echo $fila->fmdial;?> Mhz
	        </span>

	    </li>

		<?php endforeach; ?>
		</div>
	</ul>

	<?php else: ?>
		 <p>No tenemos radios aún</p>
	<?php endif; ?>
	</div>
	</div>
	</div>

	<div class="col-sx-12 col-sm-4 col-md-3">
		<?php $this->load->view($sidebar); ?> 
	</div>

</div>