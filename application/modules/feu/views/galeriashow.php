<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <ul class="breadcrumb-nav clearfix">
                    <li><a href="<?php echo site_url(''); ?>" class="link-sm"><?php echo lang("menu_home"); ?><span></span></a></li>
                    <li><a href="<?php echo site_url('galerias.html'); ?>" class="link-sm"><?php echo lang("menu_galerias"); ?><span></span></a></li>
                    <li class="italic"><?php echo $object->getName();?></li>
                </ul>
                <h1><?php echo lang("galeria_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

	<div class="container"> <!-- 1080 pixels Container -->

		<div class="full-width columns">
            <p class="middle-font-size"><?php echo sprintf(lang("galeria_sub_titulo_objecto"), $object->getName()); ?></p>
			<hr class="divider-line colored mb-35px">
		</div>
		<div class="clear"></div>
<?php //var_dump($medialist);?>
		<!-- Gallery -->
        <div class="gallery-wrapper four-cols clearfix">
        <?php 
        $imgType = 3;
        $width = 340;
        $height = 340;
        $widthFull = 900;
        $heightFull = 600;
        $imgTypeFull = 1;
        ?>

         <?php foreach($medialist as $media): ?>
             <!-- 1/4 page width -->
            <div class="one-fourth columns gallery-item">
                <div class="item-picture" data-type="image">
                    <img alt="<?php echo $media->ac_name;?>" src="<?php echo thumbnail_image(base_url(), $media->ac_path , $width, $height, $imgType); ?>" />
                    <div class="image-overlay">
                        <?php if($media->ac_type == "youtube"): ?>
                            <a href="<?php echo $media->ac_url."?width=".$widthFull."&amp;height=".$heightFull; ?>" data-rel="prettyPhoto[gallery]" title="<?php echo $media->ac_name;?>"><span class="video"></span></a>
                        <?php else: ?>
                            <a href="<?php echo thumbnail_image(base_url(), $media->ac_path , $widthFull, $heightFull, $imgTypeFull); ?>" data-rel="prettyPhoto[gallery]" title="<?php echo $media->ac_name;?>"><span class="zoom"></span></a>
                        <?php endif; ?>
                    </div>
                    <span class="item-label"><?php echo $media->ac_name;?></span>
                </div>
            </div>
         <?php endforeach; ?>
        </div>
        <!-- end Gallery -->

	</div>

</section>
<!-- end Page Content -->