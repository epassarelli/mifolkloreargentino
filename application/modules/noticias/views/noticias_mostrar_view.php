<div class="row">
	<div class="col-xs-12 col-md-8">
	
		<div class="box box-warning">
		  <div class="box-header with-border">
				<img class="img-responsive" src="<?php echo site_url('assets/upload/noticias/'.$noticia->noti_foto); ?>" title="<?php echo $noticia->noti_titulo; ?>" alt="<?php echo $noticia->noti_titulo; ?>">	

		  </div>
		  
		  <div class="box-body">
		    <p><?php echo $noticia->noti_detalle; ?></p>
		  </div>
		  
		  <div class="box-footer">
		    <span><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo date("d/m/Y", strtotime($noticia->noti_fecha)); ?> | 
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Visitas: <?php echo $noticia->noti_visitas;?></span>
		  </div>

		</div>
	
	</div>


	<div class="col-xs-12 col-md-4">


	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Ultimas noticias agregadas</h3>

	  <div class="box-tools pull-right">
	    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	    </button>
	  </div>
	</div>
	

	<div class="box-body">
	  <ul class="products-list product-list-in-box">			
	    
		<?php foreach ($noticias as $n): ?> 

	    <li class="item">

	        <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
				<?php echo $n->noti_titulo; ?>
			</a>
	        <span class="product-description">
	            <?php echo date("d/m/Y", strtotime($n->noti_fecha)); ?>
	        </span>
	      
	    </li>
	    
		<?php endforeach; ?>
	  </ul>
	</div>
	
	<div class="box-footer text-center" style="">
	  <a href="<?php echo site_url('noticias'); ?>" class="uppercase">Ver todas las noticias</a>
	</div>


	</div>
</div>

<?php $this->load->view('noticias_sidebar_view');  ?>