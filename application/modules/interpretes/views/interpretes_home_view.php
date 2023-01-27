<?php if ($_SERVER['SERVER_NAME'] != 'localhost') {
  $this->load->view("adsense/adsense_biografias_view");
}
?>

<div class="row">

  <div class="col-xs-12">

    <p>Autores e intérpretes más destacados del folklore argentino reunidos en el Portal del Folklore Argentino. Biografías e información de los artistas, músicos, cantores y cantantes que interpretan el repertorio del folklore argentino.</p>

    <p>Los intérpretes de folklore argentino que se encuentran en dicha sección, contienen la información que hemos ido recibiendo de los usuarios del sitio como así también recopilada por nosotros</p>

    <h2>¿Quiénes son los artistas más convocantes de la música folklórica argentina en la actualidad?</h2>
    <p>En base a diversas encuestas que hemos armado en nuestro sitio obtenemos los siguientes resultados que cabe aclarar no significa que dichas posiciones o intérpretes vayan subiendo o bajando del ranking.</p>
    <p>Abel Pintos, Luciano Pereyra, Jorge Rojas, Soledad Pastorutti, Los Nocheros, Los Huayra, Chaqueño Palavecino, Campedrinos, Sergio Galleguillo, Los Tekis, Facundo Toro, Destino San Javier, El Indio Lucio Rojas, Lazaro Caballero, Guitarreros, Los Nombradores del Alba.</p>

    <h2>¿Cuáles son los intérpretes más reconocidos de la música folklórica argentina en el exterior?</h2>
    <p>Los cantores y en algunos casos canta autores mencionados a continuación son aquellos que han llevado al Folklore Argentino a escucharse por el mundo. En algunos casos hasta en otras lenguas.</p>
    <p>Los Chalchaleros, Mercedes Sosa, Lisandro Aristimuño, Jorge Cafrune, Los Nocheros, Soledad Pastorutti, Atahualpa Yupanqui, Liliana Herrero, Mariana Baraj, Horacio Guarany y Peteco Carabajal entre otros.</p>

    <p>Artistas folkloricos de nuestro país reunidos en el Portal del Folklore Argentino. Encontrá toda la información relacionada, biografías, letras de canciones, discos editados, proximos shows, gacetillas de prensa y videos musicales. </p>
    <p>Si conocés un grupo folklorico que no se encuentra en nuestro sitio o formás parte de el te invitamos a que lo agregues vos mismo.</p>

  </div>



  <div class="col-xs-12">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Ultimos artistas ingresados</h3>
      </div>

      <div class="box-body">

        <?php foreach ($ultimos as $fila) :        ?>


          <div class="well col-xs-12 col-sm-4 col-md-2">
            <a href="<?php echo base_url(); ?>biografia-de-<?php echo $fila->inte_alias; ?>">

              <?php echo $fila->inte_nombre ?>

            </a>
          </div>


        <?php endforeach; ?>

      </div>

    </div>

  </div>

  <div class="col-xs-12">
    <h2>¿Quién es el mejor cantante de folklore argentino?</h2>
    <p>Existen miles de controversias y opiniones acerca de quien es el mejor cantante folklorico argentino por lo cual nos vamos a basar en un ranking de la web más popular de reproducciones de musica online.</p>
    <p>Atahualpa Yupanqui, Los Chalchaleros, Jorge Cafrune, Liliana Herrero, Argentino Luna, Mercedes Sosa, Ariel Ramírez, Peteco Carabajal, Luna Creciente y Raúl Barboza, aparecen como los más escuchados de Argentina.</p>



    <h2>¿Cuáles son los intérpretes más visitados en nuestro sitio?</h2>
    <p>A continuación listamos las biografías de intérpretes folklóricos argentinos más visitados en nuestro portal. Cabe destacar que el mismo varía en base a las visitas que vayan teniendo en el tiempo.</p>
  </div>

  <div class="col-xs-12">

    <div class="box box-warning">

      <div class="box-header with-border">
        <h3 class="box-title">Artistas más visitados</h3>
      </div>

      <div class="box-body">

        <?php foreach ($populares as $fila) :  ?>

          <div class="well col-xs-12 col-sm-4 col-md-2">
            <a href="<?php echo base_url(); ?>biografia-de-<?php echo $fila->inte_alias; ?>">
              <?php echo $fila->inte_nombre ?>
            </a>

            <br><?php echo $fila->inte_visitas; ?> visitas

          </div>

        <?php endforeach; ?>


      </div>



    </div>

  </div>




  <?php $this->load->view($sidebar); ?>



</div>