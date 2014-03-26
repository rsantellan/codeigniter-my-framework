<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("promotores_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

	<div class="container"> <!-- 1080 pixels Container -->

		<div class="full-width columns">
			<p class="middle-font-size"><?php echo lang("promotores_sub_titulo"); ?></p>
			<hr class="divider-line colored mb-35px">
		</div>
		<div class="clear"></div>

		<!-- Portfolio Items -->
		<div id="portfolio-wrapper" class="small-col-space clearfix mb-5px">
		    <?php foreach($listado as $object):?>
			  <!-- 1/4 page width -->
			<div class="one-fourth columns portfolio-item-preview">
				<article>
                  <?php 
                  $imgType = 3;
                  $width = 380;
                  $height = 238;
                  $widthFull = 900;
                  $heightFull = 600;
                  $imgTypeFull = 1;
                  ?>
					<div class="item-picture" data-type="<?php echo ($object->link !== '' && !empty($object->link))? 'link' : 'image';?>" style='min-height: <?php echo $height;?>px !important;'>
						<?php 
						//$url_help = $galeria->g_id . "/" . url_title($galeria->g_name, '-', TRUE) . ".html";

						$banner_url = NULL;
						$extra_link = '';
                        if($object->link !== '' && !empty($object->link))
                        {
                          $banner_url = prep_url($object->link);
                          $extra_link = 'target="_blank"';
                        }
						?>
						<?php if(!is_null($object->avatar)): ?>
							<img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" style='display: block; margin-left: auto; margin-right: auto;'/>
						<?php else: 
						  ?>
                            <img alt="<?php echo $object->name;?>" src="<?php echo base_url();?>assets/feu/images/galeria-no-image.jpg" height="<?php echo $height;?>" width="<?php echo $width;?>"/>
							
						<?php endif; ?>
                        <div class="image-overlay">
                        <?php if($banner_url !== NULL): ?>
                            <a href="<?php echo $banner_url?>" <?php echo $extra_link;?> title="<?php echo $object->name;?>"><span class="link"></span></a>
                        <?php else: ?>
                            <?php if(!is_null($object->avatar)): ?>
                            <a href="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $widthFull, $heightFull, $imgTypeFull); ?>" data-rel="prettyPhoto[gallery]" title="<?php echo $object->name;?>"><span class="zoom"></span></a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>    
					</div>
					<div class="item-description align-center">
						<a href="<?php echo $banner_url?>" <?php echo $extra_link;?>><h6 class="title colored-text-1"><?php echo $object->name;?></h6></a>
					</div>
				</article>
			</div>
			<?php endforeach; ?>
			
		</div>
		<!-- end Portfolio Items -->
	</div>

</section>
<!-- end Page Content -->
