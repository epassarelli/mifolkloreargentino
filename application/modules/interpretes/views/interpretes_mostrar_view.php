<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_biografias_view"); } ?>

<div class="row">

	<div class="col-xs-12 col-sm-4 col-md-4">

	 	<?php $this->load->view('menu_seccion_por_interprete_view'); ?> 

	</div>


  
  	<div class="col-xs-12 col-sm-8">

		<div class="box box-warning">
		  <div class="box-header with-border">
			<h2 class="box-title">
				<b><?php echo $fila->inte_nombre?></b> biografía e informacion
			</h2>	
		    
		  </div>

		  <div class="box-body">
		    <p><?php echo $fila->inte_biografia?></p>
		  </div>

		  <div class="box-footer">
		    
		  </div>

		</div>

  	</div>




	<?php $this->load->view($sidebar);  ?>


</div>