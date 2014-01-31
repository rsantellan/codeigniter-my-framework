<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->

            <div class="full-width columns">

                <ul class="breadcrumb-nav clearfix">
                    <li><a href="<?php echo site_url(''); ?>" class="italic"><?php echo lang("menu_home"); ?><span></span></a></li>
                    
                </ul>
                <h1><?php echo lang("error_titulo"); ?></h1>

            </div>

        </div>
    </div>

</section>
<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="one-half columns">

            <h3><?php echo lang("error_sub_titulo"); ?></h3>
            <p><?php echo sprintf(lang('error_texto'), current_url());?></p>
            <ul>
                <li>— <a href="<?php echo site_url(''); ?>" class="italic"><?php echo lang("menu_home"); ?></a></li>
                <li>— <a href="<?php echo site_url('contacto.html'); ?>" class="italic"><?php echo lang("menu_contacto"); ?></a></li>
                <li>— <a href="<?php echo site_url('noticias.html'); ?>" class="italic"><?php echo lang("menu_noticias"); ?></a></li>
                <li>— <a href="<?php echo site_url('galerias.html'); ?>" class="italic"><?php echo lang("menu_galerias"); ?></a></li>
            </ul>

        </div>

        <div class="one-half columns">
            <div class="error-404">404</div>
        </div>

    </div> <!-- end 1080 pixels Container -->

</section>
<!-- end Page Content -->