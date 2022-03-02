<!-- Default box -->
<div class="box">
  
  <div class="box-body">
    <p>Texto</p>
    <a class="btn btn-success btn-xs" href="<?php echo base_url();?>mipanel/miscanciones/nueva" role="button">Agregar cancion</a>
    <hr>
    <?php if(isset($filas)): ?>

    <table id="ABM" class="table table-bordered table-striped">

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

</div>
<!-- /.box -->