<!-- Homepage Header -->
<header id="home-header">

    <!-- Hero Content -->
    <section id="home-hero-content">

        <div class="container" id="home-hero"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <div class="hero-image">
                    <section id="home-slider" class="flexslider right-side-nav" data-slideshow-speed="8000">
                        <ul class="slides">
                            <li id="slide1">
                                <img src="<?php echo base_url(); ?>assets/feu/images/kilometro.png" alt="">
                            </li>
                            <li id="slide2">
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballo.png" alt="">
                            </li>
                            <li id="slide3">
                                <img src="<?php echo base_url(); ?>assets/feu/images/llegada.png" alt="">
                            </li>
                            <li id="slide4">
                                <img src="<?php echo base_url(); ?>assets/feu/images/premio.png" alt="">
                            </li>
                            <li id="slide5">
                                <img src="<?php echo base_url(); ?>assets/feu/images/carrera.png" alt="">
                            </li>
                            
                        </ul>
                    </section>
                </div>

            </div>

        </div> <!-- end 1080 pixels Container -->

        <div class="grid-gradient-bg"></div>

    </section>

    <!-- Slider Caption -->
    <section id="home-hero-nav">

        <div class="container"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <div class="slider-caption" data-smallscreen="yes">
                    <div id="caption1">
                        <h2><?php echo lang('home_box_titulo1');?></h2>
                        <p class="large-font-size"><?php echo lang('home_box_description1');?></p>
                    </div>
                    <div id="caption2" data-bg-color="8c9560" data-bg-opacity="0.6">
                        <h2><?php echo lang('home_box_titulo2');?></h2>
                        <p class="large-font-size"><?php echo lang('home_box_description2');?></p>
                    </div>
                    <div id="caption3" data-bg-color="000000" data-bg-opacity="0.4" data-width="500px">
                        <h2><?php echo lang('home_box_titulo3');?></h2>
                        <p class="large-font-size"><?php echo lang('home_box_description3');?></p>
                    </div>
                    <div id="caption4">
                        <h2><?php echo lang('home_box_titulo4');?></h2>
                        <p class="large-font-size"><?php echo lang('home_box_description4');?></p>
                    </div>
				  <div id="caption5">
                        <h2><?php echo lang('home_box_titulo5');?></h2>
                        <p class="large-font-size"><?php echo lang('home_box_description5');?></p>
                    </div>
                </div>

            </div>

        </div> <!-- end 1080 pixels Container -->

    </section>

    <!-- Intro -->
    <section id="home-intro">

        <div class="container"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <div class="intro-wrapper">
                    <div class="intro-content clearfix">
                        <h1 class="mb-15px"><?php echo lang("home_titulo"); ?></h1>

                        <!-- Preamble -->
                        <section class="preamble">
                            <p class="middle-font-size mb-20px"><?php echo lang("home_titulo_mensaje"); ?></p>
                            <hr class="divider-pattern streaks offset-right-10px mb-30px">
                        </section>

						<!-- Preview (image type) -->
						<section class="preview-block image-type clearfix">
							<span class="thumbnail-colored">
							  <a href="<?php echo site_url('radios.html');?>"><img src="<?php echo base_url();?>assets/feu/images/radio.png" alt=""></a>
							</span>
							<div class="preview-info" data-smallscreen="yes">
								<h6 class="mb-7px"><?php echo lang("home_radios_titulo"); ?></h6>
								<a href="<?php echo site_url('radios.html');?>" class="link-sm colored-text-2"><?php echo lang("home_radios_descripcion"); ?><span></span></a>
							</div>
						</section>
                    </div>
                </div>

            </div>
        </div> <!-- end 1080 pixels Container -->
    </section>
</header>
<!-- end Homepage Header -->

<!-- Featured Content -->
<section id="home-featured-content">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->

            <!-- Feature Boxes with left icon -->
            <section class="feature-boxes medium-col-space left-icon-box mb-20px">

                <div class="row">
					<?php foreach($noticias as $noticia): ?>
					  <?php $url_help = $noticia->id . "/" . url_title($noticia->name, '-', TRUE) . ".html";?>
                    <div class="one-third columns">
                    <article>
                        <img src="<?php echo base_url(); ?>assets/feu/images/icons/big/icon-notebook.png" alt="">
                        <header><h3><?php echo character_limiter(html_purify($noticia->name), 30); ?></h3></header>
                        <p><?php echo character_limiter(html_purify(html_entity_decode(strip_tags($noticia->description))), 100); ?></p>
                        <a href="<?php echo site_url('noticia/' . $url_help);?>" class="button"><?php echo lang("noticia_leer mas"); ?></a>
                    </article>
                    </div>
					<?php endforeach; ?>
                   

                </div>

            </section>
            <!-- end Feature Boxes -->

        </div> <!-- end 1080 pixels Container -->
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <section class="blog-grid-style one-line clearfix mb-10px">
			
            <div class="row">
				<div data-configid="0/7139572" style="width: 650px; height: 459px; margin-left: auto; margin-right: auto;" class="issuuembed"></div>
				<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

            </div>

        </section>
        <div class="full-width columns">
            <hr class="divider-line colored mb-40px">
        </div>
        
        <div class="full-width columns">
						
            <hr class="divider-line dotted colored mb-40px">

            <h5 class="underlined dashed grey"><?php echo lang("home_titulo_promotores"); ?></h5>

            <!-- Projects Carousel -->
            <section id="projects-holder" class="carousel-container mb-50px">
                <div class="carousel-frame">

                    <!-- possible values: three-slides / four-slides -->
                    <ul id="projects-carousel" class="four-slides clearfix" data-autoplay="3000" data-circular="yes">
                         <?php 
					$imgType = 1;
					$width = 380;
					$height = 238;
					$count = count($banners);
					?>
					  <?php foreach($banners as $id => $banner): ?>
                        <?php 
                        $banner_url = site_url('promotores.html');
                        $extra_link = '';
                        if($banner->link !== '' && !empty($banner->link))
                        {
                          $banner_url = prep_url($banner->link);
                          $extra_link = 'target="_blank"';
                        }
                        ?>
                        <!-- Project -->
                        <li class="portfolio-item-preview">
                            <article>
                                <div class="item-picture" data-type="link" style='min-height: <?php echo $height;?>px !important;'>
                                    <?php if(!is_null($banner->avatar)): ?>
                                        <img alt="<?php echo $banner->name;?>" src="<?php echo thumbnail_image(base_url(), $banner->avatar->getPath() , $width, $height, $imgType); ?>" style='display: block; margin-left: auto; margin-right: auto;' />
                                    <?php else: ?>
                                        <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>px" height="<?php echo $height;?>px"/>
                                    <?php endif; ?>
                                    <div class="image-overlay">
                                        <a href="<?php echo $banner_url?>" <?php echo $extra_link;?> title="<?php echo $banner->name;?>"><span class="link"></span></a>
                                    </div>
                                </div>
                                <div class="item-description align-center">
                                    <a href="<?php echo $banner_url?>" <?php echo $extra_link;?>><h6 class="title colored-text-1"><?php echo $banner->name;?></h6></a>
                                </div>
                            </article>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </section>
            <!-- end Projects Carousel -->

        </div>
    </div> <!-- end 1080 pixels Container -->

</section>
<!-- end Page Content -->
