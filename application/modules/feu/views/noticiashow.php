<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <ul class="breadcrumb-nav clearfix">
                    <li><a href="<?php echo site_url(''); ?>" class="link-sm"><?php echo lang("menu_home"); ?><span></span></a></li>
                    <li><a href="<?php echo site_url('noticias.html'); ?>" class="link-sm"><?php echo lang("menu_noticias"); ?><span></span></a></li>
                    <li class="italic"><?php echo $object->getName();?></li>
                </ul>
                <h1><?php echo lang('noticia_titulo');?></h1>

            </div>

        </div>
    </div>

</section>
<!-- Page Content -->
<section id="page-content" class="sidebar-layout">

    <div class="container"> <!-- 1080 pixels Container -->

        <!-- Content with right-aligned Sidebar -->
        <div class="columns-wrapper sb-right">

            <!-- Page Left Column -->
            <section id="main-content" class="three-fourths columns page-left-col"> <!-- inner grid 780 pixels wide -->

                <div class="full-width columns">

                    <!-- Single Blog Post -->
                    <section class="blog">

                        <!-- Post: Image format -->
                        <article class="single-post">
                            <?php
                            $imgType = 1;
                            $width = 700;
                            $height = 300;
                            //var_dump($medialist);
                            if(count($medialist) > 0): 
                                $content = reset($medialist);
                            //var_dump($content);
                                if($content->ac_contenttype != 'content-document'):
                            ?>
                                <div class="post-media item-picture">
                                    <img alt="<?php echo $object->getName();?>" src="<?php echo thumbnail_image(base_url(), $content->ac_path , $width, $height, $imgType); ?>" />
                                </div>
                            <?php 
                                endif;
                            endif; 
                            ?>
                            <div class="post-date">
                                <span class="day"><?php echo date("j",strtotime($object->getUpdatedAt()));?></span>
                                <span class="month">
                                    <?php 
                                    //$aux = setlocale(LC_TIME,"es_UY.utf8");
                                    //var_dump($aux);
                                    setlocale(LC_TIME,"es_UY.utf8");
                                    echo strtoupper(strftime('%b',date("U",strtotime($object->getUpdatedAt()))));
                                    ?>
                                </span>
                                <span class="year"><?php echo date("Y",strtotime($object->getUpdatedAt()));?></span>
                            </div>
                            <div class="post-content">
                                <h3 class="title"><?php echo $object->getName();?></h3>
                                

                                <!-- Post content -->
                                <?php echo html_purify(html_entity_decode($object->getDescription())); ?>
                                <?php 
                                $widthGallery = 200;
                                $heightGallery = 150;
                                $imgTypeGallery = 1;
                                $documents = array();
                                foreach($medialist as $media): 
                                    $usedType = $imgTypeGallery;
                                    if($media->ac_contenttype == 'content-document'):
                                        $documents[] = $media;
                                    else:
                                ?>
                                    <img class="scale-with-grid image-left adapted-max-959px" alt="<?php echo $media->ac_name;?>" src="<?php echo thumbnail_image(base_url(), $media->ac_path , $widthGallery, $heightGallery, $usedType); ?>" />
                                    
                                <?php
                                    endif;
                                endforeach; ?>
                                <div class="clear"></div>
                                <?php //var_dump($medialist);?>
                                    <?php if(count($documents) > 0) : ?>
                                        <ul class="arrow-list colored">
                                        <?php foreach($documents as $document): ?>
                                            <li><a class="fa fa-download" href="<?php echo site_url("noticia-descarga/".$document->ac_id.".html");?>"><?php echo $document->ac_name;?></a></li>
                                        <?php endforeach; ?> 
                                        </ul>
                                    <?php endif;  ?>
                                   
                                <!-- end Post content -->
                                
                            </div>
                            <div class="clear mb-25px"></div>

                            <!-- Social share -->
                            <ul class="social-share clearfix mb-15px">
                                <li class="google">
                                    <div class="g-plusone" data-size="medium"></div>
                                    <script type="text/javascript">
                                        (function() {
                                            if (document.querySelector('html').className.split(' ')[1] != 'ie8') {
                                                var po = document.createElement('script');
                                                po.type = 'text/javascript';
                                                po.async = true;
                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                            }
                                        })();
                                    </script>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </li>
                                <li class="facebook">
                                    <div id="fb-root"></div>
                                    <script>
                                        (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                    <div class="fb-like" data-href="<?php echo current_url() ?>" data-width="125" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                                </li>
                                <li class="pinterest">
                                    <a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt=""></a>
                                    <script type="text/javascript">
                                        (function (w, d, load) {
                                            var script, first = d.getElementsByTagName('SCRIPT')[0], n = load.length, i = 0, go = function () {
                                                for (i = 0; i < n; i = i + 1) {
                                                    script = d.createElement('SCRIPT');script.type = 'text/javascript';script.async = true; script.src = load[i];first.parentNode.insertBefore(script, first);
                                                }
                                            }
                                            if (w.attachEvent) { w.attachEvent('onload', go); } else { w.addEventListener('load', go, false); }
                                        }(window, document, ['//assets.pinterest.com/js/pinit.js']));
                                    </script>
                                </li>
                            </ul>

                        </article>
                        <!-- end Post -->

                        <hr class="divider-line colored mb-35px">
                    </section>
                    <!-- end Single Blog Post -->

                </div> <!-- end full-width columns -->

            </section>
            <!-- end Page Left Column -->

            <!-- Sidebar (right aligned) -->
            <aside id="sidebar" class="one-fourth columns page-right-col">

               


            </aside>
            <!-- end Sidebar -->

        </div> <!-- end columns-wrapper sb-right -->

    </div>

</section>
<!-- end Page Content -->