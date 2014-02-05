<div class="grid_16">
  <h2>Agregar Noticia[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('description'); ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>

<a href="<?php echo site_url('news/index/'.$lang); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        adminManager.getInstance().startBasicTextAreasTinyMCE();
    });
</script>