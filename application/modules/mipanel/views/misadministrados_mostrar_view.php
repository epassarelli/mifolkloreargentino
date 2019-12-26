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

    



<div class="row">


        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget box-warning widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
            <?php   
              $foto = base_url() . "assets/upload/interpretes/" . $fila->inte_foto ;
              if (is_dir($foto)) 
                { $foto = base_url() . "assets/upload/sin_foto.jpg"; }
            ?>  
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $foto; ?>" alt="User Avatar">
            </div>

              <h3 class="widget-user-username"><?php echo $fila->inte_nombre; ?></h3>
              <!-- <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
            </div>

            
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Contrataciones</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Correo</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Facebook</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->                                
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">Youtube</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">Twitter</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-2">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">Instagram</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-sm-12">
                <h2>Biografía / Trayectoria</h2>
                <p><?php echo $fila->inte_biografia; ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        
        
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>




  


  </div>
  <!-- /.box-body -->
  
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->

</div>
<!-- /.box -->