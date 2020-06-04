<div class="row">
	
	<?php 
	if(count($filas) > 0):
		$i = 0;
		foreach ($filas as $n): 
	?>
	
	<?php if($i < 3): ?>

		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="box">

			  <div class="box-body">
			    
			    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
					<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
				</a>

			    	<a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
						<h4><?php echo $n->noti_titulo; ?></h4>
					</a>

			  </div>

			  <div class="box-footer">
			    <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
			  </div>
			  
			</div>
			
		</div>
	

		  
	<?php else: ?>
		
		
		
		<div class="col-xs-12">
			
			<ul class="products-list product-list-in-box">
			<div class="box">

			  <div class="box-body">

				<li class="item">
				  <div class="product-img">
				    <img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
				  </div>
				  <div class="product-info">
				    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>" class="product-title">
				    	<?php echo $n->noti_titulo; ?>
				    </a>
				    <span class="product-description">
				        <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?>
				    </span>
				  </div>
				</li>
				</div>
				</div>			  	
	
		  </ul>

		</div>

						
<?php endif; ?>	
			  


		<?php 
		$i++; 
		endforeach; 
		?>

	<?php else: ?>
		
		<div class="alert alert-danger" role="alert">
			<p>Aun no tenemos noticias por mostrar en nuestra base del artista solicitado.</p>
		</div>

	<?php endif; ?>	





</div>