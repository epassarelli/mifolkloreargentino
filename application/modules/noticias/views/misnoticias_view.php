<div class="row">
  <div class="col-xs-12 col-md-9">
    
    <h1>Mis Gacetillas / Noticias</h1>
    <a href="<?php echo base_url();?>mipanel/misnoticias/nueva" class="btn btn-success btn-xs" role="button">+ Nueva</a>  

    <?php
    switch ($this->session->flashdata('mensaje')) {
        case 'ok':
            # code...
            echo '<div class="alert alert-success"><p>Gacetill agregada correctamente!</p></div>';
            break;

        case 'error':
            # code...
            echo '<div class="alert alert-danger"><p>Lo sentimos pero NO se pudo agregar la Gacetilla</p></div>';
            break;  

        default:
            # code...
            break;
    }
    ?> 
    <?php if(isset($filas)): ?>

        <table class="table table-hover">
        <thead>
        <th>Fecha</th>
        <th>Titulo</th>
        <th>Detalle</th>
        <th>Editar</th>
        </thead>
        <tbody>
        <?php foreach($filas as $fila): ?>
            <tr>
            <td><?php echo $fila->noti_fecha?></td>
            <td><?php echo $fila->noti_titulo?></td>
            <td><?php echo $fila->noti_detalle?></td>
            <td><a class="btn btn-success" href="<?php echo base_url()?>mipanel/misnoticias/editar/<?php echo $fila->noti_id?>" role="button">Editar</a></td>
            </tr>       
        <?php endforeach; ?>
        </tbody>
        </table>

    <?php else: ?>

        <p>No hemos encontrado en nuestra Base de Datos noticias cargadas</p>

    <?php endif; ?>    

    </div>

    <div class="col-xs-12 col-md-3">
        <h2>Preguntas frecuentes</h2>
    </div>

</div>