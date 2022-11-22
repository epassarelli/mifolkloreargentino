<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_enlaces_view"); }
?>

<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_view"); }
?>

<div class="row">

	<div class="col-xs-12">

		<p>Las recetas de comidas típicas que encontrará en esta seccion han sido una colaboración de nuestros visitantes que van sugeriendo y agregando distintas recetas que ellos o sus antepasados cocinaban en sus hogares. Sientase libre de agregar una comida y sigamos compartiendo nuestras tradiciones.</p>

	</div>

</div>


<div class="row">
	<div class="col-xs-12">

		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Recetas de Comidas m&aacute;s visitadas</h3>

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

				<?php foreach ($visitadas as $fila) : ?>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-cutlery"></i></span>

							<div class="info-box-content">
								<span class="progress-description">
									<span class="badge"><?php echo $fila->visitas; ?></span> visitas
								</span>

								<span class="info-box-number">
									<a href="<?php echo site_url('recetas-de-comidas-tipicas/' . $fila->id . '-' . url_title($fila->titulo) . '.html'); ?>">
										<?php echo $fila->titulo ?>
									</a>
								</span>

							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>

				<?php endforeach; ?>

			</div>

			<!-- /.box-body -->
		</div>

	</div>
</div>


<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_enlaces_view"); }
?>

<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_view"); }
?>


<?php $this->load->view('comidas_sidebar_view'); ?>


</div>