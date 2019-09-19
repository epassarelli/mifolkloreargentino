<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_noticias_view"); }?>
<br>
<div class="row">
	<div class="col-xs-12 col-md-8">
	
		<div class="box box-warning">
		  <div class="box-header with-border">
				<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$noticia->noti_foto); ?>" title="<?php echo $noticia->noti_titulo; ?>" alt="<?php echo $noticia->noti_titulo; ?>">	
		    <!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body">
		    <p><?php echo $noticia->noti_detalle; ?></p>
		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">
		    <span><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo date("d/m/Y", strtotime($noticia->noti_fecha)); ?> | 
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Visitas: <?php echo $noticia->noti_visitas;?></span>
		  </div>
		  <!-- box-footer -->
		</div>
		<!-- /.box -->
	

	<?php $this->load->view('adsense/adsense_noticias_view'); ?>

	</div>


	<div class="col-xs-12 col-md-4">


	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Ultimas noticias agregadas</h3>

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

	    
		<?php foreach ($noticias as $n): ?> 

	    <li class="item">
	      <div class="product-img">
		    <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
				<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto); ?>" title="<?php echo $n->noti_titulo; ?>" alt="<?php echo $n->noti_titulo; ?>" width="80">
			</a>
	      </div>
	      <div class="product-info">
	        <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
				<?php echo $n->noti_titulo; ?>
			</a>
	        <span class="product-description">
	            <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?>
	        </span>
	      </div>
	    </li>
	    <!-- /.item -->
		<?php endforeach; ?>
	  </ul>
	</div>
	<!-- /.box-body -->
	<div class="box-footer text-center" style="">
	  <a href="<?php echo site_url('noticias'); ?>" class="uppercase">Ver todas las noticias</a>
	</div>
	<!-- /.box-footer -->



	</div>
</div>

<?php $this->load->view('noticias_sidebar_view');  ?>