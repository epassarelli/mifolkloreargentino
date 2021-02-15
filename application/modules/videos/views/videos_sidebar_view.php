<div class="col-xs-12 col-sm-8">
  
  <?php echo Modules::run( 'ayuda/index', '2' ); ?>

</div>


<div class="col-xs-12 col-sm-4">

  <div class="box box-warning">
    
    <div class="box-header with-border">

      <h3 class="box-title">Buscar videos por interprete</h3>

    </div>

    <div class="box-body">

      <?php $this->load->view('buscar_por_interprete_view'); ?>

    </div>

  </div>

</div>