<div class="row">
  <div class="col-md-12">

  <ol class="breadcrumb">
	<li><a href="<?php echo base_url()?>">Inicio</a></li>
	<li><a href="<?php echo base_url()?>biografias">Biografias</a></li>
	<li class="active"><?php echo $title?></li>
  </ol>
   
  <div class="row">   	               	
	<!--   Columna izquierda   -->
	<div class="col-md-9 col-xs-12">
	
	<?php $this->load->view('menu_seccion_por_interprete_view'); ?>	
	     
	<div class="panel panel-default">
  	<div class="panel-body">			
	  <?php if(isset($fila)): ?>
		<?php echo $fila->inte_biografia?>                
	  <?php else: ?>
		<p>No tenemos la biografia que esta buscando</p>
	  <?php endif; ?> 	  
    </div>		
	</div>	

	<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense_adaptable_view"); } ?> 
	
	<?php $this->load->view('fb_comentarios_view'); ?>
	
	</div>

	<!--   Columna derecha   -->
	<div class="col-md-3 col-xs-12">
		<?php $this->load->view('biografias_sidebar_view');    ?>  		
	</div>
        
    </div>
	
  </div>
</div>