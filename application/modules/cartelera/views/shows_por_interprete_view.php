<style type="text/css">
  .dia{
    text-align: center;
    font-size: 2em;
    display: block;
    background: #000;
    color: #FFF;   
  }

  .mes{
    text-align: center;
    font-size: 1em;
    border: 1px solid #000;
    padding: 5px;
    display: block;    
  }
</style>


<div class="row">

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>
        
  </div>

	<div class="col-xs-12 col-sm-8 col-md-8">


	  <div class="box box-warning">
	  
	  <div class="box-header with-border">
	    <h3 class="box-title">Agenda de <?php echo $fila->inte_nombre; ?></h3>

	  </div>
	 

	  <div class="box-body">

	    <?php if(count($filas) > 0): ?>

	    <ul class="products-list product-list-in-box">
	      
	    <?php     
	    foreach($filas as $e):
	          $foto = "assets/upload/interpretes/" . $e->inte_foto;
	          if (is_dir($foto)) 
	            { $foto = "assets/upload/sin_foto.jpg"; }
	    ?> 

	      <li class="item col-xs-12 col-sm-6 col-md-6">
	        <div class="product-img">
	          <img src="<?php echo $foto?>" alt="<?php echo $e->inte_nombre?>" width="50" heigth="50">
	        </div>
	        <div class="product-info">
	          <?php echo $e->even_titulo?> | <?php echo $e->inte_nombre?>
	          <span class="product-description">
	            
	            <p><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $e->even_lugar?><br>
	              <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $e->even_direccion?> - 
	              <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $e->even_hora?> hs.<br>
	              <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $e->loca_nombre?>, <?php echo $e->prov_nombre?></p>
	          </span>
	        </div>
	      </li>

	    <?php endforeach; ?>
	    </ul>

	    <?php else: ?>
	    
	      <p>No hemos encontrado en nuestra Base de Datos eventos para el d&iacute;a solicitado</p>
	    
	    <?php endif; ?>

    </div>

  </div>
  </div>



    
    <?php $this->load->view($sidebar); ?>   



</div>