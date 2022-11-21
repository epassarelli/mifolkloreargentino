<!--   <a class="btn btn-success btn-block" href="<?php echo site_url('admin/mitos/index/add'); ?>" role="button">Sugerir Mito o Leyenda</a> -->

<div class="box box-warning">

  <div class="box-header with-border">
    <h3 class="box-title">Mitos por letra</h3>
  </div>

  <div class="box-body">
    <?php $this->load->view('indice_alfabetico_view');  ?>
  </div>

</div>