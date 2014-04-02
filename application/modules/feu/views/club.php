<!-- Page Title -->
<section id="page-title">
    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo $object->getName();?></h1>
            </div>
        </div>
    </div>
</section>
<!-- Page Content -->
<section id="page-content" class="sidebar-layout">

    <div class="container"> <!-- 1080 pixels Container -->

        <!-- Content with left-aligned Sidebar -->
        <div class="columns-wrapper sb-left">

            <!-- Sidebar (left aligned) -->
            <aside id="sidebar" class="one-fourth columns page-left-col">

                <!-- Contact Information -->
                <div class="widget-bigger" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
                    <ul class="side-menu middle-font-size">
                      <?php foreach($listado as $mClub): ?>
                        <li class="<?php echo ($object->getId() == $mClub->id)? 'current' : '';?>"><a href="<?php echo site_url(sprintf('club/%s/%s.html', $mClub->id, url_title($mClub->name, '-', TRUE)));?>"><?php echo $mClub->name;?></a></li>
                      <?php endforeach; ?>
                    </ul>
                </div>
            </aside>
            <!-- end Sidebar -->
            <!-- Page Right Column -->
            <section id="main-content" class="three-fourths columns page-right-col adaptive-map"> <!-- inner grid 840 pixels wide -->
                <div class="full-width columns">
					<div class="contact-form-wrapper" style="margin-bottom: 700px !important;">

                        <h4><?php echo lang('club_imagenes');?></h4>
                        <?php //var_dump($medialist); ?>
                        <?php 
                        $imgType = 2;
                        $width = 700;
                        $height = 700;
                        $widthGallery = 340;
                        $heightGallery = 340;
                        $imgTypeGallery = 1;
                        foreach($medialist as $media): ?>
                        <!-- 1/4 page width -->
                        <div class="one-fourth columns gallery-item">
                            <div data-type="image" class="item-picture">
                                <img alt="" src="<?php echo thumbnail_image(base_url(), $media->ac_path , $widthGallery, $heightGallery, $imgTypeGallery); ?>">
                                <div class="image-overlay">
                                    <a title="<?php echo $media->ac_name;?>" data-rel="prettyPhoto[gallery]" href="<?php echo thumbnail_image(base_url(), $media->ac_path , $width, $height, $imgType); ?>"><span class="zoom"></span></a>
                                </div>
                                <span class="item-label"><?php echo $media->ac_name;?></span>
                            </div>
                        </div>  
                        <?php endforeach; ?>
                        <div class="clear"></div>
                        <h4><?php echo lang('club_descripcion');?></h4>
                        <?php echo html_purify(html_entity_decode($object->getDescription()));?>
                        <h4><?php echo lang('club_localidad');?></h4>
                        <?php //var_dump($object);?>
                    </div> <!-- end contact-form-wrapper -->
					
                    <!-- Google Map -->
                    <div id="map" class="google-map"><span>loading map...</span></div>
                    <script>
                        // Custom parameters for Google Maps
                        //var gm_params = {posType: 'coordinates', mapCoords: {lat: -33.333827, lng: -55.632048}, markerCoords: {lat: -33.333827, lng: -55.632048}};
                        var gm_params = {posType: 'coordinates', mapCoords: {lat: <?php echo $object->getLatitud();?>, lng: <?php echo $object->getLongitud();?>}, markerCoords: {lat: <?php echo $object->getLatitud();?>, lng: <?php echo $object->getLongitud();?>}};
                    </script>
                </div>
              
            </section>
            <!-- end Page Right Column -->
<div class="clear"></div>
        </div> <!-- end columns-wrapper sb-left -->

    </div>

</section>
<!-- end Page Content -->
