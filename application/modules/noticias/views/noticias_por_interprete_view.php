<div class="row">
	
	<div class="col-xs-12 col-sm-8 col-md-8">
	
	
	<?php if(isset($filas) and count($filas)>0): ?>
	
	<div class="row">
	
	<?php 
		$i = 0;

		foreach ($filas as $n): 

			if( $i%2==0 )
				{ echo '</div><div class="row">'; }			
			?>

		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="box">
			  <div class="box-header with-border">
			    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
					<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
				</a>

			    
			  </div>
			  
			  <div class="box-body">
			    <h4 class="box-title">						
			    	<a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
						<?php echo $n->noti_titulo; ?>
					</a>
				</h4>
			  </div>
			  
			  <div class="box-footer">
			    <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
			  </div>
			  
			</div>
			
		</div>

		<?php 
		$i++; 
		endforeach; 
		?>
	
	</div>

	<?php else: ?>
		
		<div class="alert alert-danger" role="alert">
			<p>Aun no tenemos noticias por mostrar en nuestra base del artista solicitado.</p>
		</div>

	<?php endif; ?>	


	</div>



	<div class="col-xs-12 col-sm-4 col-md-4">

	 	<?php $this->load->view('menu_seccion_por_interprete_view'); ?>

	</div>

</div>