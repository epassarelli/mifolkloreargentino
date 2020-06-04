<div class="container">
	<div class="row">
		
		<div class="col-xs-12 col-sm-6 col-md-4">

		<h1>Dashboard</h1>

		<p>Estado de contenidos por aprobar</p>	

		<table class="table table-striped">

		<tr>
			<td>Avisos clasificados</td>
			<td><?php echo "0"; //$interpretes; ?></td>
		</tr>
			
		<tr>
			<td>Usuarios de Facebook</td>
			<td><?php echo $usuarios; ?></td>
		</tr>

		<tr>
			<td>Interpretes por validar</td>
			<td><?php echo $interpretes; ?></td>
		</tr>

		<tr>
			<td>Discos por validar</td>
			<td><?php echo $discos; ?></td>
		</tr>

		<tr>
			<td>Canciones por validar</td>
			<td><?php echo $canciones; ?></td>
		</tr>

		<tr>
			<td>Noticias por validar</td>
			<td><?php echo $noticias; ?></td>
		</tr>

		<tr>
			<td>Shows por validar</td>
			<td><?php echo $shows; ?></td>
		</tr>

		<tr>
			<td>Peñas por validar</td>
			<td><?php echo $penias; ?></td>
		</tr>

		<tr>
			<td>Radios por validar</td>
			<td><?php echo $radios; ?></td>
		</tr>

		<tr>
			<td>Festivales por validar</td>
			<td><?php echo $festivales; ?></td>
		</tr>

		<tr>
			<td>Comidas por validar</td>
			<td><?php echo $comidas; ?></td>
		</tr>

		<tr>
			<td>Mitos por validar</td>
			<td><?php echo $mitos; ?></td>
		</tr>

		</table>

		</div>

		<div class="col-xs-12 col-sm-6 col-md-4">

			<h1>Administración</h1>

			<p>Gestión de contenidos internos</p>	

			<ul class="li"><a href="<?php echo site_url('admin/faqscategorias'); ?>">Categorias FAQs</a></ul>
			<ul class="li"><a href="<?php echo site_url('admin/faqs'); ?>">Preguntas Frecuentes</a></ul>
			<ul class="li"><a href="<?php echo site_url('admin/provincias'); ?>">Provincias</a></ul>
			<ul class="li"><a href="<?php echo site_url('admin/localidad'); ?>">Localidades</a></ul>
			<ul class="li"><a href="<?php echo site_url('admin/guias'); ?>">Guias</a></ul>
			<ul class="li"><a href="<?php echo site_url('admin/rubros'); ?>">Rubros</a></ul>
		</div>

	</div>
</div>


