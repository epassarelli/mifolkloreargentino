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
    <p>Si usted es integrante de una banda folklorica, prensa, comunity, promotor o simplemente desea administrar los contenidos en nuestro portal como noticias, shows, canciones de un Artista determinado puede hacer lo siguiente:</p>
    <ul>
      <li>Si el Artista ya existe en nuestro portal puede solicitar administrarlo.</li>
      <li>Sino, puede agregarlo y de ésta forma usted ya es el administrador del mismo.</li>
      <li>Si aparece en el listado pero no da la posibilidad de solicitar su administración es porque aún no ha sido validada la información del artista.</li>
    </ul>
    
    <a class="btn btn-primary" href="<?php echo base_url();?>mipanel/interpretes/solicitar" role="button"><i class="fa fa-user"></i> Solicitar administrar uno existente</a>
    <a class="btn btn-success" href="<?php echo base_url();?>mipanel/interpretes/nuevo" role="button"><i class="fa fa-plus"></i> Nuevo interprete</a>  
    
    <?php if(isset($filas)): ?>

    <table id="interpretes" class="table table-bordered table-striped datatable">

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
          <a href="<?php echo site_url('mipanel/'.$this->objeto.'/ver/'.$id); ?>" class="btn btn-xs btn-primary" title="Ver"><i class="fa fa-fw fa-eye"></i></a>
          <!-- <?php if($fila->habilitado == 1): ?>
            <a href="<?php echo site_url('mipanel/'.$this->objeto.'/editar/'.$id); ?>" class="btn btn-xs btn-success" title="Editar"><i class="fa fa-fw fa-edit"></i>
            </a>
          <?php endif; ?> -->
          <!-- <a href="<?php echo site_url('mipanel/'.$this->objeto.'/desvincular/'.$id); ?>" class="btn btn-xs btn-danger" title="Desvincular"><i class="fa fa-fw fa-trash-o"></i></a> -->
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