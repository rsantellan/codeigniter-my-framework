<div class="content_site content_internas_seccion_iniciada">
  <?php echo $this->load->view('navegacionprivada') ?>
  <h3><?php echo $object->getName();?></h3>
  <ul class="content">
    <?php 
            $imgType = 1;
            $width = 165;
            $height = 110;
            $widthGaleria = 600;
            $heightGaleria = 400;
            $urlBig = "";
			//var_dump($media);
    ?>
    <?php foreach($media as $object): ?>
      <?php 
		$urlBig = thumbnail_image(base_url(), $object->ac_path , $widthGaleria, $heightGaleria, $imgType);
      ?>
    
    <li>
       <a class="fancybox" href="<?php echo $urlBig;?>" data-fancybox-group="gallery" title="<?php echo $object->ac_description;?>">
        <div class="card-back">
          <p><?php echo $object->ac_description;?></p>
        </div>
        <!-- Content -->
        <div class="all-content">
		  <img alt="<?php echo $object->ac_name;?>" src="<?php echo thumbnail_image(base_url(), $object->ac_path , $width, $height, $imgType); ?>" />
        </div>
      </a>
    </li>
      
    <?php endforeach; ?>
  </ul>
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
