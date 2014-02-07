<div class="content_site content_internas_seccion_iniciada">
  <?php echo $this->load->view('navinterna'); ?>
  <?php
    $startUrl = "events";
    if($lang !== 'en')
    {
        $startUrl = 'eventos';
    }
    $url_help = $lang."/".$startUrl."/%s.html";
    ?>
  <ul class="content">
    <?php 
            $imgType = 3;
            $width = 165;
            $height = 110;
            $widthGaleria = 600;
            $heightGaleria = 400;
            $urlBig = "";
    ?>
    <?php foreach($objectlist as $object): ?>
      <?php 
        if(!is_null($object->avatar))
        {
          $urlBig = thumbnail_image(base_url(), $object->avatar->getPath() , $widthGaleria, $heightGaleria, $imgType);
        }
        else
        {
          $urlBig = base_url()."assets/images/noimage.png";
        }
      ?>
    
    <li>
      <a class="fancybox" href="<?php echo $urlBig;?>" data-fancybox-group="gallery" title="<?php echo $object->description;?>">
        <div class="card-back">
          <h2><?php echo $object->description;?></h2>
          <p><?php echo $object->name;?></br><?php echo $object->members;?></p>
        </div>
        <!-- Content -->
        <div class="all-content">
          <?php if(!is_null($object->avatar)): ?>
            <img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" />
          <?php else: ?>
            <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>" height="<?php echo $height;?>"/>    
          <?php endif; ?>
        </div>
      </a>
    </li>
      
    <?php endforeach; ?>
  </ul>
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
    $url_base = $lang."/".(($lang =='es')?'eventos-' : 'events-')."%s.html";// "noticias-%s.html";
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
			/*
			 *  Simple image gallery. Uses default settings
			 */
			$('.fancybox').fancybox();
			/*
			 *  Different effects
			 */
		});
</script>