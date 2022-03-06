<!-- Default box -->
<div class="box">
  
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title; ?></h3>

    <div class="box-tools pull-right">
      

      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  
  <div class="box-body">

    <div class="row">
      <div class="col-md-6 col-md-offset-3 alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3><i class="icon fa fa-check"></i> Solicitud exitosa!</h3>
        <p>La solicitud de administración del artista se ha realizado de forma exitosa.</p>
        <p>Para completar la solicitud debe ingresar al correo y clickear en :: Confirmar solicitud :: para poder comenzar a ingresar contenidos en nombre de dicho artista.</p>
      </div>


      <div class="col-md-6 col-md-offset-3">
        <div class="row">
          <div class="col-md-4">
            <a class="btn btn-default btn-block" href="<?php echo base_url();?>mipanel/interpretes" role="button"><i class="fa fa-reply"></i> Ir a Mis Administrados</a>
          </div>
          <div class="col-md-4">
            <a class="btn btn-success btn-block" href="<?php echo base_url();?>mipanel/interpretes/nuevo" role="button"><i class="fa fa-plus"></i> Agregar interprete</a>
          </div>
          <div class="col-md-4">
            <a class="btn btn-warning btn-block" href="<?php echo base_url();?>" role="button"><i class="fa fa-home"></i> Ir al Incio</a>
          </div>
        </div>
        
        
        
      </div>


      

    </div>

  </div>
  <!-- /.box-body -->
  
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->

</div>
<!-- /.box -->