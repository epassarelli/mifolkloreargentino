<?php 
if(isset($_SESSION['userData']['picture_url'])){
    $fotoUser = $_SESSION['userData']['picture_url'];
    $nameUser = $_SESSION['userData']['first_name'];
  }
    else{ 
      $fotoUser =  site_url('assets/img/mfa.jpg');
      $nameUser = $this->tank_auth->get_username();
    }
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $fotoUser; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $nameUser; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->

      <li <?php if($this->uri->segment(2) == 'noticias') echo "class='active'"; ?> >
        <a href="<?php echo site_url('noticias');?>"><i class="fa fa-bullhorn"></i> <span>Noticias</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'interpretes') echo "class='active'"; ?> >
        <a href="<?php echo site_url('grupos-y-solistas');?>"><i class="fa fa-user"></i> <span>Artistas</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'canciones') echo "class='active'"; ?> >
        <a href="<?php echo site_url('letras-de-canciones');?>"><i class="fa fa-music"></i> <span>Canciones</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'shows') echo "class='active'"; ?> >
        <a href="<?php echo site_url('cartelera-folklorica');?>"><i class="fa fa-calendar"></i> <span>Cartelera</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'comidas') echo "class='active'"; ?> >
        <a href="<?php echo site_url('recetas-de-comidas-tipicas');?>"><i class="fa fa-cutlery"></i> <span>Comidas</span></a></li>         
      
      <li <?php if($this->uri->segment(2) == 'discos') echo "class='active'"; ?> >
        <a href="<?php echo site_url('discografias');?>"><i class="fa fa-bullseye"></i> <span>Discos</span></a></li> 
      <!--
      <li <?php if($this->uri->segment(2) == 'efemerides') echo "class='active'"; ?> >
        <a href="<?php echo site_url();?>admin/efemerides"><i class="fa fa-comment"></i> <span>Efemerides</span></a></li>      
      -->
      <li <?php if($this->uri->segment(2) == 'festivales') echo "class='active'"; ?> >
        <a href="<?php echo site_url('fiestas-tradicionales-argentina');?>"><i class="fa fa-map"></i> <span>Festivales</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'mitos') echo "class='active'"; ?> >
        <a href="<?php echo site_url('mitos-y-leyendas');?>"><i class="fa fa-paw"></i> <span>Mitos</span></a></li> 

      <li <?php if($this->uri->segment(2) == 'penias') echo "class='active'"; ?> >
        <a href="<?php echo site_url('penias-folkloricas');?>"><i class="fa fa-map-marker"></i> <span>Pe&ntilde;as</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'radios') echo "class='active'"; ?> >
        <a href="<?php echo site_url('radios-para-escuchar-folklore-argentino');?>"><i class="fa fa-volume-up"></i> <span>Radios</span></a></li>          
    
      <li <?php if($this->uri->segment(2) == 'ayuda') echo "class='active'"; ?> >
        <a href="<?php echo site_url('ayuda');?>"><i class="fa  fa-lightbulb-o"></i> <span>Ayuda</span></a></li>   

    </ul>
    <!-- /.sidebar-menu -->
  </section>

  <?php //echo Modules::run('contacto'); ?>
  <!-- /.sidebar -->
</aside>