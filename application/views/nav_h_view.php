<nav id="nav" class="navbar navbar-default navbar-fixed-top">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Menu</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    
    <a class="navbar-brand" href="<?php echo base_url()?>">
      <span aria-hidden="true" class="glyphicon glyphicon-home"></span>
    </a>
    <span class="navbar-brand hidden-sm hidden-md hidden-lg">
      <?php $this->load->view("facebook/fb_like_count_view.php"); ?>
    </span>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <!--<li><a href="<?php echo base_url()?>radios-para-escuchar-folklore-argentino">Radios</a></li>-->
      
      <li><a href="<?php echo base_url()?>noticias">Noticias</a></li> 
      <li><a href="<?php echo base_url()?>grupos-y-solistas">Interpretes</a></li>
      <li><a href="<?php echo base_url()?>letras-de-canciones">Canciones</a></li>
      <li><a href="<?php echo base_url()?>cartelera-folklorica">Cartelera</a></li>
      <li><a href="<?php echo base_url()?>fiestas-tradicionales-argentina">Festivales</a></li>
      
      <li><a href="<?php echo base_url()?>radios-para-escuchar-folklore-argentino">Radios</a></li>
      <li><a href="<?php echo base_url()?>recetas-de-comidas-tipicas">Comidas</a></li>        
      <li><a href="<?php echo base_url()?>mitos-y-leyendas">Mitos</a></li>
            
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <?php if ($this->facebook->is_authenticated() OR $this->tank_auth->is_logged_in()): ?>      
        <li><a href="<?php echo base_url()?>admin">Ir a Mi Panel</a></li>
        <li><a href="<?php echo base_url()?>auth/logout">Salir</a></li>
      <?php else: ?>
        <li><a href="<?php echo base_url();?>auth/login">Ingresar <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a></li>
      <?php endif; ?>      
      
    </ul>
    </div><!-- /.navbar-collapse -->
    
  </nav>