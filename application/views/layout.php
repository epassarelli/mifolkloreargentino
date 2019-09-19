<!DOCTYPE html>
<html>
<head>  

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="google-site-verification" content="b4e3xgPWj0Fwb1N4ggo93LYs33S1uZ7EAUnyEaIGP90" />
  <meta name="author" content="WebPass" />
  <meta name="description" content="<?php if(isset($description)) echo $description; ?>">
  <meta name="keywords" content="<?php if(isset($keywords)) echo $keywords; ?>">  


  <title><?php  if(strlen($title) < 70){ $titulo = $title . ' | Mi Folklore Argentino'; echo $titulo; }; ?></title>
    
  <?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("adsense/adsense_head_view"); } ?>

  <?php if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("google_analitycs_view"); } ?>
  
  <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../">
  <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins.  -->
  <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/dist/css/skins/skin-yellow.min.css'); ?>">


  <?php if(isset($css_files)): ?>
    <?php foreach($css_files as $file): ?>
  		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" disabled>
  	<?php endforeach; ?>
  <?php endif; ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" disabled>
</head>


<body class="hold-transition skin-yellow sidebar-mini">


  
<div class="wrapper">

  <?php $this->load->view('front/header_front_view'); ?>  

  <?php $this->load->view('front/aside_front_view'); ?>  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header)-->
    <section class="content-header">

    <?php if(isset($breadcrumb)): ?>
      <ol class="breadcrumb hidden-xs">
        <?php 
        foreach ($breadcrumb as $key => $value) {
          # code...
          echo "<li><a href='$value''>$key</a></li>";
        }; 
        ?>
        <li class="hidden-xs">
         <?php //if( $_SERVER['SERVER_NAME'] != 'localhost' ) { $this->load->view("facebook/fb_like_count_view"); } ?>
        </li>
    </ol>
    <?php endif; ?>      


      <h1><?php echo $title; ?></h1>

    </section>
    

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- | Your Page Content Here | -->
      	<?php 
      	if (isset($output)){
      		echo $output;
      	}
      	else{
			     $this->load->view($view);
      	}
      	?>
      <!--   -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Contacto
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2009-<?php echo date('Y',time()); ?> - <a href="http://webpass.com.ar" target="_blank">Dise&ntilde;o y Desarrollo Web</a>.</strong> Todos los derechos reservados.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

   
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Ayuda</h3>
        <!--
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Aniversario</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
      -->
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Preguntas frecuentes</h3>
        <!--
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
      -->
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <!--<h3 class="control-sidebar-heading">Configuracion General</h3>-->
          <?php echo Modules::run('contacto',''); ?>
          <!--
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
        -->
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<?php if (isset($output)): ?>
  <script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>

<?php endif; ?>

<?php if(isset($js_files)): ?>

  <?php foreach($js_files as $file): ?>
  	
    <script src="<?php echo $file; ?>"></script>

  <?php endforeach; ?>

<?php else: ?>
  <!-- jQuery 3 -->
  <script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>

<?php endif; ?>

<!-- AdminLTE App -->
<script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>dist/js/adminlte.min.js"></script>
     
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/scripts.js" defer></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url().'assets/templates/adminlte242/'; ?>bower_components/Ionicons/css/ionicons.min.css">
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/templates/adminlte242/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/templates/adminlte242/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#interpretes').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    })
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script type="text/javascript">
  

    $("#send").click(function(){       
      
     letra = $("#letra").val();
     cancion_id = <?php echo $cancion->canc_id; ?>;
     //alert(letra + ' - ' + cancion_id);
     $.ajax({
         type: "post",
         url: "<?php echo base_url('canciones/sugerirLetra'); ?>", 
         //data: {letra: , cancion_id: },
         data: {letra: letra, cancion_id: cancion_id},
         dataType: "text",  
         cache:false,
         success: 
              function(devuelto){
                //console.log(devuelto);
                flag = parseInt(devuelto);
                if(flag == 1){
                  $( '#error' ).empty();
                  $( '#mensaje' ).html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Felicitaciones!</h4>Se sugerido exitosamente la letra de dicha canción.</div>');
                }
                else{
                  alert('La letra sugerida no tiene la suficiente cantidad de caracteres');
                  
                  $( '#error' ).html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Atención!</h4>La letra sugerida no tiene la suficiente cantidad de caracteres necesarios.</div>');
                }
                
                //alert(devuelto);  //as a debugging message.
              }
          });// you have missed this bracket
     return false;
 });

</script>   
</body>
</html>