<!DOCTYPE html>
<html>
<head>  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="google-site-verification" content="jVJRpZZXbfAo0RHiah6NGTfuHwJaAFWule00UR5surQ" />
  <meta name="author" content="WebPass" />
  
  <?php if (isset($description)): ?>
    <meta name="description" content="<?php if(isset($description)) echo $description; ?>">
  <?php endif; ?>
  
  <?php if (isset($keywords)): ?>
    <meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>"> 
  <?php endif; ?> 

  <title>
    <?php 
      if (isset($title)){
          $title = $title; //'Mi panel';
        }
        else{
           $title = "Folklore Argentino";
        }

      echo $title;
    ?>    
  </title>
    
  <?php //if( $_SERVER['SERVER_NAME'] !== 'localhost' ) { $this->load->view("adsense/adsense_head_view"); } ?>
  <?php if( $_SERVER['SERVER_NAME'] !== 'localhost' ) { $this->load->view("google_analitycs_view"); } ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!--   <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" disabled> -->
</head>

<body class="hold-transition skin-yellow sidebar-mini">

<?php 
//var_dump($this->session->userdata()); 
//echo "<hr>";
//var_dump($this->ion_auth->get_users_groups($this->session->userdata('user_id'))->result());
?>
<?php //if( $_SERVER['SERVER_NAME'] !== 'localhost' ) { $this->load->view("facebook/fb_connect_view"); } ?>
  
<div class="wrapper">


  <header class="main-header">

    <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><b>MF</b>A</span>
      <span class="logo-lg"><b>Mi </b>Folklore Argentino</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigacion</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            
          <?php 
            if ($this->ion_auth->logged_in()): 
              $user = $this->ion_auth->user()->row();
          
          ?>


            <a href="#" class="dropdown-toggle" data-toggle="control-sidebar">
              <img src="<?php echo $user->picture_url; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user->first_name.', '.$user->last_name; ?></span>
            </a>


                <?php else: ?>
            <a href="<?php echo site_url('auth/login'); ?>">
              <i class="fa fa-user"></i>                  
                 Ingresar
              </span>
            </a>   
        

          <?php endif; ?>

          </li>


          <?php if ($this->ion_auth->is_admin()): ?>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
              Administrar <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/interpretes'); ?>">interpretes</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/gacetillas'); ?>">gacetillas</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/shows'); ?>">shows</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/discos'); ?>">discos</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/canciones'); ?>">canciones</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/festivales'); ?>">festivales</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/efemerides'); ?>">efemerides</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/comidas'); ?>">comidas</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/radios'); ?>">radios</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/penias'); ?>">penias</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/mitos'); ?>">mitos</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/avisos'); ?>">avisos</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/videos'); ?>">videos</a></li>
              
              <li role="presentation" class="divider"></li>

              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/usuarios'); ?>">Usuarios</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/permisos'); ?>">Permisos</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/contactos'); ?>">contactos</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/cancionessugeridas'); ?>">cancionessugeridas</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/provincias'); ?>">provincias</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/localidades'); ?>">localidades</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/faqscategorias'); ?>">faqscategorias</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/faqs'); ?>">faqs</a></li>              
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/guias'); ?>">guias</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/rubros'); ?>">rubros</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('wpanel/meses'); ?>">meses</a></li>                            
            </ul>
          </li>


          <?php endif; ?>

        </ul>
      </div>
    </nav>

  </header>


  <?php $this->load->view('aside_menu_principal_view'); ?>  

  <?php $this->load->view('aside_publicar_view'); ?>

  <div class="content-wrapper">
    <section class="content-header">

    <?php if(isset($breadcrumb)): ?>
      <ol class="breadcrumb hidden-xs">
        <?php 
        foreach ($breadcrumb as $key => $value) {
          echo "<li><a href='$value''>$key</a></li>";
        }; 
        ?>
    </ol>
    <?php endif; ?>      

      <h1><?php echo $title; ?></h1>
      <?php //if( $_SERVER['SERVER_NAME'] !== 'localhost' ) { $this->load->view("facebook/fb_like_count_view"); } ?>


    </section>

    <section class="content container-fluid">
      	<?php 
      	if (isset($output)){
      		echo $output;
      	}
      	else{
			     $this->load->view($view);
      	}
      	?>
    </section>

    <section class="content container-fluid">
        <?php $this->load->view('social_share_view'); ?>
    </section>

  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">

      <a href="<?php echo site_url('contacto'); ?>">Contactarnos</a>
    </div>
    <strong>Copyright &copy; 2009-<?php echo date('Y',time()); ?> - <a href="http://webpass.com.ar" target="_blank">Dise&ntilde;o y Desarrollo Web</a>.</strong> Todos los derechos reservados.
  </footer>

  

  <div class="control-sidebar-bg"></div>
