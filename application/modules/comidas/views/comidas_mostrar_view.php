<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_view"); }?>


<div class="row">

	<div class="col-xs-12">

    <div class="box box-warning">
        
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $comida->titulo?></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        
        <div class="box-body">
          <?php echo $comida->contenido?>	
        </div><!-- /.box-body -->

        <div class="box-footer">
		    
		    <ol class="breadcrumb">
		        <li><span>Tags</span></li>
		        <li><a href="<?php echo site_url('recetas-de-comidas-tipicas')?>">Recetas</a></li>
		        <li><a href="<?php echo site_url('recetas-de-comidas-tipicas')?>">Comidas tipicas</a></li>
		        <li><a href="<?php echo site_url('recetas-de-comidas-tipicas')?>">Comidas tradicionales</a></li>
		        <li><a href="<?php echo site_url('recetas-de-comidas-tipicas-con-'.substr($comida->titulo, 0, 1))?>">Recetas con letra <?php echo substr($comida->titulo, 0, 1);?></a></li>
		    </ol>

        </div>
      </div><!-- /.box -->


	<?php $this->load->view('comidas_sidebar_view'); ?> 

	<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_comidas_view"); }?>	
	
	<div class="row">
		<div class="col-xs-12">

		<div class="box box-warning">
		<div class="box-header with-border">
		  <h3 class="box-title">Recetas de Comidas m&aacute;s visitadas</h3>

		  <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		    </button>
		  </div>
		</div>
		<!-- /.box-header -->

		<div class="box-body">
		  
			<?php foreach($visitadas as $fila): ?>

	            <div class="col-md-4 col-sm-6 col-xs-12">
	              <div class="info-box">
	                <span class="info-box-icon bg-yellow"><i class="fa fa-cutlery"></i></span>
	                <div class="info-box-content">
	                  <span class="progress-description">
	                    <span class="badge"><?php echo $fila->visitas;?></span> visitas
	                  </span>
	                  <span class="info-box-number">
	                    <a href="<?php echo site_url('recetas-de-comidas-tipicas/'.$fila->id.'-'.url_title($fila->titulo).'.html');?>">
	                        <?php echo $fila->titulo?>                          
	                    </a>
	                  </span>
	                </div>
	              </div>
	            </div>

			<?php endforeach; ?>

		</div>
		</div>

		</div>
	</div>



		


		


</div>