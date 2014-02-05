<?php var_dump(count($novedadeslist));?>
<div class="content_site content_internas">
  <?php foreach($novedadeslist as $novedad): ?>
  <?php 
	$url_help = $lang."/".$novedad->id . "/" . $novedad->slug . ".html";
	$imgType = 3;
	$width = 250;
	$height = 150;
  ?>
	<div class="listado_novedad">
      <div class="novedad_listado_img">
		<?php if(!is_null($novedad->avatar)): ?>
            <img alt="<?php echo $novedad->name;?>" src="<?php echo thumbnail_image(base_url(), $novedad->avatar->getPath() , $width, $height, $imgType); ?>" />
            <?php else: ?>
            <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
        <?php endif; ?>
      </div><!-- novedad listado img -->
      <div class="novedad_listado_text">
        <h1><?php echo $novedad->name;?></h1>
        <p><?php echo word_limiter(html_purify(html_entity_decode($novedad->description)), 100); ?></p>
		
        <a href="/detalle_noticia.php" class="fancybox fancybox.iframe novedad_listado_a" target="blank">
		  <?php echo lang('novedad_leer_mas');?><img src="<?php echo base_url(); ?>assets/celsius/images/down.jpg">
		</a>
      </div><!-- novedad listado text -->
    </div><!--listado novedad -->
  <?php endforeach; ?>
</div>