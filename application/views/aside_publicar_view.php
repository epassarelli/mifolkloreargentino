<?php $user_profile = $this->session->userdata('user_profile'); ?>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="tab-content">
      <div class="tab-pane active" id="control-sidebar-home-tab">
        

    <div class="tab-pane active" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu">
       
          <li>
            <a href="<?php echo site_url('admin/interpretes');?>">
              <i class="menu-icon fa fa-user bg-light-blue"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Artistas</h4>
                <p>Datos de interpretes</p>
              </div>
            </a>
          </li>

          <li>
            <a href="<?php echo site_url('admin/shows');?>">
              <i class="menu-icon fa fa-calendar bg-yellow"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Shows / Agenda</h4>
                <p>Cartelera de artistas</p>
              </div>
            </a>
          </li>

          <li>
            <a href="<?php echo site_url('admin/noticias');?>">
              <i class="menu-icon fa fa-bullhorn bg-purple"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Noticias</h4>
                <p>Gacetillas de prensa</p>
              </div>
            </a>
          </li>

          <li>
            <a href="<?php echo site_url('admin/discos');?>">
              <i class="menu-icon fa fa-bullseye bg-red"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Discografia</h4>
                <p>Datos de sus discos</p>
              </div>
            </a>
          </li>


          <li>
            <a href="<?php echo site_url('admin/canciones');?>">
              <i class="menu-icon fa fa-music bg-green"></i>
              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Letras de canciones</h4>
                <p>Letras y videos de canciones </p>
              </div>
            </a>
          </li>

        </ul>

      </div>
      
      <br>
      <a class="btn btn-default btn-sm btn-block" href="<?php echo site_url('auth/logout');?>"><i class="fa fa-user"></i> Salir</a>
          
      </div>

    </div>

  </aside>
