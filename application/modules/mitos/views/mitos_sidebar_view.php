<!--
<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
    <?php //$this->load->view('adsense/adsense_mitos_view');    ?>
  </div>
</div>
</div>


<div class="row">
<div class="panel panel-default">
  <div class="panel-body">
	<div class="col-xs-12 col-sm-8">
		<?php //$this->load->view('indice_alfabetico_view');  ?>
	</div>

	<div class="col-xs-12 col-sm-4">
		<a class="btn btn-success btn-block" href="<?php //echo base_url();?>admin/mitos/add" role="button">Sugerir Mito o Leyenda</a>
	</div>
  </div>
</div>
</div>
-->

    <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Mitos por letra</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
          <?php $this->load->view('indice_alfabetico_view');  ?>
        </div><!-- /.box-body -->
      </div><!-- /.box 