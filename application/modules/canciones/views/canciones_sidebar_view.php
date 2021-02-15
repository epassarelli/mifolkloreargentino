<div class="col-xs-12 col-sm-8">
  
  <?php echo Modules::run( 'ayuda/index', '2' ); ?>

</div>


<div class="col-xs-12 col-sm-4">

  <div class="box box-warning">
    
    <div class="box-header with-border">

      <h3 class="box-title">Buscar canciones por interprete</h3>

    </div>

    <div class="box-body">

      <?php $this->load->view('buscar_por_interprete_view'); ?>

    </div>

  </div>


  <div class="box box-warning">
    
    <div class="box-header with-border">

      <h3 class="box-title">Buscar por título de canción</h3>

    </div>
    
    <div class="box-body">

      <?php $this->load->view('buscar_cancion_form_view'); ?>
      
    </div>

  </div>


  <a class="btn btn-success btn-block" href="<?php echo site_url('admin/canciones/index/add');?>" role="button">
    <i class="fa fa-plus"></i> Agregar una canción
  </a>

<br>