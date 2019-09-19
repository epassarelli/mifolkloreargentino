<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_mitos_view"); }?>

<div class="row">
	
	<div class="col-xs-12 col-sm-8">

	    <div class="box box-warning">
	        
	        <div class="box-header with-border">
	          <h3 class="box-title"><?php echo $filas->titulo?></h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div><!-- /.box-tools -->
	        </div><!-- /.box-header -->
	        
	        <div class="box-body">

				<?php echo $filas->contenido;?>

			</div>

		</div>
	
	<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_mitos_view"); }?>

	</div>



	<div class="col-xs-12 col-sm-4">
		<?php $this->load->view($sidebar); ?> 
	</div>

</div>



  
 

