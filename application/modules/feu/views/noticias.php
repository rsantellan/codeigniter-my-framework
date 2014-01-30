<!-- Page Title -->
<section id="page-title">
	<div class="grid-bg">
		<div class="container"> <!-- 1080 pixels Container -->
			<div class="full-width columns">
				<h1>
                    <?php if($busqueda !== null): ?>
                        <?php echo sprintf(lang('noticia_titulo_busqueda'), $busqueda);?>
                    <?php else: ?>    
                        <?php echo lang('noticia_titulo');?>
                    <?php endif; ?>
                    
                </h1>
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

					<!-- Blog Posts -->
					<section class="blog small-size">
						<?php foreach($noticialist as $noticia): ?>
						  
						<?php 
						//var_dump($noticia);
						//echo date("j - n - Y",strtotime($noticia->n_created_at));;
						?>
						<?php 
						$url_help = $noticia->n_id . "/" . url_title($noticia->n_name, '-', TRUE) . ".html";
						$imgType = 3;
						$width = 300;
						$height = 300;
						?>
						<!-- Post: Image format (link) -->
						<article class="clearfix">
							<a href="<?php echo site_url('noticia/' . $url_help);?>">
								<h3 class="title"><?php echo $noticia->n_name;?></h3>
							</a>
							<div class="post-meta slash-separated light-grey">
								<span class="italic"><?php echo lang('noticia_creada');?><bold><?php echo date("j-n-Y",strtotime($noticia->n_created_at));?></bold></span>
								<span class="italic"><?php echo lang('noticia_actualizada');?><bold><?php echo date("j-n-Y",strtotime($noticia->n_updated_at));?></bold></span>
							</div>
                            <?php
                            $fullwidth = true;
                            ?>
							<?php if(count($noticia->contents) > 0): ?>
							<?php 
                                $content = reset($noticia->contents);
                                if($content->ac_contenttype != 'content-document'):
                                    $fullwidth = false;
                            ?>
                            
							<div class="post-media item-picture">
								<div class="thumbnail">
									<img alt="<?php echo $noticia->n_name;?>" src="<?php echo thumbnail_image(base_url(), $content->ac_path , $width, $height, $imgType); ?>" />
									<div class="image-overlay">
										<a href="<?php echo site_url('noticia/' . $url_help);?>" title="<?php echo $noticia->n_name;?>"><span class="link"></span></a>
									</div>
								</div>
							</div>
							<?php endif;
                                endif; ?>
							<div class="post-content <?php echo ($fullwidth)? 'full-width' : '';?>">
								<?php echo word_limiter(html_purify(html_entity_decode($noticia->n_description)), 60); ?>
								<a href="<?php echo site_url('noticia/' . $url_help);?>" class="link-lg"><?php echo lang('noticia_leer mas');?><span></span></a>
							</div>
						</article>
						<?php endforeach;?>
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
                        $url_base = "noticias-%s.html";
                        if($busqueda !== null)
                        {
                            $url_base = "noticia-busqueda-%s.html/".$busqueda;
                        }
                        //"noticias-".($page-1).".html"
                        //"noticias-".$i.".html"
                        //"noticias-".($page+1).".html"
                        ?>
						<nav class="pagination clearfix">
							<?php if($page > 1): ?>
							  <a href="<?php echo site_url(sprintf($url_base, $page-1));?>" class="prev" title="Pagina Anterior"><span></span></a>
							<?php endif; ?>
							<?php for ($i = 1; $i <= $pages; $i++): ?>
                                <?php if($i >= $page - $firstDelta && $i <= $page +$lastDelta): ?>
                                    <?php if($i == $page): ?>
                                        <span class="current"><?php echo $i;?></span>
                                    <?php else: ?>
                                        <a href="<?php echo site_url(sprintf($url_base, $i));?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
                                    <?php endif; ?>
                                <?php endif; ?>    
							<?php endfor; ?>
							<?php if($page < $pages): ?>		
							  <a href="<?php echo site_url(sprintf($url_base, $page+1));?>" class="next" title="Pagina siguiente"><span></span></a>
							<?php endif; ?>
							<span class="pages">Pagina <?php echo $page;?> de <?php echo $pages;?></span>
						</nav>
						<?php endif; ?>
					</section>
					<!-- end Blog Posts -->

				</div> <!-- end full-width columns -->

			</section>
			<!-- end Page Left Column -->

			<!-- Sidebar (right aligned) -->
			<aside id="sidebar" class="one-fourth columns page-right-col">

				<!-- Recent Posts -->
				<div class="widget" data-smallscreen="no"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
                    <h4 class="grey"><?php echo lang('noticia_buscar_titulo');?></h4>
                    <?php // Change the css classes to suit your needs    
                        $attributes = array('class' => 'buscador_form', 'id' => '', "method" => "GET");
                        echo form_open('noticia-busqueda.html', $attributes); 
                    ?>
                    <p>
                        <label for="t"><?php echo lang('noticia_buscar_label');?></label>
                        <input id="s" type="text" name="s" value="<?php echo ($busqueda !== null)? $busqueda: '';?>" />
                    </p>
                    <input type="submit" class="button light" value="Buscar" />
                    <a class="colored-text-2" href="<?php echo site_url('noticias.html'); ?>"><?php echo lang('noticia_buscar_label_reiniciar');?><span></span></a>
                    <?php echo form_close(); ?>
				</div>

			</aside>
			<!-- end Sidebar -->

		</div> <!-- end columns-wrapper sb-right -->

	</div>

</section>
<!-- end Page Content -->