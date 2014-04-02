<div class="grid_16">
  <h2>Agregar Club</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('link'); ?>
  <?php echo form_error('description'); ?>
  <?php echo form_error('location'); ?>
  <?php echo form_error('departmentid'); ?>
  <?php echo form_error('latitud'); ?>
  <?php echo form_error('longitud'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('clubes/index'); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        adminManager.getInstance().startBasicTextAreasTinyMCE();
    });
</script>