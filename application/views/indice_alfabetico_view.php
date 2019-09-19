<h3 class="titulo">Buscar por índice alfabético</h3>
<nav aria-label="Indice">
	<ul class="pagination ">
		<?php 

		$letras = range('A', 'Z');

		foreach ($letras as $letra) {
			# code...
			echo '<li><a href="' . base_url() . $pagina . '-con-' . $letra . '">' . $letra . '</a></li>';
		}

		?>
	</ul>
</nav>