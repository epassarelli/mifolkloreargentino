<aside class="main-sidebar">

  <section class="sidebar">

    <ul class="sidebar-menu" data-widget="tree">
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
      <li <?php if($this->uri->segment(2) == 'festivales') echo "class='active'"; ?> >
        <a href="<?php echo site_url('fiestas-tradicionales-argentina');?>"><i class="fa fa-map"></i> <span>Festivales</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'mitos') echo "class='active'"; ?> >
        <a href="<?php echo site_url('mitos-y-leyendas');?>"><i class="fa fa-paw"></i> <span>Mitos</span></a></li> 

      <li <?php if($this->uri->segment(2) == 'penias') echo "class='active'"; ?> >
        <a href="<?php echo site_url('penias-folkloricas');?>"><i class="fa fa-map-marker"></i> <span>Pe&ntilde;as</span></a></li> 
      
      <li <?php if($this->uri->segment(2) == 'radios') echo "class='active'"; ?> >
        <a href="<?php echo site_url('radios-para-escuchar-folklore-argentino');?>"><i class="fa fa-volume-up"></i> <span>Radios</span></a></li>          
    </ul>

  </section>
  
</aside>