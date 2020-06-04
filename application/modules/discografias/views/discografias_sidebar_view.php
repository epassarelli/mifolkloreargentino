<div class="col-xs-12 col-sm-8">
	
	<?php echo Modules::run( 'ayuda/index', '1' ); ?>

</div>


<div class="col-xs-12 col-sm-4">

	<div class="box box-warning">
	  
	  <div class="box-header with-border">
	    <h3 class="box-title">Elegir un artista</h3>
	  </div>

	  <div class="box-body">
	    <?php $this->load->view('buscar_por_interprete_view'); ?>

	    <br>
	    	
		<a class="btn btn-success btn-block" href="<?php echo site_url('admin/discos/index/add');?>" role="button">
		  <i class="fa fa-plus"></i> Agregar un disco
		</a>

	  </div>
	  
	</div>

</div>