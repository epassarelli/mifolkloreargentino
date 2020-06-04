

  <div class="col-xs-12 col-sm-6 col-md-4">

    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Noticias por artista</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php $this->load->view('buscar_por_interprete_view'); ?>

          <br>

        <a class="btn btn-success btn-block" href="<?php echo site_url('admin/noticias/index/add');?>" role="button">
          <i class="fa fa-plus"></i> Agregar una Noticia
        </a>

        </div>
      </div>

  </div>
