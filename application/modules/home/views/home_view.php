<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_home_superior_view"); }?>

<div class="row">

  <div class="col-xs-12">
  <div class="box box-warning">    
    <div class="box-header with-border">
      <h2 class="box-title">Ultimas noticias folcloricas</h2>
    </div>
    <div class="box-body">

      <?php foreach ($noticias as $n):  ?>

      <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
        <div class="thumbnail">
          
          <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">                 
            <img src="<?php echo site_url('assets/upload/noticias/'.$n->noti_foto);?>" alt="<?php echo $n->noti_titulo; ?>" class="img-responsive" itemprop="image">      
          </a>
          <div class="caption">
            <a href="<?php echo site_url('noticias/ver/'.$n->noti_alias); ?>">
              <h4><?php echo $n->noti_titulo; ?></h4>
            </a>                                       
          </div>

        </div>
      </div>

      <?php endforeach; ?>
    </div>

  </div>
  </div>

</div>





<div class="row">
  

<div class="col-md-4 col-xs-12">

  <div class="box box-warning">    
    <div class="box-header with-border">
      <h3 class="box-title">Ultimas letras agregadas</h3>
    </div>
    <div class="box-body">
      <ul class="products-list product-list-in-box">
    <?php 
      foreach($canciones as $fila): 

                $foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
                if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }
    ?> 




    <li class="item">
      <a href="<?php echo site_url('letras-de-canciones-de-'.$fila->inte_alias.'/'.$fila->canc_alias)?>" class="product-title">
              
              <div class="product-img">
                <img src="<?php echo $foto; ?>" alt="<?php echo $fila->canc_titulo; ?>">
              </div>
              
              <div class="product-info">
                <?php echo $fila->canc_titulo; ?>

                <span class="product-description">
                    <?php echo $fila->inte_nombre?>
                </span>
                
              </div>

            </a>
        </li>        
          <?php endforeach; ?>
        </ul>

    </div>
    <div class="box-footer">
      <a href="<?php echo site_url('letras-de-canciones'); ?>">Letras de canciones</a>
    </div>
  </div>

</div>





<div class="col-md-4 col-xs-12">
  <div class="box box-warning">    
    <div class="box-header with-border">
      <h3 class="box-title">Proximos shows en cartelera</h3>
    </div>
    <div class="box-body">
    <?php     
    foreach($shows as $e):
          $foto = "assets/upload/interpretes/" . $e->inte_foto;
          if (is_dir($foto)) 
            { $foto = "assets/upload/sin_foto.jpg"; }

          $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
          $meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
           
          $dia  = (int) date("d", strtotime($e->even_fecha));
          $mes  = date("m", strtotime($e->even_fecha));
          $mes  = (int) $mes;
          $anio = date("Y", strtotime($e->even_fecha));
    ?> 
    

          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i>
            </span>


            <div class="info-box-content">
              <span class="info-box-text"><?php echo $e->even_lugar; ?></span>
              <span class="info-box-number"><?php echo $e->inte_nombre; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo $dia . ' de ' . $meses[$mes]; ?>
                    <div class="box-tools pull-right">

                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#<?php echo $e->even_id; ?>">
                        <i class="fa fa-plus-circle"></i> 
                      </button>
                    </div>
                  </span>     
            </div>
            
          </div>
          



        <div class="modal fade" id="<?php echo $e->even_id; ?>" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?php echo $e->inte_nombre; ?></h4>
              </div>
              <div class="modal-body">
                <h4><?php echo $dia . ' de ' . $meses[$mes] . ' de ' . $anio; ?></h4>
                <p>
                  <span class="product-description">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?php echo $e->even_lugar?><br>
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $e->even_direccion?> - 
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo $e->even_hora?> hs.<br>
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span> <?php echo $e->loca_nombre?>, <?php echo $e->prov_nombre?>
                  </span>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                
              </div>
            </div>
            
          </div>
          
        </div>

    <?php endforeach; ?>

    <div class="box-footer">
      <a href="<?php echo site_url('cartelera-folklorica'); ?>">Cartelera folklorica</a>
    </div>
  </div>

</div>
</div>




<div class="col-md-4 col-xs-12">

  <div class="box box-warning">    
    <div class="box-header with-border">
      <h3 class="box-title">Ultimos artistas sugeridos</h3>
    </div>
    <div class="box-body">
      <ul class="products-list product-list-in-box">
    <?php 
      foreach($interpretes as $fila): 

                $foto = "assets/upload/interpretes/" . $fila->inte_foto;
              
                if (is_dir($foto)) 
                  { $foto = "assets/upload/sin_foto.jpg"; }
    ?> 




    <li class="item">
      <a href="<?php echo base_url();?>biografia-de-<?php echo $fila->inte_alias;?>">
              
              <div class="product-img">
                <img src="<?php echo $foto; ?>" alt="<?php echo $fila->inte_nombre; ?>">
              </div>
              
              <div class="product-info">
                <?php echo $fila->inte_nombre; ?>

                <span class="product-description">
                    Visto <?php echo $fila->inte_visitas; ?> veces
                </span>
                
              </div>

            </a>
        </li>        
          <?php endforeach; ?>

        </ul>
    </div>
    <div class="box-footer">
      <a href="<?php echo site_url('interpretes'); ?>">Interpretes folkloricos</a>
    </div>
  </div>

