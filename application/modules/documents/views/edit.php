<div class="grid_16">
  <h2>Editar <?php echo ($object->getTipo() == "doc") ? "Documento" : "Formulario";?></h2>
  <?php echo form_error('name'); ?>
  
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success"><?php echo ($object->getTipo() == "doc") ? "Documento" : "Formulario";?> salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
</div>
<?php if(!is_null($object)): ?>
<?php
  $this->load->view('form');
?>

<hr/>

<h4>Archivos</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>
<?php endif; ?>
<hr/>
<?php
 $list_url = "documents/";
 if($object->getTipo() == "doc"){
     $list_url .= "index";
 }else{
     $list_url .= "formularios";
 }
?>
<a href="<?php echo site_url($list_url); ?>"> Volver al listado </a>

<script type="text/javascript">
    $(document).ready(function() {
        startFancyLinks()
    });
</script>