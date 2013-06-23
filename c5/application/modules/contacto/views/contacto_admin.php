<?php
foreach($content_rows as $key => $value):
?>
<h5><?php echo $key; ?></h5>

<?php 
  foreach($value as $row):
    echo $row;
  endforeach;


endforeach;
  

?>
