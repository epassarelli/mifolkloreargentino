<style type="text/css">
	#cartelera table{
		width: 100%;
	}
	#cartelera table tr td{
		padding: 5px;
		border: 2px solid #FFF;
		text-align: center;
	}

	#cartelera table tr td a {
	    background: #996633;
	    color: #FFFFFF;
	    font-weight: bold;
	    width: 100%;
	    display: table;
	}	

	#cartelera table tr td a:hover {
	    background: #332000;
	    color: #EAD009;
	    font-weight: bold;
	    width: 100%;
	    display: table;
	}
</style>

<div class="col-xs-12 col-sm-8">
  
  <?php echo Modules::run( 'ayuda/index', '2' ); ?>

</div>

<div class="col-xs-12 col-sm-4">



    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Agenda de shows</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="cartelera">
			<?php echo Modules::run('cartelera/getCalendario'); ?>
		</div>
        </div>
      </div>



    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Buscar por artista</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php $this->load->view('buscar_por_interprete_view'); ?>
        </div>
      </div>

	<a class="btn btn-success btn-block" href="<?php echo site_url('admin/shows/index/add');?>" role="button">
	  <i class="fa fa-plus"></i> Agregar una presentación
	</a>

	<br>