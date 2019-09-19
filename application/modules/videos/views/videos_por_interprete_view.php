<?php $this->load->view('videos_sidebar_view'); ?>

<?php $this->load->view('menu_seccion_por_interprete_view'); ?> 

<section class="videos">
<div class="row">
<div class="panel panel-default">
  <div class="panel-body">

	<?php if(isset($filas)): ?>
	<?php $i = 0; ?>
	<?php foreach($filas as $v): ?>
		
		<?php if ($i % 3 == 0): ?>
		
			<?php if($i == 0): ?>
		        <div class="row">
		        <!-- start:row -->	
			<?php else: ?>
		        </div>
		        <!-- end:row -->

		        <div class="row">
		        <!-- start:row -->
			<?php endif; ?>    

		<?php endif; ?>

        <div class="col-md-4 col-sm-6 col-xs-12">
        <!-- start:article -->

        <div class="media">
          
          <div class="media-left">
            <a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>">
              <img class="media-object" src="<?php echo base_url()?>assets/upload/interpretes/<?php echo $fila->inte_foto?>" alt="<?php echo $fila->inte_nombre?>">
            </a>
          </div>
          
          <div class="media-body">
            <span><a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>">Videos de <?php echo $fila->inte_nombre?></a></span>
            <a href="<?php echo base_url()?>videos-de-<?php echo $fila->inte_alias;?>/<?php echo $v->canc_alias?>">
            <h5 class="media-heading"><?php echo $v->canc_titulo?></h5></a>            
          </div>
          
        </div>

		</div>

        <?php $i++; ?>

		<?php endforeach; ?>

	<?php else: ?>

		<div class="alert alert-danger" role="alert">Aun no tenemos videos por mostrar en nuestra base del artista solicitado.</div>

	<?php endif; ?>
	
	<?php //$this->load->view('fb_comentarios_view'); ?>

  </div>
</div>
</div>
</section>