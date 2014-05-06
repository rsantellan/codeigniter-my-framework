<div class="content_site">
  <h1><?php echo lang('home_novedades_celsius');?></h1>
  <hr>
  <?php
  $firstNew = array_shift($news);
  $secondNew = array_shift($news);
  $startUrl = "new";
    if($lang !== 'en')
    {
        $startUrl = 'novedad';
    }
    $imgType = 3;
	$width = 55;
	$height = 70;
  ?>
  <div class="novedades_home novedades_home_img">
    <?php if($firstNew !== null): ?>
    <?php
    $url_help = $lang."/".$startUrl."/".$firstNew->id . "/" . $firstNew->slug . ".html";
    ?>
    <?php if(!is_null($firstNew->avatar)): ?>
      <img alt="<?php echo $firstNew->name;?>" src="<?php echo thumbnail_image(base_url(), $firstNew->avatar->getPath() , $width, $height, $imgType); ?>" />
      <h5><?php echo $firstNew->name;?></h5>
      <div class="clear"></div>
    <?php else: ?>
      <h5><?php echo $firstNew->name;?></h5>
    <?php endif; ?>
	<div class="text">
	  <p>
        <?php echo word_limiter_close_tags(html_purify(html_entity_decode(($firstNew->description))), 100); ?>
      </p>
	</div>
	<a href="<?php echo site_url($url_help);?>" class="fancybox fancybox.iframe ver_mas"><?php echo lang('home_leer_mas');?></a>
    <?php endif; ?>
  </div><!-- novedades home -->
  <div class="novedades_home novedades_home_center">
    <?php if($secondNew !== null): ?>
    <?php
    $url_help = $lang."/".$startUrl."/".$secondNew->id . "/" . $secondNew->slug . ".html";
    ?>
    <?php if(!is_null($secondNew->avatar)): ?>
      <img alt="<?php echo $secondNew->name;?>" src="<?php echo thumbnail_image(base_url(), $secondNew->avatar->getPath() , $width, $height, $imgType); ?>" />
      <h5><?php echo $secondNew->name;?></h5>
      <div class="clear"></div>
    <?php else: ?>
      <h5><?php echo $secondNew->name;?></h5>
    <?php endif; ?>
    
	<div class="text">
	  <p>
        <?php echo word_limiter_close_tags(html_purify(html_entity_decode(($secondNew->description))), 100); ?>
      </p>
	</div>
	 <a href="<?php echo site_url($url_help);?>" class="fancybox fancybox.iframe ver_mas"><?php echo lang('home_leer_mas');?></a>
     <?php endif; ?>
  </div><!-- novedades home -->
  <div class="novedades_home">
	<span class="info"><?php echo lang('home_novedad_conoce_mas');?></span>
	<h5><?php echo lang('home_novedad_titulo');?></h5>
	<div class="text">
      <p>
        <?php echo word_limiter_close_tags(html_purify(html_entity_decode((lang('home_novedad_texto')))), 100); ?>
      </p>
	</div>
	 <a href="#" class="ver_mas"><?php echo lang('home_leer_mas');?></a>
  </div><!-- novedades home -->        
</div><!-- content -->

<script type="text/javascript">
$(document).ready(function() {
	  var carousel = $("#carousel").featureCarousel({});
      $('.fancybox').fancybox();
      });
	  

</script>
