<div class="row">
  <div class="col-md-12">
    
	<h2 class="bloque_titulo">Biografias de Autores, Compositores, Grupos y Solistas del Folklore Argentino</h2>

    <?php $this->load->view('indice_alfabetico_view');    ?>  
   
    <div class="row">
		<!--   Columna izquierda   -->
		<div class="col-md-9 col-xs-12">
			<?php if(isset($fila)): ?>
				<h1 class="bloque_titulo"><?php echo $title?></h1>
				<?php echo $fila->inte_biografia?>
			<?php else: ?>
				<p>No tenemos la biografia que esta buscando</p>
			<?php endif; ?> 	  
		</div>
	
		<!--   Columna derecha   -->
		<div class="col-md-3 col-xs-12">
			<h3 class="bloque_titulo">Biografias mas visitadas</h3>
			<p><a href="http://www.mifolkloreargentino.com.ar/biografias/2-cafrune-jorge.html">Biografia de Jorge Cafrune</a></p>
			<p><a href="http://www.mifolkloreargentino.com.ar/biografias/31-sosa-mercedes.html">Biografia de Mercedes Sosa</a></p>  
			<p><a href="http://www.mifolkloreargentino.com.ar/biografias/3-larralde-jose.html">Biografia de Jose Larralde</a></p>  
			<p><a href="http://www.mifolkloreargentino.com.ar/biografias/10-zitarrosa-alfredo.html">Biografia de Alfredo Zitarrosa</a></p>  
			<p><a href="http://www.mifolkloreargentino.com.ar/biografias/15-guarany-horacio.html">Biografia de Horacio Guarany</a></p>     
		</div>
    </div>
	
  </div>
</div>



