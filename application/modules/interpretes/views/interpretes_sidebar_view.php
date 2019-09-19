
    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Interpretes por letra</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php $this->load->view('indice_alfabetico_view');  ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->



    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Elegir un artista</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php $this->load->view('buscar_por_interprete_view'); ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->





    <!--
    <h3 class="titulo">Agregar un artista</h3>
    <a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/interpretes/add" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar un Interprete</a>
    -->


    <?php //$this->load->view('interpretes_sugerir_view');  ?>
