<!-- Default box -->
<div class="box">
  
  
  <div class="box-body">
    <p>Si usted es integrante de una banda folklorica, prensa, comunity, promotor o simplemente desea administrar los contenidos en nuestro portal como noticias, shows, canciones de un Artista determinado puede hacer lo siguiente:</p>
    <ul>
      <li>Si el Artista ya existe en nuestro portal puede solicitar administrarlo.</li>
      <li>Sino, puede agregarlo y de ésta forma usted ya es el administrador del mismo.</li>
      <li>Si aparece en el listado pero no da la posibilidad de solicitar su administración es porque aún no ha sido validada la información del artista.</li>
    </ul>

    <a class="btn btn-primary" href="<?php echo base_url();?>mipanel/interpretes/solicitar" role="button"><i class="fa fa-user"></i> Solicitar administrar uno existente</a>
    <a class="btn btn-success" href="<?php echo base_url();?>mipanel/interpretes/nuevo" role="button"><i class="fa fa-plus"></i> Agregar interprete</a>  
    
    <?php if(isset($filas)): ?>
    <h3>Listado de artistas</h3>
    <table id="ABM" class="table table-bordered table-striped">

     <thead>
      <tr>
        <th>Artista</th>
        <th>Visitas</th>
        <th>Acciones</th>
      </tr>
     </thead>
          
     <tbody>
      <?php foreach ($filas as $fila): ?>
      <tr>
        <td><?php echo $fila->inte_nombre?></td>
        <td><?php echo $fila->inte_visitas?></td>
        <td class="pull-right">
          <?php $id = $fila->inte_id; ?>
          <a href="<?php echo site_url('mipanel/'.$this->objeto.'/ver/'.$id); ?>" class="btn btn-xs btn-primary" title="Ver"><i class="fa fa-fw fa-eye"></i> Ver</a>

          <?php if($fila->inte_habilitado == 0): ?>
            <a href="<?php echo site_url('mipanel/'.$this->objeto.'/aprobar/'.$id); ?>" class="btn btn-xs btn-success" title="Aprobar"><i class="fa fa-thumbs-up"> Aprobar</i>
            </a>
          <?php endif; ?>

          <?php if($fila->inte_habilitado == 1): ?>
            <a href="<?php echo site_url('mipanel/'.$this->objeto.'/editar/'.$id); ?>" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-pencil"> Editar</i>
            </a>
          <?php endif; ?>
          
          <a href="<?php echo site_url('mipanel/'.$this->objeto.'/desvincular/'.$id); ?>" class="btn btn-xs btn-danger" title="Desvincular"><i class="fa fa-fw fa-trash-o"></i> Borrar</a>
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

