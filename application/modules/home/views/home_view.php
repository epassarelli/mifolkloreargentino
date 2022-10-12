<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_home_superior_view"); }
?>


<br>

<div class="row">

  <?php
  $i = 0;
  foreach ($noticias as $noticia) :

    // echo '<div class="row">';

    switch ($i) {
      case 0:
        echo '<div class="col-md-6 clearfix">';
        break;
      default:
        echo '<div class="col-md-3 clearfix">';
        break;
    }
  ?>

    <!-- <div class="col-xs-12 col-sm-12 col-md-8 clearfix"> -->
    <div class="thumbnail">

      <a href="<?php echo site_url('noticias/ver/' . $noticia->noti_alias); ?>">
        <img src="<?php echo site_url('assets/upload/noticias/' . $noticia->noti_foto); ?>" alt="<?php echo $noticia->noti_titulo; ?>" class="img-responsive" itemprop="image">
      </a>

      <div class="caption">
        <a href="<?php echo site_url('noticias/ver/' . $noticia->noti_alias); ?>">

          <?php
          if ($i == 0) {
            echo "<h2>" . $noticia->noti_titulo . "</h2></a>";
            //echo "<p>" . substr($noticia->noti_detalle, 0, 200) . "</p>";
          } else {
            echo "<h4>" . $noticia->noti_titulo . "</h4></a>";
          }
          ?>




      </div>

    </div>

    <!-- <div class="attachment-block clearfix">
      <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image">

      <div class="attachment-pushed">
        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

        <div class="attachment-text">
          Description about the attachment can be placed here.
          Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
        </div>

      </div>

    </div> -->


</div>


<?php
    $i++;
  endforeach;
?>
</div>

<div class="row">

  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">

      <div class="caption">
        <a href="<?php echo site_url('letras-de-canciones'); ?>" itemprop="url">
          <h3 itemprop="name">Letras de Canciones</h3>
          <img src="<?php echo site_url('assets/img/cancionero-folklorico.jpg'); ?>" alt="Cancionero folklorico" class="img-responsive" itemprop="image">
        </a>
      </div>

    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">

      <div class="caption">
        <a href="<?php echo site_url('cartelera-folklorica'); ?>" itemprop="url">
          <h3 itemprop="name">Cartelera Folklorica</h3>
          <img src="<?php echo site_url('assets/img/cartelera-folklorica.jpg'); ?>" alt="Cartelera folklorica" class="img-responsive" itemprop="image">
        </a>

      </div>

    </div>
  </div>


  <?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) {  $this->load->view('adsense/adsense_home_medio_view');} 
  ?>


  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">
      <div class="caption">
        <a href="<?php echo site_url('fiestas-tradicionales-argentina'); ?>" itemprop="url">
          <h3 itemprop="name">Festivales Tradicionales</h3>
          <img src="<?php echo site_url('assets/img/fiestas-tradicionales-argentina.jpg'); ?>" alt="Fiestas y festivales folkloricos" class="img-responsive" itemprop="image">
        </a>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">
      <div class="caption">
        <a href="<?php echo site_url('grupos-y-solistas'); ?>" itemprop="url">
          <h3 itemprop="name">Biografías folklóricas</h3>
          <img src="<?php echo site_url('assets/img/biografias-folkloricas.jpg'); ?>" alt="Biografias de folklore" class="img-responsive" itemprop="image">
        </a>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">
      <div class="caption"><a href="<?php echo base_url() . 'recetas-de-comidas-tipicas' ?>" itemprop="url">
          <h3 itemprop="name">Comidas Tradicionales</h3>
          <img src="<?php echo site_url('assets/img/comidas-tipicas.jpg'); ?>" alt="Comidas tipicas folkloricas" class="img-responsive" itemprop="image">
        </a>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-4 clearfix">
    <div class="thumbnail">
      <div class="caption"><a href="<?php echo base_url() . 'mitos-y-leyendas' ?>" itemprop="url">
          <h3 itemprop="name">Mitos, Leyendas y Fabulas</h3>
          <img src="<?php echo site_url('assets/img/mitos-leyendas-folklore.jpg'); ?>" alt="Mitos y leyendas" class="img-responsive" itemprop="image">
        </a>
      </div>
    </div>
  </div>




</div>


<?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) {  $this->load->view('adsense/adsense_home_inferior_view'); }
?>


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


</div>




<div class="row">

  <div class="col-xs-12">
    <h3 itemprop="name">Historia de la m&uacute;sica Folkl&oacute;rica Argentina</h3>
  </div>


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