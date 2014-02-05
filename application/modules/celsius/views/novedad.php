<?php 
	$imgType = 2;
	$width = 350;
	$height = 345;
?>
<h1><?php echo $object->name;?></h1>
<?php if(!is_null($object->avatar)): ?>
    <img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" />
    <?php else: ?>
    <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
<?php endif; ?>
<p>
<?php echo html_purify(html_entity_decode(($object->description)));?>
</p>