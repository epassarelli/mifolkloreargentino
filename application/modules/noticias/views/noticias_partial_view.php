<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Ultimas noticias</h3>

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


		<?php if(isset($noticias) and (count($noticias) > 0) ): ?>

			<ul class="products-list product-list-in-box">

				<?php foreach($noticias as $n): ?>
				  
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
				  
				<?php endforeach; ?>

			</ul>




		<?php else: ?>

			<p>Aun no tenemos noticias por mostrar en nuestra base de <?php echo $fila->inte_nombre?>.</p>

			<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/noticias/add" role="button">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar una noticia</a>

		<?php endif; ?>

	</div>
	<!-- /.box-body -->
	
	<div class="box-footer text-center" style="">
	  <a href="<?php echo site_url('noticias-de-'.$fila->inte_alias); ?>" class="uppercase">Ver todas las noticias <?php echo $fila->inte_nombre?></a>
	</div>
	<!-- /.box-footer -->
	
</div>
