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
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballos/1-1.png" alt="">
                            </li>
                            <li id="slide2">
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballos/2-1.png" alt="">
                            </li>
                            <li id="slide3">
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballos/3-1.png" alt="">
                            </li>
                            <li id="slide4">
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballos/4-1.png" alt="">
                            </li>
                            <li id="slide5">
                                <img src="<?php echo base_url(); ?>assets/feu/images/caballos/5-1.png" alt="">
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
                        <h2>Mobile and Tablet Optimized</h2>
                        <p class="large-font-size">The template is perfectly adapted to various screen sizes, and it works well on desktops, tablets, and mobile devices.</p>
                    </div>
                    <div id="caption2" data-bg-color="8c9560" data-bg-opacity="0.6">
                        <h2>Each Caption Can Be Styled Individually</h2>
                        <p class="large-font-size">YouTube, Vimeo, and HTML5 videos are supported throughout the template, so they can be used on any page!</p>
                    </div>
                    <div id="caption3" data-bg-color="000000" data-bg-opacity="0.4" data-width="500px">
                        <h2>Plenty of Elements and Widgets</h2>
                        <p class="large-font-size">Extremely wide range of elements and widgets you can easily use for creating your website content.</p>
                    </div>
                    <div id="caption4">
                        <h3>This can be an action block, or invitation to do something</h3>
                        <p class="middle-font-size">The Vestibulum Acenan is a lauctor ornare posuere in purus tincidunt facilisis magna, convallis dolor nulla to the arts in America.</p>
                        
                    </div>
				  <div id="caption5">
                        <h3>This can be an action block, or invitation to do something</h3>
                        <p class="middle-font-size">The Vestibulum Acenan is a lauctor ornare posuere in purus tincidunt facilisis magna, convallis dolor nulla to the arts in America.</p>
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

                        <!-- Video preview (HTML5 video is opened in lightbox) -->
                        <section class="preview-block video-type clearfix" data-smallscreen="yes">
                            <div class="thumbnail-colored">
                                <div class="video-preview" data-type="html5-video">
                                    <a href="#vp1" data-rel="prettyPhoto" title="Taste Lab – nice short comedy by Chris Burton">
                                        <img src="<?php echo base_url(); ?>assets/feu/images/templatedata/intro-preview.jpg" alt="">
                                        <div class="overlay"><span class="play-icon"></span></div>
                                    </a>
                                    <div id="vp1" class="html5-video">
                                        <video class="player" width="640" height="360" poster="<?php echo base_url(); ?>assets/feu/images/portfolio/video-poster.jpg" controls>
                                            <source src="http://e-merald.com/themes/_media/taste-lab-800x450.mp4" type="video/mp4">
                                            <source src="http://e-merald.com/themes/_media/taste-lab-1280x720.webm" type="video/webm">
                                            <source src="http://e-merald.com/themes/_media/taste-lab-960x540.ogv" type="video/ogg">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-info" data-smallscreen="no">
                                <h6 class="mb-7px">HTML5 Video in Lightbox</h6>
                                <a href="#vp1" data-rel="prettyPhoto" title="Taste Lab – nice short comedy by Chris Burton" class="link-sm">Play the video<span></span></a>
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
					  <div class="one-third columns">
                        <article>
                            <img src="<?php echo base_url(); ?>assets/feu/images/icons/big/icon-notebook.png" alt="">
                            <header><h3><?php echo $noticia->name;?></h3></header>
                            <p><?php echo character_limiter(html_purify(html_entity_decode($noticia->description)), 100); ?></p>
                            <a href="><?php echo $noticia->id;?>" class="button"><?php echo lang("noticia_leer mas"); ?></a>
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

                <div data-configid="0/6468347" style="width: 650px; height: 459px; margin-left: auto; margin-right: auto;" class="issuuembed"></div><script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

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
                    <ul id="projects-carousel" class="four-slides clearfix">
                         <?php 
					$imgType = 3;
					$width = 380;
					$height = 238;
					$count = count($banners);
					?>
					  <?php foreach($banners as $id => $banner): ?>
                        
                        <!-- Project -->
                        <li class="portfolio-item-preview">
                            <article>
                                <div class="item-picture" data-type="link">
                                    <?php if(!is_null($banner->avatar)): ?>
                                        <img alt="<?php echo $banner->name;?>" src="<?php echo thumbnail_image(base_url(), $banner->avatar->getPath() , $width, $height, $imgType); ?>" />
                                    <?php else: ?>
                                        <img src="<?php echo base_url();?>assets/images/noimage.png" width="<?php echo $width;?>px" height="<?php echo $height;?>px"/>
                                    <?php endif; ?>
                                    <div class="image-overlay">
                                        <a href="<?php echo $banner->name;?>" title="<?php echo $banner->name;?>"><span class="link"></span></a>
                                    </div>
                                </div>
                                <div class="item-description align-center">
                                    <a href="<?php echo $banner->name;?>"><h6 class="title colored-text-1"><?php echo $banner->name;?></h6></a>
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