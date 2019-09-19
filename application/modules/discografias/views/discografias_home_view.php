<?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_discografias_view"); }?>


<!-- start:row -->
<div class="row">

    <div class="col-xs-12 col-md-8">

    <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Artistas con discografias</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <!--
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        -->
      </div>
    </div>
    <!-- /.box-header -->


    <!-- Si existen Artistas -->

    <!-- Cada 3 voy agregando una fila -->
        <?php if(isset($interpretes)): ?>
            <?php $i = 0; ?>

    <div class="box-body">
      <ul class="products-list product-list-in-box">

            <?php foreach($interpretes as $fila): ?>



                <?php 
                $foto = base_url() . "assets/upload/interpretes/" . $fila->inte_foto;
                if (is_dir($foto)) 
                    { $foto = base_url() . "assets/upload/sin_foto.jpg"; }
                ?>

                <li class="item col-xs-12 col-sm-6 col-md-4">
                  <div class="product-img">
                    <a href="<?php echo base_url('discografia-de-'.$fila->inte_alias);?>">
                      <img class="media-object" src="<?php echo $foto?>" alt="<?php echo $fila->inte_nombre?>">
                    </a>
                  </div>
                  <div class="product-info">
                    
                    <span class="product-description">
                        <a href="<?php echo site_url('discografia-de-'.$fila->inte_alias);?>">
                            <p>Discografía de <br><?php echo $fila->inte_nombre;?></p>
                        </a>
                    </span>
                  </div>
                </li>


            <?php $i++; ?>
            
            <?php endforeach; ?>
        
      </ul>
    </div>

        <?php else: ?>
            <p>No tenemos la letras que esta buscando</p>
        <?php endif; ?> 
                  
    </section>
<!-- end:section -->

</div>

</div>


</div><!-- end:row -->


<?php $this->load->view($sidebar); ?>