</div>

  <?php if (!isset($output)): ?>
    <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <?php endif; ?>
    
    <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/dist/css/skins/skin-yellow.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/mfa.css');?>">
 
  <?php if(isset($css_files)): ?>
    <?php foreach($css_files as $file): ?>
      
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if(isset($files_css)): ?>
    <?php foreach($files_css as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo site_url('assets/css/'.$file); ?>">
      <!-- <script src="<?php echo site_url($file); ?>"></script> -->
    <?php endforeach; ?>
  <?php endif; ?>


  <?php if (!isset($output)): ?>
    <script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- <script async src="<?php echo base_url();?>assets/js/scripts.js"></script> -->
  <?php endif; ?>

<input type="hidden" id="url" value="<?php echo site_url();?>">


  <?php if(isset($js_files)): ?>
    <?php foreach($js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php if(isset($files_js)): ?>
    <?php foreach($files_js as $file): ?>
      <script src="<?php echo site_url('assets/js/'.$file); ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>


  <script async src="<?php echo site_url().'assets/templates/adminlte242/'; ?>dist/js/adminlte.min.js"></script>
  <script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
  



  <script>  
    $(document).ready(function() {
      let urlBase = $('#url').val();
      
      // bind change event to select
      $('#interprete').bind('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
      });

      // bind change event to select
      $('#provincia-fiesta').bind('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
      });

      // bind change event to select
      $('#mes-fiesta').bind('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
      });


///////////////////////////// SCRIPT ////////////////////////////////

    $('#EnviarP').click(function (e) { 
        e.preventDefault();
        //tomamos el valor del boton para saber cual estado enviar el .object va asociado al data, si el atributo de html es data-pirulo la cosntante del objeto finaliza con .pirulo: e.target.dataset.pirulo
        const Objeto = e.target.dataset.object;
        //alert(Objeto);
        enviarobjeto(Objeto)
      });

    function enviarobjeto(Objeto) { 
      $.ajax({  
          url: 'http://localhost/mifolkloreargentino/admin/sugerir',
          method:"POST",  
          // Metodo para tomar datos sin archivos
          data:{
              Objeto: Objeto
          },  
          // respuesta del envio
          dataType: "json",
          success: function(response) {
              // Aqui dependiedo de lo que quieras hacer condicionas ó si no haras ninguna accion coloca un return para que salga de la funcion
              alert(Objeto);
            }  // success
          });  // Ajax
     }

      // En el metodo de CI tomas el valor con:  ...input->post(Objeto)          
      // Carga de nueva letra
      $("#send").click(function(){       
       letra = $("#letra").val();
       cancion_id = '<?php if(isset($cancion->canc_id)){ echo $cancion->canc_id; } else { echo "1";}; ?>';
       $.ajax({
           type: "post",
           url: "<?php echo base_url('canciones/sugerirLetra'); ?>", 
           data: {letra: letra, cancion_id: cancion_id},
           dataType: "text",  
           cache:false,
           success: 
                function(devuelto){
                  flag = parseInt(devuelto);
                  if(flag == 1){
                    $( '#error' ).empty();
                    $( '#mensaje' ).html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Felicitaciones!</h4>Se sugerido exitosamente la letra de dicha canción.</div>');
                  }
                  else{
                    alert('La letra sugerida no tiene la suficiente cantidad de caracteres');
                    $( '#error' ).html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Atención!</h4>La letra sugerida no tiene la suficiente cantidad de caracteres necesarios.</div>');
                  }
                }
            });
       return false;
      });


  });
  </script>
    <?php //if (!isset($output)): ?>
<!-- <script type="text/javascript" charset="utf-8">
  $(document).ready( function () {

      $('#ABM').dataTable( {
            "language": {                
                  "sProcessing": "Procesando...",
                  "sLengthMenu": "Mostrar _MENU_ registros",
                  "sZeroRecords": "No se encontraron resultados",
                  "sEmptyTable": "NingÃºn dato disponible en esta tabla",
                  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix": "",
                  "sSearch": "Buscar:",
                  "sUrl": "",
                  "sInfoThousands": ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": 
                  {
                    "sFirst": "Primero",
                    "sLast": "Ultimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                  }
            }
      } );
  } );   

</script>  -->
<?php //endif; ?>
</body>
</html>