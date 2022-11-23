    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <a href="<?php echo site_url('contacto'); ?>">Contactarnos</a>
        </div>
        <strong>Copyright &copy; 2009-<?php echo date('Y', time()); ?> - <a href="http://webpass.com.ar" target="_blank">Dise&ntilde;o y Desarrollo Web</a>.</strong> Todos los derechos reservados.
        <!-- /.container -->
    </footer>
    </div>
    <!-- ./wrapper -->

    <?php if (!isset($output)) : ?>
        <link rel="stylesheet" href="<?php echo site_url() . 'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <?php endif; ?>

    <!-- <link rel="stylesheet" href="<?php //echo site_url() . 'assets/templates/adminlte242/'; 
                                        ?>bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/templates/adminlte242/dist/css/skins/skin-yellow.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo site_url() . 'assets/templates/adminlte242/';   ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="<?php //echo site_url('assets/css/mfa.css'); 
                                        ?>"> -->

    <?php if (isset($css_files)) : ?>
        <?php foreach ($css_files as $file) : ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>">
        <?php endforeach; ?>
    <?php endif; ?>


    <?php if (!isset($output)) : ?>
        <script src="<?php echo site_url() . 'assets/templates/adminlte242/'; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <?php endif; ?>

    <input type="hidden" id="url" value="<?php echo site_url(); ?>">

    <?php if (isset($js_files)) : ?>
        <?php foreach ($js_files as $file) : ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <script async src="<?php echo site_url() . 'assets/templates/adminlte242/'; ?>dist/js/adminlte.min.js"></script>
    <script src="<?php echo site_url() . 'assets/templates/adminlte242/'; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            let urlBase = $('#url').val();

            // bind change event to select
            $('#interprete').bind('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });

            // bind change event to select
            $('#provincia-fiesta').bind('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });

            // bind change event to select
            $('#mes-fiesta').bind('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });


            ///////////////////////////// SCRIPT ////////////////////////////////

            $('#EnviarP').click(function(e) {
                e.preventDefault();
                //tomamos el valor del boton para saber cual estado enviar el .object va asociado al data, si el atributo de html es data-pirulo la cosntante del objeto finaliza con .pirulo: e.target.dataset.pirulo
                const Objeto = e.target.dataset.object;
                //alert(Objeto);
                enviarobjeto(Objeto)
            });

            function enviarobjeto(Objeto) {
                $.ajax({
                    url: 'http://localhost/mifolkloreargentino/admin/sugerir',
                    method: "POST",
                    //Metodo para tomar datos sin archivos
                    data: {
                        Objeto: Objeto
                    },
                    //respuesta del envio
                    dataType: "json",
                    success: function(response) {
                        //Aqui dependiedo de lo que quieras hacer condicionas ó si no haras ninguna accion coloca un return para que salga de la funcion
                        alert(Objeto);
                    } // success
                }); //Ajax
            }

            // Carga de nueva letra
            $("#send").click(function() {
                letra = $("#letra").val();
                cancion_id = '<?php if (isset($cancion->canc_id)) {
                                    echo $cancion->canc_id;
                                } else {
                                    echo "1";
                                }; ?>';
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('canciones/sugerirLetra'); ?>",
                    data: {
                        letra: letra,
                        cancion_id: cancion_id
                    },
                    dataType: "text",
                    cache: false,
                    success: function(devuelto) {
                        flag = parseInt(devuelto);
                        if (flag == 1) {
                            $('#error').empty();
                            $('#mensaje').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Felicitaciones!</h4>Se sugerido exitosamente la letra de dicha canción.</div>');
                        } else {
                            alert('La letra sugerida no tiene la suficiente cantidad de caracteres');
                            $('#error').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Atención!</h4>La letra sugerida no tiene la suficiente cantidad de caracteres necesarios.</div>');
                        }
                    }
                });
                return false;
            });


        });
    </script>

    <?php if (!$this->ion_auth->is_admin()) : ?>
        <script>
            $(document).ready(function() {
                $("#user_id_field_box").hide();
                $("#inte_alias_field_box").hide();
                $("#albu_alias_field_box").hide();
                $("#canc_alias_field_box").hide();
                $("#fies_alias_field_box").hide();
            });
        </script>
    <?php endif;   ?>

    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->