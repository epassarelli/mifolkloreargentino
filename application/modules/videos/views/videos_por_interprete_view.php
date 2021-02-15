<section class="videos">

	<div class="row">

	  	<div class="col-xs-12 col-sm-4">
	    
	    	<?php $this->load->view('menu_seccion_por_interprete_view'); ?>
	    
	  	</div>



		<div class="col-xs-12 col-sm-8">

			<div class="box box-warning">

			<div class="box-header with-border">
			  <h3 class="box-title">Presentaciones de <strong><?php echo $fila->inte_nombre ?></strong></h3>
			</div>

			<div class="box-body">

				<?php if(count($filas) > 0): ?>
				<?php $i = 0; ?>

				<ul class="products-list product-list-in-box">
				

				<?php 
					foreach($filas as $v): 

		              	$foto = "assets/upload/interpretes/" . $fila->inte_foto;
		              
		              	if (is_dir($foto)) 
		                	{ $foto = "assets/upload/sin_foto.jpg"; }
				?> 



					<li class="item col-xs-12 col-sm-4 col-md-3">
						<a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>/<?php echo $v->canc_alias?>">
			              
			              <div class="product-img">
			                <img src="<?php echo $foto; ?>" alt="<?php echo $fila->canc_titulo; ?>">
			              </div>
			              
			              <div class="product-info">
			                <?php echo $v->canc_titulo; ?>

			                <span class="product-description">
			                    <?php echo $fila->inte_nombre?>
			                </span>
			                
			              </div>

			            </a>
			        </li>
			          



					<?php endforeach; ?>

				</ul>

				<?php else: ?>

					<div class="alert alert-danger" role="alert">Aun no tenemos videos por mostrar en nuestra base del artista solicitado.</div>

				<?php endif; ?>
				
				<?php //$this->load->view('fb_comentarios_view'); ?>

			  </div>
			</div>
			</div>
		</div>


	<?php $this->load->view('videos_sidebar_view'); ?>

	</div>

</section>