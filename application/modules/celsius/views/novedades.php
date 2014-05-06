<div class="content_site content_internas">
    <?php
    $startUrl = "new";
    if($lang !== 'en')
    {
        $startUrl = 'novedad';
    }
    ?>
  <?php foreach($novedadeslist as $novedad): ?>
  <?php 
    
	$url_help = $lang."/".$startUrl."/".$novedad->id . "/" . $novedad->slug . ".html";
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
        <p><?php echo word_limiter_close_tags(html_purify(html_entity_decode(($novedad->description))), 100); ?></p>
		
        <a href="<?php echo site_url($url_help);?>" class="fancybox fancybox.iframe novedad_listado_a" target="blank">
		  <?php echo lang('novedad_leer_mas');?><img src="<?php echo base_url(); ?>assets/celsius/images/down.jpg">
		</a>
      </div><!-- novedad listado text -->
    </div><!--listado novedad -->
  <?php endforeach; ?>
<?php if($pages > 1): ?>
  <?php
  $firstDelta = 5;
  $lastDelta = 5;
  if($page < $firstDelta)
  {
	  $lastDelta = $lastDelta + ($firstDelta - $page);
  }
  if($page > $pages - $lastDelta)
  {
	  $aux = $pages - $page;
	  if($aux == 0) $aux = $lastDelta;
	  $firstDelta = $firstDelta + $aux;
  }
  $url_base = $lang."/".(($lang =='es')?'novedades-' : 'news-')."%s.html";// "noticias-%s.html";
  ?>
  <div class="paginado">
	<?php for ($i = 1; $i <= $pages; $i++): ?>
		<?php if($i >= $page - $firstDelta && $i <= $page +$lastDelta): ?>
			<a href="<?php echo site_url(sprintf($url_base, $i));?>" title="Pagina <?php echo $i;?>" class="<?php echo ($i == $page)?'current': ''; ?>"><?php echo $i;?></a> 
			<?php if($i < $pages && $i < $page+$lastDelta):
			  echo '|';
			endif;
			?>
			
		<?php endif; ?>    
	<?php endfor; ?>
<!--	<a href="#" class="current">1</a> | <a href="#">2</a> | <a href="#">3</a> | <a href="#">4</a> | <a href="#">5</a>-->
  </div><!--paginado-->	
  
<?php endif;?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
