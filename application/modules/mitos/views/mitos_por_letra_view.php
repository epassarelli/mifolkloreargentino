<?php if ($_SERVER['SERVER_NAME'] != 'localhost') {
	$this->load->view("adsense/adsense_mitos_view");
} ?>

<div class="row">

	<div class="col-xs-12 col-sm-8">

		<div class="box box-warning">

			<div class="box-header with-border">
				<h2 class="box-title">Listado de Mitos, leyendas y f&aacute;bulas con la letra <?php echo $letra; ?> </h2>
			</div>

			<div class="box-body">

				<?php if (isset($filas)) : ?>

					<ul class="products-list product-list-in-box">

						<?php foreach ($filas as $fila) : ?>

							<li class="item col-xs-12 col-sm-6 col-md-4">

								<a href="<?php echo base_url() ?>mitos-y-leyendas/<?php echo $fila->id ?>-<?php echo url_title($fila->titulo) ?>.html">
									<?php echo $fila->titulo ?>

								</a>

								<span class="product-description">

									<?php echo substr(trim(strip_tags($fila->contenido)), 0, 80); ?>...

								</span>

							</li>

						<?php endforeach; ?>

					</ul>

				<?php else : ?>

					<div class="alert alert-danger" role="alert">
						No hemos encontrado en nuestra Base de Datos recetas de comidas con dicha letra
					</div>

				<?php endif; ?>

			</div>
		</div>

		<?php if ($_SERVER['SERVER_NAME'] != 'localhost') {
			$this->load->view("adsense/adsense_mitos_view");
		} ?>

	</div>



	<div class="col-xs-12 col-sm-4">
		<?php $this->load->view($sidebar); ?>
	</div>

</div>