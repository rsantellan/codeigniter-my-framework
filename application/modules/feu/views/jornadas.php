<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("jornadas_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->
       <div class="full-width columns">
				<?php //var_dump($jornadaslist);?>
				<?php //var_dump($cantidad); var_dump($pages);?>
           <h3><?php echo lang("jornadas_sub_titulo"); ?></h3>
           <p class="mb-30px"><?php echo lang("jornadas_descripcion"); ?></p>
           <!-- Feature Boxes with left icon (number type) -->
           <?php $counter = 1;?>
           <section class="feature-boxes left-icon-box small-icon number-type clearfix mb-35px">
               <?php foreach($jornadaslist as $key => $jornada): ?>
                   <article>
                        <span class="colored-background-1"><?php echo $counter;?></span>
                        <div>
                            <h4 class="italic colored-text-1"><?php echo $jornada->j_name;?></h4>
<!--                            <p class="mb-5px">The template's color scheme consist of 3 components:</p>-->
                            <?php if(count($jornada->temas) > 0): ?>
                            <ol class="mb-5px">
                                <?php foreach($jornada->temas as $tema): ?>
                                    <li>
                                        <em class="bold"><?php echo $tema->jt_name;?> <?php echo $tema->jt_orator;?></em>
                                        <?php foreach($tema->contents as $content): ?>
                                            <a class="fa fa-download" href="<?php echo site_url("jornada/".$content->ac_id.".html");?>"><?php echo $content->ac_name;?></a>
                                        <?php endforeach; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                            <?php endif; ?>
<!--                            <p>This combination gives you a great variety of color design solutions and makes your website fresh and original.</p>-->
                        </div>
                    </article>
               <?php $counter ++;?>
               <?php endforeach; ?>
           </section>
           <!-- end Feature Boxes -->
       </div>
        
        <?php if($pages > 1): ?>
        <!-- Pagination -->
        <div class="full-width columns">
            <hr class="divider-line mb-25px">
            <nav class="pagination clearfix">
                
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <?php if($i == $page): ?>
                        <span class="current"><?php echo $i;?></span>
                    <?php else: ?>
                        <a href="<?php echo site_url("jornadas-".$i.".html");?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
                    <?php endif; ?>
                    
                <?php endfor; ?>
                <span class="pages">Pagina <?php echo $page;?> de <?php echo $pages;?></span>
            </nav>
        </div>
        <?php 
        endif;
        ?>
    </div>
    
</section>
    

