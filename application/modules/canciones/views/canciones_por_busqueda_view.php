<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_home_1_view"); }?>

<div class="row">
	<div class="col-xs-12 col-md-8">



		<div class="box box-warning">
		<div class="box-header with-border">
		  <h3 class="box-title">Resultados de b&uacute;squeda para el t&eacute;rmino: <strong><?php echo $termino; ?></strong></h3>

		  <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		    </button>
		  </div>
		</div>
		<!-- /.box-header -->

		<div class="box-body">
		  	    
		<?php if(count($canciones) > 0): ?>
			
			<ul class="products-list product-list-in-box">
			
			<?php foreach($canciones as $fila): ?> 

		    <li class="item col-xs-12 col-sm-4 col-md-4">

		        <a href="<?php echo base_url()?>letras-de-canciones-de-<?php echo $fila->inte_alias?>/<?php echo $fila->canc_alias?>"><?php echo $fila->canc_titulo?>
			        <span class="product-description">
			            <?php echo $fila->inte_nombre?>
			        </span>
				</a>
		    </li>
		    <!-- /.item -->
			<?php endforeach; ?>
		  </ul>
		
		<?php else: ?>
		
			<p>No tenemos canciones en nuestra Base para su b&uacute;squeda. Intente nuevamente con otro texto.</p>
		
		<?php endif; ?>

		</div>
		<!-- /.box-body -->
		</div>


	</div>
  
    <div class="col-xs-12 col-sm-4">
    
        <?php $this->load->view($sidebar); ?>
        
    </div>


</div><!-- end:row -->
