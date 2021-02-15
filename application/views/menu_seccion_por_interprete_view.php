<?php		
	$foto = base_url() . "assets/upload/interpretes/" . $fila->inte_foto ;
	if (is_dir($foto)) 
		{ $foto = base_url() . "assets/upload/sin_foto.jpg"; }
?>	

	
<div class="box box-warning">
	<div class="box-body box-profile">
	  <img class="profile-user-img img-responsive img-circle" src="<?php echo $foto; ?>" alt="<?php echo $fila->inte_nombre;?>" title="<?php echo $fila->inte_nombre?>">

	  <h3 class="profile-username text-center"><?php echo $fila->inte_nombre?></h3>

	  <p class="text-muted text-center">Folklore Argentino</p>

	  <ul class="list-group list-group-unbordered">


			
		<li class="list-group-item">
			<span class="glyphicon glyphicon-user"></span>
			<?php if($_SESSION['seccion'] !== 'Biografias'): ?>
				<a href="<?php echo base_url()?>biografia-de-<?php echo $fila->inte_alias?>">   Biografia de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Biografia de <?php echo $fila->inte_nombre?></strong>
			<?php endif; ?>			
		</li> 
			 

			
		<li class="list-group-item">
			<span class="glyphicon glyphicon-music"></span>  
			<?php if($_SESSION['seccion'] !== 'Canciones'): ?>		  
				<a href="<?php echo base_url()?>letras-de-canciones-de-<?php echo $fila->inte_alias?>" >   Canciones de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Canciones de <?php echo $fila->inte_nombre?></strong>		
			<?php endif; ?>
		</li>
		


			
		<li class="list-group-item">
			<span class="glyphicon glyphicon-bullhorn"></span>  
			<?php if($_SESSION['seccion'] !== 'Noticias'): ?>		  
		  		<a href="<?php echo base_url()?>noticias-de-<?php echo $fila->inte_alias?>" >   Noticias de <?php echo $fila->inte_nombre?></a>		
			<?php else: ?>	
				<strong>Noticias de <?php echo $fila->inte_nombre?></strong>
			<?php endif; ?>		
		</li>
		


			
		<li class="list-group-item">
			<span class="glyphicon glyphicon-calendar"></span>   
			<?php if($_SESSION['seccion'] !== 'Shows'): ?>		  
		  		<a href="<?php echo base_url()?>shows-de-<?php echo $fila->inte_alias?>">   Shows de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Shows de <?php echo $fila->inte_nombre?></strong>		
			<?php endif; ?>
		</li>
		


			
		<li class="list-group-item">
			<span class="glyphicon glyphicon-headphones"></span>
			<?php if($_SESSION['seccion'] !== 'Discografias'): ?>		  
		  		<a href="<?php echo base_url()?>discografia-de-<?php echo $fila->inte_alias?>" >   Discos de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Discos de <?php echo $fila->inte_nombre?></strong>			
			<?php endif; ?>
		</li>
		


			
		<li class="list-group-item">
		  	<span class="glyphicon glyphicon-film"></span> 
			<?php if($_SESSION['seccion'] !== 'Videos'): ?>
		  		<a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias?>">   Videos de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Videos de <?php echo $fila->inte_nombre?></strong>	
			<?php endif; ?>			  	
		</li>		

		

			
		<li class="list-group-item">
		  	<span class="glyphicon glyphicon-picture"></span>  
			<?php if($_SESSION['seccion'] !== 'Fotos'): ?>		  
		  		<a href="<?php echo base_url()?>fotos-de-<?php echo $fila->inte_alias?>">   Fotos de <?php echo $fila->inte_nombre?></a>
			<?php else: ?>	
				<strong>Fotos de <?php echo $fila->inte_nombre?></strong>	
			<?php endif; ?>			
		</li>
		

		

		<!--
		    <li class="list-group-item">
		      <b>Followers</b> <a class="pull-right">1,322</a>
		    </li>
		    <li class="list-group-item">
		      <b>Following</b> <a class="pull-right">543</a>
		    </li>
		    <li class="list-group-item">
		      <b>Friends</b> <a class="pull-right">13,287</a>
		
		    </li>
		-->    
		  </ul>
<!--
		  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
		</div>
	</div>