</div>




</div>










<div class="row">

  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">&iquest;Qu&eacute; es el Folklore Argentino?</div>
      <div class="panel-body">
      <p>En sus vertientes musicales, el folklore argentino es muy variado en r&iacute;tmicas, timbres, y letras relacionados directamente al lugar de origen.</p> 
      <p>La amplia extensi&oacute;n territorial da como resultado muchos estilos que difieren de una regi&oacute;n a otra. No s&oacute;lo en la m&uacute;sica e instrumentos, sino tambi&eacute;n involucra ceremonias y bailes t&iacute;picos.</p> 
      </div>
    </div>  
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">&iquest;Qu&eacute; encontrar&aacute; en Mi Folklore Argentino?</div>
      <div class="panel-body">      
      <p>Letras de canciones de la&nbsp;m&uacute;sica&nbsp;popular argentina. Acordes de <em>canciones folkl&oacute;ricas</em>. Mitos, leyendas y costumbres de el gaucho argentino. </p>
      <p>Historia, fotos, videos y discograf&iacute;as de <em><strong>grupos y solistas del folklore argentino</strong></em>. Comidas tipicas y populares asociadas a nuestro folklore argentino y destrezas varias.</p>
      </div>
    </div>          
  </div>
  
</div>



<div class="row">
  <div class="col-xs-12 col-sm-12">
  <div class="panel panel-default">
      <div class="panel-heading">Historia de la m&uacute;sica Folkl&oacute;rica Argentina</div>
      <div class="panel-body">         
                  
        <div class="col-xs-12 col-sm-6">
          <p>La <strong>m&uacute;sica folkl&oacute;rica argentina</strong> tiene una historia centenaria que encuentra sus ra&iacute;ces en las culturas ind&iacute;genas originarias. Tres grandes acontecimientos hist&oacute;rico-culturales la fueron moldeando: la colonizaci&oacute;n espa&ntilde;ola, la inmigraci&oacute;n europea y la migraci&oacute;n interna .</p>
          <p>Aunque estrictamente &laquo;folklore&raquo; s&oacute;lo es aquella expresi&oacute;n cultural que re&uacute;ne los requisitos de ser an&oacute;nima, popular y tradicional, en Argentina &laquo;folklore&raquo; o &laquo;m&uacute;sica folkl&oacute;rica&raquo; es la m&uacute;sica popular y tradicional de autor conocido, inspirada en ritmos y estilos caracter&iacute;sticos de las culturas provinciales, mayormente de ra&iacute;ces ind&iacute;genas.</p>
          <p>En Argentina, el folklore comenz&oacute; a adquirir popularidad en los a&ntilde;os treinta y cuarenta, en coincidencia a una gran ola de migraci&oacute;n interna desde el campo a la ciudad y de las provincias a Buenos Aires, para instalarse en los a&ntilde;os cincuenta, con el &laquo;boom del folklore&raquo;, como g&eacute;nero principal de la m&uacute;sica popular nacional y tradicional junto al tango.</p>
        </div>
        
        <div class="col-xs-12 col-sm-6">
          <p>En los a&ntilde;os sesenta y setenta se expandi&oacute; la popularidad del &laquo;folklore&raquo; argentino y se vincul&oacute; a otras expresiones similares de Am&eacute;rica Latina, de la mano de diversos movimientos de renovaci&oacute;n musical y l&iacute;rica, y la aparici&oacute;n de grandes festivales de este g&eacute;nero, en particular, el <strong>Festival Nacional de Folklore de Cosqu&iacute;n</strong>, probablemente el m&aacute;s importantes del mundo3en ese campo.</p>
          <p>Luego de ser seriamente afectado por la represi&oacute;n cultural impuesta en la dictadura instalada entre 1976-1983, la m&uacute;sica folkl&oacute;rica resurgi&oacute; a partir de la Guerra de las Malvinas de 1982, aunque con expresiones relacionadas a otros g&eacute;neros de la m&uacute;sica popular argentina y latinoamericana, como el tango, el llamado &laquo;rock nacional&raquo;, la balada rom&aacute;ntica latinoamericana, el cuarteto y la cumbia.</p>
          <p>La evoluci&oacute;n hist&oacute;rica fue conformando cuatro grandes regiones en la <strong>m&uacute;sica folkl&oacute;rica argentina</strong>: la cordobesa-noroest3, la cuyana, la litoralena y la surera pampeano-patag&oacute;nica, a su vez influenciadas, e influyentes en, las culturas musicales de pa&iacute;ses fronterizos: Bolivia, sur de Brasil, Chile, Paraguay y Uruguay. Atahualpa Yupanqui es un&aacute;nimemente considerado el artista m&aacute;s importante de la historia de la m&uacute;sica Folkl&oacute;rica Argentina.</p>            
        </div>
      </div>
    </div>
  </div>
</div>            