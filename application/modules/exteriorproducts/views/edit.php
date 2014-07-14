<div class="grid_16">
  <h2>Editar Producto exterior</h2>
    <?php echo form_error('name'); ?>
	<?php echo form_error('genericname'); ?>
	<?php echo form_error('presentation'); ?>
	<?php echo form_error('country_id'); ?>
	<?php echo form_error('category_id'); ?>
	<?php echo form_error('presencetype'); ?>
	<?php echo form_error('compuesto'); ?>
  <?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
  	<p id="salvado_ok" class="success">Producto exterior salvado</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <?php endif; ?>
</div>
<?php
  $this->load->view('form');
?>

<hr/>


<h3>Paises:</h3>
<div id="countries_container">
<?php 
foreach($object->getCountries() as $country):
  $this->load->view('countrycontainer', array(
      'countryId' => $country->country_id, 
      'countryName' => $countries_list[$country->country_id]->name,
      'type' => $presence_types[$country->presencetype],
      'productId' => $object->getId(),
      ));
endforeach;
?>
</div>
<div id="country_form_container" class="hidden">
  <form action="<?php echo site_url('exteriorproducts/addCountry'); ?>" id="country_form" onsubmit="return sendCountryForm(this)">
    <input type="hidden" name="productId" value="<?php echo $object->getId();?>" />
    <label for="country">País:</label>
    
    <select name="country" id="country">
      <?php foreach($countries_list as $country): ?>
        <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
      <?php endforeach; ?>
    </select>
    <div class="clear"></div>
    <label for="presencetype">Tipo de presencia <small>Requerido</small></label>
	<select name="presencetype" id="presencetype">
      <?php foreach($presence_types as $key => $value): ?>
        <option value="<?php echo $key;?>" <?php echo ($object->getPresencetype() == $key)? "selected='selected'" : "";?>><?php echo $value;?></option>
      <?php endforeach; ?>
    </select>
    <div class="clear"></div>
    <input type="submit" value="Agregar" />
  </form>
</div>
<hr/>
<a href="<?php echo site_url('exteriorproducts/index'); ?>"> Volver al listado </a>

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
        startFancyLinks();
    });
</script>