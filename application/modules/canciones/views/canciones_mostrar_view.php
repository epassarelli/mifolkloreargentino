<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_canciones_letra_1_view"); }?>

  <style>
    .mxm-edit-letra-textarea{
    background-color: #fff;
    padding: 0;
    margin: 0;
    width: 100%;
    height: auto;
    min-height: 400px;
    border: none;
    overflow: auto;
    outline: none;
    resize: none;
    box-shadow: none;
    font-size: 18px;
    line-height: 1.78;
    color: #2c3e50;
    font-style: italic;     
    }
  </style>

<div class="row">

  <div class="col-xs-12 col-sm-4 col-md-4">
    
    <?php $this->load->view('menu_seccion_por_interprete_view'); ?>
    
  </div>
                                
    <div class="col-xs-12 col-sm-8">

        <div class="box box-warning">

          <div class="box-header with-border">
          <h3 class="box-title"><?php echo $cancion->canc_titulo;?></h3>

          </div>
          

          <div class="box-body">
            <?php if($cancion->canc_youtube != NULL): ?>    
                    
                    <div class="head-video relative">

                        <iframe width="100%" height="580" frameborder="0" src="https://www.youtube.com/embed/<?php echo $cancion->canc_youtube;?>?feature=oembed&amp;wmode=opaque" allowfullscreen="" style="height: 313.6px;">        
                        </iframe>

                    </div>
                    
            <?php endif; ?>
              
            <?php if(strlen($cancion->canc_contenido) > 20 ): ?>

              <p><?php echo $cancion->canc_contenido; ?></p>

            <?php else: ?>

              <h4>Letra no disponible</h4>
              <div id="error"></div>
              <div id="mensaje">
                
                  <textarea name="letra" id="letra" spellcheck="true" placeholder="Colaborar con la letra escribiendo aqui..." class="mxm-edit-letra-textarea" style="height: 256px;"></textarea>
                <br>
                <input id="send" name="send" type="submit" value="Sugerir letra" class="btn btn-success btn-sm">
              </div>               

            <?php endif; ?>

          </div>
        
        </div>
        
      <?php if(isset($relacionadas)): ?>

        <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Otras canciones de <strong><?php echo $fila->inte_nombre?></h3>
        </div>
        
        <div class="box-body">
          <ul class="products-list product-list-in-box">

            <?php foreach($relacionadas as $c): ?> 

            <li class="item col-xs-12 col-sm-4 col-md-4">

                <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$c->canc_alias)?>" class="product-title">
                    <?php echo $c->canc_titulo; ?>
                </a>

            </li>
            
            <?php endforeach; ?>
          </ul>
        </div>
        
        </div>

      <?php endif; ?>        
      
    </div>

    
        <?php $this->load->view($sidebar); ?>
        

</div>