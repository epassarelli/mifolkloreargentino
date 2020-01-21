<!-- Default box -->
<div class="box">
  
  <div class="box-body">
    <p>Si usted es integrante de una banda folklorica, prensa, comunity, promotor o simplemente desea administrar los contenidos en nuestro portal como noticias, shows, canciones de un Artista determinado puede hacer lo siguiente:</p>

    <ul>
      <li>Si el Artista ya existe en nuestro portal puede solicitar administrarlo.</li>
      <li>Sino, puede agregarlo y de ésta forma usted ya es el administrador del mismo.</li>
      <li>Si aparece en el listado pero no da la posibilidad de solicitar su administración es porque aún no ha sido validada la información del artista.</li>
    </ul>
    
    <p><a class="btn btn-default" href="<?php echo base_url();?>mipanel/interpretes" role="button"><i class="fa fa-reply"></i> Volver a Mis Administrados</a></p>

    <p><a class="btn btn-success" href="<?php echo base_url();?>mipanel/interpretes/nuevo" role="button"><i class="fa fa-plus"></i> Nuevo interprete</a></p>
    
    
    <?php if(isset($filas)): ?>

    <table id="interpretes" class="table table-bordered table-striped datatable">

     <thead>
      <tr>
        <th>Artista</th>
        <th>Acciones</th>
      </tr>
     </thead>
          
     <tbody>
      
      <?php foreach ($filas as $fila): ?>
      
        <tr>
          
          <td><?php echo $fila->inte_nombre?></td>

          <td class="pull-right">
            <?php $id = $fila->inte_id; ?>
            <a href="<?php echo site_url('mipanel/'.$this->objeto.'/administrar/'.$id); ?>" class="btn btn-xs btn-success"><i class="fa fa-fw fa-edit"></i> Solicitar</a>
          </td>

        </tr>

      <?php endforeach; ?>

     </tbody>

    </table> 

    <?php else: ?>

        <div class="alert alert-danger" role="alert">

          <p>No existen interpretes por administrar</p>
          
        </div>

    <?php endif; ?>

  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->