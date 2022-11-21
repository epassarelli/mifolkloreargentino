<?php $this->load->view('head_view'); ?>

<body class="hold-transition skin-yellow layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">

          <?php $this->load->view('menu_principal_view'); ?>

          <?php $this->load->view('aside_publicar_view'); ?>

        </div>

      </nav>
    </header>

    <!-- Full Width Column -->
    <div class="content-wrapper">
      <?php
      if (isset($output)) {
        $class = 'container-fluid';
      } else {
        $class = 'container';
      }
      ?>
      <div class="<?php echo $class; ?>">

        <section class="content-header">

          <p>.</p>

          <?php if (isset($breadcrumb)) : ?>
            <ol class="breadcrumb hidden-xs">
              <?php
              foreach ($breadcrumb as $key => $value) {
                echo "<li><a href='$value''>$key</a></li>";
              };
              ?>
            </ol>
          <?php endif; ?>

        </section>

        <section class="content">

          <div class="box box-default">

            <div class="box-header with-border">
              <h1 class="box-title">
                <?php
                if (isset($title)) {
                  echo $title;
                };
                ?>
              </h1>
            </div>

            <div class="box-body">
              <?php
              if (isset($output)) {
                echo $output;
              } else {
                $this->load->view($view);
              }
              ?>
            </div>

          </div>

        </section>

      </div>

    </div>


    <?php $this->load->view('footer_view'); ?>

</body>



</html>