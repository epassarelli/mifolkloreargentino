<!-- Default box -->
<div class="box">
  
  <div class="box-header with-border">
    <h3 class="box-title">Gacetillas de prensa de los artistas que represento</h3>
  </div>
  
  <div class="box-body">

    <div class="box-tools pull-right">
      <a class="btn btn-success col-xs-12" href="<?php echo site_url('mipanel/noticias/nueva');?>" role="button">
        <i class="fa fa-plus"></i> Agregar una gacetilla
      </a>
    </div>
    
    <p>Dentro de la estrategia de Comunicación es fundamental hacer una Campaña de Prensa para que los medios publiquen noticias acerca de nuestra actividad. Para que esto suceda debemos facilitarles a los periodistas una gacetilla (un prototipo de noticia) acerca de nuestro trabajo.</p>
    <p>Los pasos para llevar adelante una campaña de prensa son: <br>
    - Distinguir la noticia que quiero comunicar, dentro mi organización <br>
    - Redactar la información en formato gacetilla, incluirle un gancho atractivo <br>
    - Seguimiento de la cantidad de visitas que se interesen en la gacetilla</p>
    
    
    <?php if(isset($filas)): ?>

    <table id="interpretes" class="table table-hover datatable"> 

     <thead>
      <tr>
        <th class="hidden-xs">Fecha</th>
        <th class="hidden-xs">Artista</th>      
        <th>Titulo</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
     </thead>
          
     <tbody>
      <?php foreach ($filas as $fila): ?>
      <tr>
        <td class="hidden-xs"><?php echo date("d/m/Y", strtotime($fila->noti_fecha)); ?></td>
        <td class="hidden-xs"><?php echo $fila->inte_nombre; ?></td>
        <td><?php echo $fila->noti_titulo; ?></td>
        <td>
          <a href="<?php echo site_url("mipanel/noticias/previa/".$fila->noti_id); ?>">
            <i class="fa fa-eye"></i></a>
        </td>
        <td>
          <a href="<?php echo site_url("mipanel/noticias/editar/".$fila->noti_id); ?>">
            <i class="fa fa-pencil"></i></a>
        </td>
        <td>
                  
          <a href="<?php echo site_url("mipanel/noticias/cambiarestado/".$fila->noti_id); ?>">
            <i class="fa <?php echo ($fila->noti_habilitado == 1) ? "fa-toggle-on" : "fa-toggle-off";?>"></i></a>
        </td>    
      </tr>      
     <?php endforeach; ?>
     </tbody>

    </table> 

    <?php else: ?>

        <div class="alert alert-danger" role="alert">
        <p>Ud. aun no tiene noticias publicadas</p>
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