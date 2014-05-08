<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Editar Facilidad</h1>
    <?php if($this->session->flashdata('salvado') == "ok"): ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Facilidad salvada
    </div>
    <?php endif;?>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-10">
        <?php
          $this->load->view('form');
        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <a class="btn btn-info" href="<?php echo site_url('efsalaboratorios/index'); ?>"> Volver al indice </a>
  </div>
</div>