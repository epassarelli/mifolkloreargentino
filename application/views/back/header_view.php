<?php 
if(isset($_SESSION['userData']['picture_url'])){
    $fotoUser = $_SESSION['userData']['picture_url'];
    $nameUser = $_SESSION['userData']['first_name'];
  }
    else{ 
      $fotoUser =  base_url().'assets/img/mfa.jpg';
      $nameUser = "Usuario";
    }
?>


  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MF</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mi </b>Folklore Argentino</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigacion</span>
      </a>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
        

            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $fotoUser; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $nameUser; ?></span>
            </a>
            
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $fotoUser; ?>" class="img-circle" alt="User Image">

                <p>
                  Administrador - Web Developer
                  <small>Mi Folklore Argentino</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Seguidores</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Compras</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Amigos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>auth/logout" class="btn btn-warning btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
