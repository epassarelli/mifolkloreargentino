<?php //$this->load->view('login_form_view'); ?>
<?php $this->load->view('buscar_por_interprete_view');    ?>

<?php echo Modules::run( 'interpretes/ultimos', '10' ); ?>   

<?php $this->load->view('adsense/adsense_adaptable_view');    ?> 

<div class="seccion">Agenda Folklorica</div>
<?php echo modules::run('cartelera/getCalendario'); ?> 