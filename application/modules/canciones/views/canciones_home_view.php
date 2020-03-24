<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_home_1_view"); }?>

<div class="row">

	<div class="col-xs-12">
		<p>Las letras de canciones son interpretadas por los artistas folkloricos asociados a las mismas. No significa que dichas letras hayan sido escritas / compuestas por los mismos.</p> 
		<p>Simplemente se trata de canciones que son cantadas por dichos artistas del Folklore Argentino y quizás en algunos casos pueda llegar a ser de su autor&iacute;a</p>
	</div>

</div>


<div class="row">
	<div class="col-xs-12 col-md-8">

		<div class="box box-warning">
		<div class="box-header with-border">
		  <h3 class="box-title">Ultimas letras agregadas</h3>

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
		  <ul class="products-list product-list-in-box">
		    
			<?php 		
			foreach($ultimas as $fila):
			      $foto = "assets/upload/interpretes/" . $fila->inte_foto;
			      if (is_dir($foto)) 
			      	{ $foto = "assets/upload/sin_foto.jpg"; }
			?> 

		    <li class="item col-xs-12 col-sm-4 col-md-4">
<!-- 		      <div class="product-img">
		        <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>" width="50" heigth="50">
		      </div> -->
		      <div class="product-info">
		        <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
		        	<?php echo $fila->canc_titulo; ?>
		        </a>
		        <span class="product-description">
		              <?php echo $fila->inte_nombre?>
		        </span>
		      </div>
		    </li>
		    <!-- /.item -->
			<?php endforeach; ?>
		  </ul>
		</div>
		<!-- /.box-body -->
		<div class="box-footer text-center" style="">
		  <a href="javascript:void(0)" class="uppercase">Ver todas las canciones</a>
		</div>
		<!-- /.box-footer -->
	</div>



	<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_home_1_view"); }?>



	<div class="box box-warning">
	<div class="box-header with-border">
	  <h3 class="box-title">Canciones m&aacute;s visitadas por los usuarios</h3>

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
	  	<ul class="products-list product-list-in-box">
	    
		<?php 		
		foreach($xvisitas as $fila):
		      $foto = "assets/upload/interpretes/" . $fila->inte_foto;
		      if (is_dir($foto)) 
		      	{ $foto = "assets/upload/sin_foto.jpg"; }
		?> 

	    <li class="item col-xs-12 col-sm-4 col-md-4">
<!-- 	      <div class="product-img">
	        <img src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>" width="50" heigth="50">
	      </div> -->
	      <div class="product-info">
	        <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title"><?php echo $fila->canc_titulo; ?>
	        </a>
	        <span class="product-description">
	              <?php echo $fila->inte_nombre?>
	        </span>
	        <span class="label label-default "><?php echo $fila->canc_visitas;?></span> veces vista
	      </div>
	    </li>
	    <!-- /.item -->
		<?php endforeach; ?>
	  	</ul>
		</div>
		<!-- /.box-body -->
		<div class="box-footer text-center" style="">
		  <a href="javascript:void(0)" class="uppercase">Ver todas las canciones</a>
		</div>
		<!-- /.box-footer -->
		</div>

	</div>


    <div class="col-xs-12 col-sm-4">
    
        <?php $this->load->view($sidebar); ?>
        
    </div>


</div><!-- end:row -->