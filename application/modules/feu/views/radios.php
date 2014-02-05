<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("radios_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

	<div class="container"> <!-- 1080 pixels Container -->

		<div class="full-width columns">
			<p class="middle-font-size"><?php echo lang("radios_sub_titulo"); ?></p>
			<hr class="divider-line colored mb-35px">
		</div>
		<div class="clear"></div>

		<!-- Portfolio Items -->
		<div id="portfolio-wrapper" class="small-col-space clearfix mb-5px">
		    <?php foreach($listado as $object):?>
			  <!-- 1/4 page width -->
			<div class="one-fourth columns portfolio-item-preview">
				<article>
					<div class="item-picture" data-type="link">
						<?php 
						//$url_help = $galeria->g_id . "/" . url_title($galeria->g_name, '-', TRUE) . ".html";
						$imgType = 3;
						$width = 380;
						$height = 238;
						?>
						<?php if(!is_null($object->avatar)): ?>
							<img alt="<?php echo $object->name;?>" src="<?php echo thumbnail_image(base_url(), $object->avatar->getPath() , $width, $height, $imgType); ?>" />
						<?php else: 
						  ?>
                            <img alt="<?php echo $object->name;?>" src="<?php echo base_url();?>assets/feu/images/galeria-no-image.jpg" height="<?php echo $height;?>" width="<?php echo $width;?>"/>
							
						<?php endif; ?>
						<div class="image-overlay">
							<a href="<?php echo prep_url($object->link);?>" title="<?php echo $object->name;?>"><span class="link"></span></a>
						</div>
					</div>
					<div class="item-description align-center">
						<a href="<?php echo prep_url($object->link);?>"><h6 class="title colored-text-1"><?php echo $object->name;?></h6></a>
<!--						<p class="small-font-size">photography</p>-->
					</div>
				</article>
			</div>
			<?php endforeach; ?>
			
		</div>
		<!-- end Portfolio Items -->
	</div>

</section>
<!-- end Page Content -->
