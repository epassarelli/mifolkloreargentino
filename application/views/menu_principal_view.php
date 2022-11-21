<div class="navbar-header">
  <a href="<?php echo site_url(); ?>" class="navbar-brand">MFA</a>
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
    <i class="fa fa-bars"></i>
  </button>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">

    <li <?php if ($this->uri->segment(1) == 'noticias') echo "class='active'"; ?>>
      <a href="<?php echo site_url('noticias'); ?>">Noticias</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'interpretes') echo "class='active'"; ?>>
      <a href="<?php echo site_url('interpretes'); ?>">Interpretes</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'letras-de-canciones') echo "class='active'"; ?>>
      <a href="<?php echo site_url('letras-de-canciones'); ?>">Canciones</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'cartelera-folklorica') echo "class='active'"; ?>>
      <a href="<?php echo site_url('cartelera-folklorica'); ?>">Cartelera</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'recetas-de-comidas-tipicas') echo "class='active'"; ?>>
      <a href="<?php echo site_url('recetas-de-comidas-tipicas'); ?>">Comidas</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'discos-de-musica-folklorica') echo "class='active'"; ?>>
      <a href="<?php echo site_url('discos-de-musica-folklorica'); ?>">Discos</a>
    </li>
    <li <?php if ($this->uri->segment(1) == 'fiestas-tradicionales-argentina') echo "class='active'"; ?>>
      <a href="<?php echo site_url('fiestas-tradicionales-argentina'); ?>">Festivales</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'mitos-y-leyendas') echo "class='active'"; ?>>
      <a href="<?php echo site_url('mitos-y-leyendas'); ?>">Mitos</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'penias-folkloricas') echo "class='active'"; ?>>
      <a href="<?php echo site_url('penias-folkloricas'); ?>">Pe&ntilde;as</a>
    </li>

    <li <?php if ($this->uri->segment(1) == 'radios-para-escuchar-folklore-argentino') echo "class='active'"; ?>>
      <a href="<?php echo site_url('radios-para-escuchar-folklore-argentino'); ?>">Radios</a>
    </li>

    <!-- <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li class="divider"></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li> -->

  </ul>
  <!-- <form class="navbar-form navbar-left" role="search">
    <div class="form-group">
      <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
    </div>
  </form> -->
</div>

<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">

    <li class="dropdown user user-menu">

      <?php
      if ($this->ion_auth->logged_in()) :
        $user = $this->ion_auth->user()->row();

      ?>

        <a href="#" class="dropdown-toggle" data-toggle="control-sidebar">
          <img src="<?php echo $user->picture_url; ?>" class="user-image" alt="Avatar">
          <span class="hidden-xs"><?php echo $user->first_name . ', ' . $user->last_name; ?></span>
        </a>

      <?php else : ?>
        <a href="<?php echo site_url('auth/login'); ?>">
          <i class="fa fa-user"></i>
          Ingresar
          </span>
        </a>

      <?php endif; ?>

    </li>

    <?php if ($this->ion_auth->is_admin()) : ?>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
          Admin <span class="caret"></span>
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

    <!-- User Account Menu -->

  </ul>
</div>
<!-- /.navbar-custom-menu -->