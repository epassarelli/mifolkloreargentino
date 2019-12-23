<!-- Default box -->
<div class="box">
  
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $title; ?></h3>

    <div class="box-tools pull-right">
      <a class="btn btn-default" href="<?php echo base_url();?>mipanel/interpretes" role="button"><i class="fa fa-reply"></i> Volver a Mis Administrados</a>
      <a class="btn btn-success" href="<?php echo base_url();?>mipanel/interpretes/nuevo" role="button"><i class="fa fa-plus"></i> Nuevo interprete</a>

      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  
  <div class="box-body">
    <p>Si usted es integrante de una banda folklorica, prensa, comunity, promotor o simplemente desea administrar los contenidos en nuestro portal como noticias, shows, canciones de un Artista determinado puede hacer lo siguiente:</p>
    <ul>
      <li>Si el Artista ya existe en nuestro portal puede solicitar administrarlo.</li>
      <li>Sino, puede agregarlo y de ésta forma usted ya es el administrador del mismo.</li>
    </ul>
    
    
    
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