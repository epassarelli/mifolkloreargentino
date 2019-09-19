<div class="row">
  <div class="panel panel-default">

  <div class="panel-heading">
    <h1 class="panel-title"><?php echo $title;?></h1>
  </div>

  <div class="panel-body">

  <?php
    switch ($this->session->flashdata('mensaje')) {
      case 'ok':
        echo '<div class="alert alert-success"><p>Interprete aprobado correctamente!</p></div>';
        break;
      case 'error':
        echo '<div class="alert alert-danger"><p>Lo sentimos pero NO se pudo aprobar el Interprete</p></div>';
        break;  
      default:
        break;
    }
    ?>

    <div class="table-responsive">
      <table class="table table-striped">

      <?php foreach($interpretes as $fila): ?>   
        
        <tr>
          <td class="col-md-2"><?php echo $fila->inte_nombre?></td>
          <td class="col-md-2"><?php echo $fila->inte_alias?></td>
          <td class="col-md-6"><?php echo substr($fila->inte_biografia, 0, 255); ?></td>
          <td class="col-md-2"><a href="<?php echo base_url();?>interpretes/rechazar/<?php echo $fila->inte_id?>" class="btn btn-danger btn-xs" role="button">Rechazar</a> <a href="<?php echo base_url();?>interpretes/aprobar/<?php echo $fila->inte_id?>" class="btn btn-success btn-xs" role="button">Aprobar</a></td>
        </tr>

      <?php endforeach; ?>   

      </table>
    </div>
  </div>
</div>
</div>