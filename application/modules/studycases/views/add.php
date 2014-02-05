<div class="grid_16">
  <h2>Agregar Caso de estudio[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('description'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('studycases/index/'.$lang); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        adminManager.getInstance().startBasicTextAreasTinyMCE();
        $('#studyDate').datepicker();
    });
</script>