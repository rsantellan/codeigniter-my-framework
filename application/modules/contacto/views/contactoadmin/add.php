<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Agregar Contacto</h1>
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
          //$this->load->view('form');
          $this->load->view('contacto/contactoadmin/form');
        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <a class="btn btn-info" href="<?php echo site_url('contacto/contactoadmin/index'); ?>"> Volver al indice </a>
  </div>
</div>
