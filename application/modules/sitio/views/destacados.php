<?php 
  $counter = 1;
  $width = 300;
  $height = 75;
  ?>
<?php foreach($proyectos as $proyecto): ?>
<?php $url_help = $proyecto->id."/".url_title($proyecto->nombre, '-', TRUE).".html";?>
<div class="bloque <?php echo ($counter % 2 == 0)? "bloque_center" : ""; ?>">
    <?php if(!is_null($proyecto->avatar)): ?>
      <img alt="<?php echo $proyecto->nombre;?>" src="<?php echo base_url().thumbnail_image($proyecto->avatar->getPath() , $width, $height, 3); ?>" class="img_destacado" />
    <?php else: ?>
      <img src="/assets/images/destacado1.jpg" class="img_destacado" />
    <?php endif; ?>
    <h3><?php echo $proyecto->nombre;?></h3>
    <a href="<?php echo site_url('proyecto/'.$url_help); ?>" class="destacado"><?php echo lang('destacados_ver_mas');?></a>
</div><!--BLOQUE-->
<?php 
  $counter ++;
  if($counter > 3) $counter = 1;
?>
<?php endforeach; ?>