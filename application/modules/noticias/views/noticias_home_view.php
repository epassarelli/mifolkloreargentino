<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_noticias_view"); }?>
<br>
<div class="row">
	
	<?php 
	if(isset($filas)): 

		$i = 0;

		foreach ($filas as $n): 

			if( $i%3==0 )
			{
				echo '</div><div class="row">';
			}
			?>

		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="box">

			  <div class="box-body">
			    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
					<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>">
				</a>
			    <h3 class="box-title">						
			    	<a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
						<?php echo $n->noti_titulo; ?>
					</a>
				</h3>
			  </div>
			  <!-- /.box-body -->
			  <div class="box-footer">
			    <span class="pull-right"> <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?></span>
			  </div>
			  <!-- box-footer -->
			</div>
			<!-- /.box -->
		</div>

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

<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_noticias_view"); }?>