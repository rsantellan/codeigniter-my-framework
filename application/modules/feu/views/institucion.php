<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("institucion_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->

        <div class="full-width columns">
            <div class="gap mb-40px"></div>
				
            <h4 class="mb-20px"><?php echo lang("institucion_sub_titulo"); ?></h4>	
            <div class="width-one-half align-left adapted-max-767px mb-40px mb-max-767px">
                <div class="offset-right-20px">
                    <!-- Accordion -->
                    <section class="toggle">
            
            <?php $counter = 0; 
            $cantidadPerAccordion = ceil(count($departamento_list) / 2);
            
            foreach($departamento_list as $departamento):  
                
                if($counter == $cantidadPerAccordion && $cantidadPerAccordion > 4):
            ?>
                       </section>
                    <!-- end Accordion -->

                </div>
            </div>
            <div class="width-one-half align-left adapted-max-767px mb-40px mb-max-767px">
                <div class="offset-right-20px">
                    <!-- Accordion -->
                    <section class="toggle">
            <?php
                endif;
            ?>
                 
                        
                        <div class="toggle-trigger"><a href="javascript:void(0)"><h5><?php echo $departamento->d_name;?></h5></a></div>
                        <div class="toggle-container">
                            <div class="content">
                                <p class="mb-5px"><?php echo html_purify(html_entity_decode($departamento->d_description));?></p>
                                <ul class="square-list tight margin-left-small remove-bottom">
                                    <?php foreach($departamento->clubes as $club):  ?>
                                    <li>
                                    <a href="#inline-<?php echo $club->c_id;?>" rel="prettyPhoto" class="prettyphoto-link" meta-data-id="mapa<?php echo $club->c_id;?>"><?php echo $club->c_name;?></a>
                                        <?php 
                                            $imgType = 3;
                                            $width = 250;
                                            $height = 250;
                                            $counter = 0;
                                            ?>  
                                        <div id="inline-<?php echo $club->c_id;?>" style="display:none; min-width: <?php echo $width*2;?>px; min-height: <?php echo $height*2;?>px;">
                                            
                                            <div>
                                            <?php foreach($club->contents as $content): ?>
                                                <div style="width: <?php echo $width;?>px; float: left">
                                                   <img alt="<?php echo $club->c_name;?>" src="<?php echo thumbnail_image(base_url(), $content->ac_path , $width, $height, $imgType); ?>" />
                                                </div>
                                              <?php $counter++;
                                              if($counter % 2 == 0): ?>
                                              <div class="clear"></div>
                                              <?php
                                              endif;
                                              ?>
                                            <?php endforeach; ?>
                                            </div>
                                            <div class="clear"></div>
                                            <p><?php echo html_purify(html_entity_decode($club->c_description));?></p>
                                            <div class="clear"></div>
                                            <?php if($club->c_link !== null && !empty($club->c_link)): ?>
                                                <a href="<?php echo $club->c_link;?>" target="_blank"><?php echo lang("institucion_sitio_club"); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                
                <?php $counter ++;?>
            <?php endforeach; ?>
                    </section>
                    <!-- end Accordion -->
                </div>
            </div>
			<?php //var_dump($departamento_list);?>
        </div>
    </div>
</section>
    

