<div class="carousel-container">
<?php
$startUrl = "new";
if($lang !== 'en')
{
    $startUrl = 'novedad';
}
$imgType = 3;
$width = 150;
$height = 150;
?>
	<div id="carousel">
      <?php foreach($sliderNews as $slideNew): ?>
      <?php 
          $url_help = $lang."/".$startUrl."/".$slideNew->id . "/" . $slideNew->slug . ".html";
        ?>
        <div class="carousel-feature">
          <a href="<?php echo site_url($url_help);?>" class="fancybox fancybox.iframe">
            <?php if(!is_null($slideNew->avatar)): ?>
            <img class="carousel-image" alt="<?php echo $slideNew->name;?>" src="<?php echo thumbnail_image(base_url(), $slideNew->avatar->getPath() , $width, $height, $imgType); ?>" />
            <?php else: ?>
            <img class="carousel-image" alt="<?php echo $slideNew->name;?>" src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
            <?php endif; ?>
          </a>
        </div>
      <?php endforeach; ?>
      <?php foreach($sliderLinks as $slideLink): ?>
      <div class="carousel-feature">
		<a href="<?php echo $slideLink->url;?>" target="_blank">
		  <?php if(!is_null($slideLink->avatar)): ?>
            <img class="carousel-image" alt="<?php echo $slideLink->name;?>" src="<?php echo thumbnail_image(base_url(), $slideLink->avatar->getPath() , $width, $height, $imgType); ?>" />
          <?php else: ?>
            <img class="carousel-image" alt="<?php echo $slideLink->name;?>" src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
          <?php endif; ?>
        </a>
	  </div>
      <?php endforeach; ?>
<!--	  <div class="carousel-feature">
		<a href="/detalle_noticia.php" class="fancybox fancybox.iframe">
		  <img class="carousel-image" alt="Image Caption" src="<?php echo base_url(); ?>assets/celsius/images/gastroenterologia.jpg">
		</a>
	  </div>
	  <div class="carousel-feature">
		<a href="#"><img class="carousel-image" alt="Image Caption" src="<?php echo base_url(); ?>assets/celsius/images/familia.jpg"></a>
	  </div>
	  <div class="carousel-feature">
		<a href="https://www.facebook.com/LaboratoriosCelsius?fref=ts" target="blank">
		  <img class="carousel-image" alt="Image Caption" src="<?php echo base_url(); ?>assets/celsius/images/foto_facebook.jpg"></a>
	  </div>
	  <div class="carousel-feature">
		<a href="#"><img class="carousel-image" alt="Image Caption" src="<?php echo base_url(); ?>assets/celsius/images/bebe.jpg"></a>
	  </div>    
	  <div class="carousel-feature">
		<a href="#"><img class="carousel-image" alt="Image Caption" src="<?php echo base_url(); ?>assets/celsius/images/linea-s-1.jpg"></a>
	  </div>            -->

	</div>

	<div id="carousel-left"><img src="<?php echo base_url(); ?>assets/celsius/images/arrow-left.png" /></div>
	<div id="carousel-right"><img src="<?php echo base_url(); ?>assets/celsius/images/arrow-right.png" /></div>
  </div>