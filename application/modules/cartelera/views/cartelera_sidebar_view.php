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




    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Agenda de shows</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <div id="cartelera">
			<?php echo Modules::run('cartelera/getCalendario'); ?>
		</div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->



    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Buscar por artista</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php $this->load->view('buscar_por_interprete_view'); ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


	<!--	
	<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/shows/add" role="button">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Agregar un show</a>
		 -->
