<h1>Dashboard</h1>

<p>Bienvenido al panel de sugerencias de contenidos</p>	

<?php if(($_SESSION['email'] == 'epassarelli@gmail.com') or ($_SESSION['email'] == 'mifolkloreargentino@gmail.com')): ?>

<table class="table table-striped">
	
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

<?php endif; ?>