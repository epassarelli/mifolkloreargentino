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
    <p>Texto</p>
    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>mipanel/miscanciones/nueva" role="button">Agregar cancion</a>
    <hr>
    <?php if(isset($filas)): ?>

    <table id="interpretes" class="table table-bordered table-striped datatable">

     <thead>
      <tr>
        <th>Artista</th>
        <th>Titulo</th>
        <th>Acciones</th>
      </tr>
     </thead>
          
     <tbody>
      <?php foreach ($filas as $fila): ?>
      <tr>
        <td><?php echo $fila->inte_nombre; ?></td>
        <td><?php echo $fila->canc_titulo; ?></td>
        <td class="pull-right">
          <a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-eye"></i></a>
          <a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-edit text-green"></i></a>
          <a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-trash-o text-red"></i></a>
        </td>    
      </tr>      
     <?php endforeach; ?>
     </tbody>

    </table> 

    <?php else: ?>

        <div class="alert alert-danger" role="alert">
        <p>Ud. aun no tiene CANCIONES publicadas</p>
        </div>

    <?php endif; ?>




  </div>
  <!-- /.box-body -->
  
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->

</div>
<!-- /.box -->