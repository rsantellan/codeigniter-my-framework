<div id="country_container_<?php echo $countryId;?>">
  <label>País: <span style="font-weight: lighter !important;"><?php echo $countryName;?></span></label>
  <label>Tipo de presencia: <span style="font-weight: lighter !important;"><?php echo $type;?></span></label>
  <a href="javascript:void" onclick="return removeCountry(<?php echo $countryId;?>, '<?php echo site_url('exteriorproducts/removeCountry/'.$countryId.'/'.$productId); ?>');">Sacar país</a>
  <hr/>
</div>