<?php 
if(isset($_SESSION['userData']['picture_url'])){
    $fotoUser = $_SESSION['userData']['picture_url'];
    $nameUser = $_SESSION['userData']['first_name'];
  }
    else{ 
      $fotoUser =  base_url().'assets/img/mfa.jpg';
      $nameUser = $this->tank_auth->get_username();
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
          
          <?php if ($this->facebook->is_authenticated() OR $this->tank_auth->is_logged_in()): ?> 
                        <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <i class="fa fa-user"></i>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $nameUser; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- <li class="header">You have 10 notifications</li> -->
                  <li>
                    <!-- inner menu: contains the actual data -->
                    
                    <ul class="menu">
                      <li>                       
                        <a href="<?php echo site_url('mipanel/interpretes');?>"><i class="ion ion-ios-people info"></i> Mis administrados</a>
                        <a href="<?php echo site_url('mipanel/noticias');?>"><i class="fa fa-bullhorn"></i> Mis administrados - Noticias</a>
                        <a href="<?php echo site_url('mipanel/shows');?>"><i class="fa fa-calendar"></i> Mis administrados - Agenda</a>
                        <a href="<?php echo site_url('mipanel/discos');?>"><i class="fa fa-bullseye"></i> Mis administrados - Discos</a>
                        <a href="<?php echo site_url('mipanel/canciones');?>"><i class="fa fa-music"></i> Mis administrados - Canciones</a>
                      </li>
                      
                    </ul>

                  </li>
                  <li class="footer"><a href="<?php echo site_url('auth/logout');?>">Salir</a></li>
                </ul>
              </li>

          <?php else: ?>
            
            <li>
              <a href="<?php echo base_url();?>auth/login"><i class="fa fa-user"></i> Ingresar
              </a>
            </li>

          <?php endif; ?>
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
