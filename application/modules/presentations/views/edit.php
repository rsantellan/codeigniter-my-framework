<div class="grid_16">
  <h2>Editar Presentacion del producto "<?php echo $productObject->name;?>"[<?php echo ($lang == 'es')? "Español" : "Ingles";?>]</h2>
  <?php echo form_error('name'); ?>
  <?php echo form_error('genericname'); ?>
  <?php echo form_error('activecomponent'); ?>
  <?php echo form_error('action'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Presentacion salvada</p>
  	
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
<h4>Paises</h4>
<div id="countries_container">
<?php 
foreach($object->getCountries() as $country):
  $this->load->view('countrycontainer', array(
      'countryId' => $country->country_id, 
      'countryName' => $countries[$country->country_id]->name,
      'type' => $types[$country->presencia],
      'presentationId' => $object->getId(),
      ));
endforeach;
?>
</div>
<div id="country_form_container" class="hidden">
  <form action="<?php echo site_url('presentations/addCountry'); ?>" id="country_form" onsubmit="return sendCountryForm(this)">
    <input type="hidden" name="presentationId" value="<?php echo $object->getId();?>" />
    <label for="country">País:</label>
    <select name="country" id="country">
      <?php foreach($countries as $country): ?>
        <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
      <?php endforeach; ?>
    </select>
    <div class="clear"></div>
    <label for="type">Tipo de presencia</label>
    <select name="type">
      <?php foreach($types as $key => $value): ?>
        <option value="<?php echo $key;?>"><?php echo $value;?></option>
      <?php endforeach; ?>
    </select>
    <div class="clear"></div>
    <input type="submit" value="Agregar" />
  </form>
</div>
<hr/>
<h4>Archivos</h4>

<?php echo modules::run('upload/view', array('id' => $object->getId(), 'classname'=> $object->getObjectClass()));?>

<hr/>
<?php endif; ?>
<hr/>
<a href="<?php echo site_url('presentations/index/'.$lang.'/'.$object->getProductId()); ?>"> Volver al listado </a>

<script type="text/javascript">
  function sendCountryForm(form)
  {
    $.ajax({
        url: $(form).attr('action'),
        data: $(form).serialize(),
        type: 'post',
        dataType: 'json',
        success: function(json)
        {
          if(json.response == 'OK')
          {
            $('#countries_container').append(json.html);
          }
        }, 
        complete: function()
        {

        }
      });
    return false;
  }
  
  function removeCountry(countryId, url)
  {
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(json)
        {
          $('#country_container_'+countryId).remove();
        }, 
        complete: function()
        {

        }
      });
    return false;
  }
  $(document).ready(function() {
        startFancyLinks()
    });
</script>