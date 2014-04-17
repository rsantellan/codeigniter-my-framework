<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("galeria_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

	<div class="container"> <!-- 1080 pixels Container -->

		<div class="full-width columns">
			<p class="middle-font-size"><?php echo lang("galeria_sub_titulo"); ?></p>
			<hr class="divider-line colored mb-35px">
		</div>
		<div class="clear"></div>

		<!-- Portfolio Items -->
		<div id="portfolio-wrapper" class="small-col-space clearfix mb-5px">
		    <?php foreach($galerialist as $galeria):?>
			  <!-- 1/4 page width -->
			<div class="one-fourth columns portfolio-item-preview">
				<article>
					<?php 
						$url_help = $galeria->g_id . "/" . url_title($galeria->g_name, '-', TRUE) . ".html";
						$imgType = 3;
						$width = 380;
						$height = 238;
					?>
					<div class="item-picture" data-type="link" style='min-height: <?php echo $height;?>px !important;'>

						<?php if(count($galeria->contents) == 0): ?>
							<img src="<?php echo base_url();?>assets/feu/images/galeria-no-image.jpg" width="<?php echo $width;?>" height="<?php echo $height;?>" width="<?php echo $width;?>"/>
						<?php else: 
						  $content = reset($galeria->contents);
						  ?>
							<img alt="<?php echo $galeria->g_name;?>" src="<?php echo thumbnail_image(base_url(), $content->ac_path , $width, $height, $imgType); ?>" />
						<?php endif; ?>
						<div class="image-overlay">
							<a href="<?php echo site_url('galeria/' . $url_help);?>" title="<?php echo $galeria->g_name;?>"><span class="link"></span></a>
						</div>
					</div>
					<div class="item-description align-center">
						<a href="<?php echo site_url('galeria/' . $url_help);?>"><h6 class="title colored-text-1"><?php echo $galeria->g_name;?></h6></a>
<!--						<p class="small-font-size">photography</p>-->
					</div>
				</article>
			</div>
			<?php endforeach; ?>
			
		</div>
		<!-- end Portfolio Items -->

		<!-- Pagination -->
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
        ?>
        <div class="full-width columns">
            <hr class="divider-line mb-25px">
            <nav class="pagination clearfix">
                <?php if($page > 1): ?>
                    <a href="<?php echo site_url("galerias-".($page-1).".html");?>" class="prev" title="Pagina Anterior"><span></span></a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <?php if($i >= $page - $firstDelta && $i <= $page +$lastDelta): ?>
                        <?php if($i == $page): ?>
                            <span class="current"><?php echo $i;?></span>
                        <?php else: ?>
                            <a href="<?php echo site_url("galerias-".$i.".html");?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if($page < $pages): ?>		
                    <a href="<?php echo site_url("galerias-".($page+1).".html");?>" class="next" title="Pagina siguiente"><span></span></a>
                  <?php endif; ?>
                <span class="pages">Pagina <?php echo $page;?> de <?php echo $pages;?></span>
            </nav>
        </div>
        <?php endif; ?>
		<!-- Pagination -->
	</div>

</section>
<!-- end Page Content -->
