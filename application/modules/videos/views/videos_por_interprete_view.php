<section class="videos">

	<div class="row">

		<div class="col-xs-12 col-sm-4 col-lg-3">

			<?php $this->load->view('menu_seccion_por_interprete_view'); ?>

		</div>



		<div class="col-xs-12 col-sm-8 col-lg-9">

			<div class="box box-warning">

				<div class="box-header with-border">
					<h3 class="box-title">Presentaciones de <strong><?php echo $fila->inte_nombre ?></strong></h3>
				</div>

				<div class="box-body">

					<div class="row">

						<?php if (count($filas) > 0) : ?>

							<?php foreach ($filas as $v) :							?>

								<div class="col-sm-4">
									<div class="box">
										<div class="box-body">
											<div class="head-video relative">

												<iframe width="100%" height="580" frameborder="0" src="https://www.youtube.com/embed/<?php echo $v->canc_youtube; ?>?feature=oembed&amp;wmode=opaque" allowfullscreen="" style="height: 313.6px;">
												</iframe>

											</div>
										</div>
									</div>
								</div>

							<?php endforeach; ?>


						<?php else : ?>

							<div class="alert alert-danger" role="alert">Aun no tenemos videos por mostrar en nuestra base del artista solicitado.</div>

						<?php endif; ?>

						<?php //$this->load->view('fb_comentarios_view'); 
						?>

					</div>

				</div>

			</div>

		</div>
	</div>

	<?php $this->load->view('videos_sidebar_view'); ?>

	</div>

</section>