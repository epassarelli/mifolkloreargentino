<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->config->item('site_name'); ?> | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/templates/adminlte242/'; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins.  -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/templates/adminlte242/'; ?>dist/css/skins/skin-blue.min.css">

<?php if(isset($css_files)): ?>
  <?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
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
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">


  
<div class="wrapper">

  <?php $this->load->view('back/header_view'); ?>  

  <?php $this->load->view('back/aside_view'); ?>  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header)-->
    <section class="content-header">
      <h1>
        Mi panel de administracion
        <small>Sugerencias de contenidos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Mi Panel</a></li>
        <li class="active">Seccion actual</li>
      </ol>

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
    <strong>Copyright &copy; 2009-2018 - <a href="http://webpass.com.ar" target="_blank">Dise&ntilde;o y Desarrollo Web</a>.</strong> Todos los derechos reservados.
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
        <h3 class="control-sidebar-heading">Actividad reciente</h3>
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
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Progreso de Tareas</h3>
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
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configuracion General</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
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
  <script src="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>

<?php endif; ?>

<?php if(isset($js_files)): ?>

  <?php foreach($js_files as $file): ?>
  	
    <script src="<?php echo $file; ?>"></script>

  <?php endforeach; ?>

<?php else: ?>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>

<?php endif; ?>

<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/templates/adminlte242/'; ?>dist/js/adminlte.min.js"></script>
     
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url().'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>