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
    
    <?php
    switch ($this->session->flashdata('mensaje')) {
        case 'ok':
            # code...
            echo '<div class="alert alert-success"><p>Show agregado correctamente!</p></div>';
            break;

        case 'error':
            # code...
            echo '<div class="alert alert-danger"><p>Lo sentimos pero NO se pudo agregar el SHOW</p></div>';
            break;  

        case 'eliminado':
          # code...
          echo '<div class="alert alert-success"><p>Show eliminado con Exito!</p></div>';
          break; 

        case 'errorDelete':
          # code...
          echo '<div class="alert alert-danger"><p>Lo sentimos pero NO se pudo eliminar el SHOW</p></div>';
          break; 

        default:
            # code...
            break;
    }
    ?> 
		
    <div class="pull-right">
    <a href="<?php echo site_url('mipanel/shows/nuevo'); ?>"><button type="button" class="btn btn-success">Nuevo</button></a>
    </div>   
    <?php if(isset($filas)): ?>

        <table id="shows" class="table table-hover datatable"> 
        <thead>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Lugar</th>
            <th>Direccion</th>
            <th>Editar</th>
        </thead>
        <tbody>
        <?php foreach($filas as $e): ?>
            <tr>
                <td><?php echo date('d-m-Y',strtotime($e->even_fecha))?></td>
                <td><?php echo $e->even_titulo?></td>
                <td><?php echo $e->even_lugar?></td>
                <td><?php echo $e->even_direccion?></td>
                <td>
                  <!-- <i href="<?php echo site_url('mipanel'); ?>"><i class="fa fa-fw fa-eye"></i></a> -->
                  <a href="<?php echo site_url('mipanel/shows/editar/'.$e->even_id); ?>"><i class="fa fa-fw fa-edit"></i></a>
                  <a href="<?php echo site_url('mipanel/shows/eliminar/'.$e->even_id); ?>"><i class="fa fa-fw fa-trash-o"></i></a>
                </td> 
            </tr>       
        <?php endforeach; ?>
        </tbody>
        </table>

    <?php else: ?>

        <div class="alert alert-danger">
            <p>No hemos encontrado en nuestra Base de Datos shows cargados tuyos o de tu banda</p>
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