<?php if ($_SERVER['SERVER_NAME'] != 'localhost') {
	$this->load->view("adsense/adsense_canciones_home_1_view");
} ?>

<div class="row">

	<div class="col-xs-12">

		<p>Las letras de canciones son interpretadas por los artistas folkloricos asociados a las mismas. No significa que dichas letras hayan sido escritas y/o compuestas por los mismos.</p>
		<p>Simplemente se trata de canciones que son cantadas por dichos artistas del Folklore Argentino y quizás en algunos casos pueda llegar a ser de su autor&iacute;a</p>

	</div>


	<div class="col-xs-12">

		<div class="box box-warning">

			<div class="box-header with-border">
				<h2 class="box-title">Ultimas letras de canciones folklóricas agregadas</h2>
			</div>

			<div class="box-body">
				<ul class="products-list product-list-in-box">

					<?php foreach ($ultimas as $fila) : ?>

						<li class="item col-xs-12 col-sm-4 col-md-3">
							<a href="<?php echo site_url('letras-de-canciones-de-' . $fila->inte_alias . '/' . $fila->canc_alias) ?>" class="product-title">

								<div class="product-info">
									<?php echo $fila->canc_titulo; ?>

									<span class="product-description">
										<?php echo $fila->inte_nombre ?>
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
				<h3 class="box-title">Las 100 mejores canciones del folklore argentino</h3>
			</div>

			<div class="box-body">
				<p>El ranking de canciones del folklore argentino se realiza tomando como referencia la cantidad de visitas en nuestro sitio. Con lo cual dicho listado es dinámico y puede ir variando a medida que los usuarios ingresen a mirar otras canciones folkloricas.</p>
				<ul class="products-list product-list-in-box">

					<?php $i = 1;
					foreach ($xvisitas as $fila) : ?>

						<li class="item col-xs-12 col-sm-4 col-md-3">
							<a href="<?php echo site_url('letras-de-canciones-de-' . $fila->inte_alias . '/' . $fila->canc_alias) ?>" class="product-title">

								<div class="product-info">
									<?php echo $fila->canc_titulo; ?>

									<span class="product-description">
										<?php echo $fila->inte_nombre ?>
									</span>
								</div>
							</a>

						</li>

					<?php $i++;
					endforeach; ?>
				</ul>
			</div>

		</div>

	</div>



	<?php $this->load->view($sidebar); ?>


</div>