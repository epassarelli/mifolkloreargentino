<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_home_1_view"); }?>

<div class="row">

	<div class="col-xs-12">

		<p>Las letras de canciones son interpretadas por los artistas folkloricos asociados a las mismas. No significa que dichas letras hayan sido escritas y/o compuestas por los mismos.</p> 
		<p>Simplemente se trata de canciones que son cantadas por dichos artistas del Folklore Argentino y quizás en algunos casos pueda llegar a ser de su autor&iacute;a</p>

	</div>


	<div class="col-xs-12">

		<div class="box box-warning">
		
		<div class="box-header with-border">
		  <h3 class="box-title">Ultimas letras agregadas</h3>
		</div>

		<div class="box-body">
		  <ul class="products-list product-list-in-box">
		    
		<?php 
			foreach($ultimas as $fila): 

              	$foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
              	if (is_dir($foto)) 
                	{ $foto = "assets/upload/sin_foto.jpg"; }
		?> 




		<li class="item col-xs-12 col-sm-4 col-md-3">
			<a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
              
              <div class="product-img">
                <img src="<?php echo $foto; ?>" alt="<?php echo $fila->canc_titulo; ?>">
              </div>
              
              <div class="product-info">
                <?php echo $fila->canc_titulo; ?>

                <span class="product-description">
                    <?php echo $fila->inte_nombre?>
                </span>
                
              </div>

            </a>
        </li>
			
			<?php endforeach; ?>

		  </ul>
		</div>

	</div>



	<div class="box box-warning">
	
	<div class="box-header with-border">
	  <h3 class="box-title">30 Canciones m&aacute;s visitadas por los usuarios</h3>
	</div>

	<div class="box-body">
	  	<ul class="products-list product-list-in-box">
	    
		<?php 
			foreach($xvisitas as $fila): 

              	$foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
              	if (is_dir($foto)) 
                	{ $foto = "assets/upload/sin_foto.jpg"; }
		?> 




		<li class="item col-xs-12 col-sm-4 col-md-3">
			<a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
              
              <div class="product-img">
                <img src="<?php echo $foto; ?>" alt="<?php echo $fila->canc_titulo; ?>">
              </div>
              
              <div class="product-info">
                <?php echo $fila->canc_titulo; ?>

                <span class="product-description">
                    <?php echo $fila->inte_nombre?>
                </span>
                	               
                
			</a>
              <p><?php echo $fila->canc_visitas;?> veces vista	</p>                
              </div>


            
        </li>



		<?php endforeach; ?>
	  	</ul>
		</div>

		</div>

	</div>


    
        <?php $this->load->view($sidebar); ?>
        

</div>