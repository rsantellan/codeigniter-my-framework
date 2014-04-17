<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Agregar Noticia</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-10">
        <?php //echo form_error('nombre'); ?>
        <?php //echo form_error('descripcion'); ?>
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
    <a class="btn btn-info" href="<?php echo site_url('novedades/index'); ?>"> Volver al indice </a>
  </div>
</div>




