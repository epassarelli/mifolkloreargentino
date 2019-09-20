<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_adaptable_view"); }?>


<div class="row">

	<div class="col-sx-12 col-sm-8 col-md-9">

	<div class="box box-warning">
	<div class="box-header with-border">
	  <h3 class="box-title">Peñas folkóricas para disfrutar nuestro folklore Argentino</h3>

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


	<p>Las pe&ntilde;as folkloricas que figuran en nuestros listados fueron sugeridas por usuarios del sitio. Si ud lo desea puede sugerirno alguna del el formualrio de contacto.</p>




	
	<?php if(isset($penias)): ?>
	<ul class="products-list product-list-in-box">
	<div class="row">

		<?php foreach ($penias as $fila): ?>


		    <li class="item col-xs-12 col-sm-4 col-md-4">

				    <?php echo $fila->peni_nombre?>			    	

				
				
		        <span class="product-description">
		            	  <p> <?php echo $fila->peni_direccion?><br />
			<?php echo $fila->peni_telefono?><br />
			<?php echo $fila->peni_descripcion?>
		  </p>
		        </span>

		    </li>


		<?php endforeach; ?>
	</div>
	</ul>

	<?php else: ?>
	<div class="alert alert-danger" role="alert">Aun no tenemos pe&ntilde;as folkloricas con este criterio. Estamos trabajando para incorporarlas a la brevedad.</div>
	<?php endif; ?>

	</div>	
</div>
</div>


	<div class="col-sx-12 col-sm-4 col-md-3">
		<?php $this->load->view('penias_sidebar_view'); ?> 
		<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/penias/add" role="button">Sugerir Pe&ntilde;a Folklorica</a> 
	</div>

</div>

