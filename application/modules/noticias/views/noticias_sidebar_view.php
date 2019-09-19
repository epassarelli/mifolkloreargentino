<div class="row">


  <div class="col-xs-12 col-sm-6 col-md-4">

    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Noticias por artista</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php $this->load->view('buscar_por_interprete_view'); ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

  </div>

<!--<h3>Publicamos tu noticia folklorica</h3>


<a class="btn btn-success btn-block" href="<?php echo base_url();?>admin/noticias/add" role="button">Sugerir Noticia / Gacetilla</a>
-->

<?php //$this->load->view('buscar_por_interprete_view'); ?>



<?php //$this->load->view('misnoticias_form_view'); ?>

<?php //echo Modules::run( 'videos/ultimos', '10' ); ?>

</div>