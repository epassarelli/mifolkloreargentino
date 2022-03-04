<!-- Default box -->
<div class="box">
  
  
  <div class="box-body">
    <p>Texto</p>
    <a class="btn btn-success" href="<?php echo base_url();?>mipanel/discos/nuevo" role="button">+ Agregar Disco</a>
    <hr>
    <?php if(isset($filas)): ?>

    <table id="ABM" class="table table-hover datatable"> 

     <thead>
      <tr>
        <th>Año</th>
        <th>Interprete</th>
        <th>Titulo</th>
        <th>Acciones</th>
      </tr>
     </thead>
          
     <tbody>
      <?php foreach ($filas as $fila): ?>
      <tr>
        <td><?php echo $fila->albu_anio; ?></td>
        <td><?php echo $fila->inte_nombre; ?></td>
        <td><?php echo $fila->albu_titulo; ?></td>
        <td>
          <!-- <a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-eye"></i></a> -->
          <a href="<?php echo site_url('mipanel/discos/editar'.$fila->albu_id); ?>"><i class="fa fa-fw fa-edit"></i></a>
          <!-- <a href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-trash-o"></i></a> -->
        </td>    
      </tr>      
     <?php endforeach; ?>
     </tbody>

    </table> 

    <?php else: ?>

        <div class="alert alert-danger" role="alert">
        <p>Ud. aun no tiene Discos publicados</p>
        </div>

    <?php endif; ?>

  </div>
  <!-- /.box-body -->


</div>
<!-- /.box -->