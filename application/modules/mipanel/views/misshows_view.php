<!-- Default box -->
<div class="box">
  
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
    <a href="<?php echo site_url('mipanel/shows/nuevo'); ?>"><button type="button" class="btn btn-success">+ Nuevo show</button></a>
    </div>   
    <?php if(isset($filas)): ?>

        <table id="shows" class="table table-hover datatable"> 
        <thead>
            <th>Fecha</th>
            <th class="hidden-xs">Titulo</th>
            <th>Lugar</th>
            <th class="hidden-xs">Direccion</th>
            <th>Editar</th>
        </thead>
        <tbody>
        <?php foreach($filas as $e): ?>
            <tr>
                <td><?php echo date('d-m-Y',strtotime($e->even_fecha))?></td>
                <td class="hidden-xs"><?php echo $e->even_titulo?></td>
                <td><?php echo $e->even_lugar?></td>
                <td class="hidden-xs"><?php echo $e->even_direccion?></td>
                <td>
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

</div>
<!-- /.box -->