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
                                      <a href="<?php echo site_url(sprintf('club/%s/%s.html', $club->c_id, url_title($club->c_name, '-', TRUE)));?>">
                                        <?php echo $club->c_name;?>
                                      </a>
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
    

