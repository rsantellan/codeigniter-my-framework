<!-- Page Title -->
<section id="page-title">
	<div class="grid-bg">
		<div class="container"> <!-- 1080 pixels Container -->
			<div class="full-width columns">
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
							<?php if(count($noticia->contents) > 0): ?>
							<?php $content = reset($noticia->contents);?>
							<div class="post-media item-picture">
								<div class="thumbnail">
									<img alt="<?php echo $noticia->n_name;?>" src="<?php echo thumbnail_image(base_url(), $content->ac_path , $width, $height, $imgType); ?>" />
									<div class="image-overlay">
										<a href="<?php echo site_url('noticia/' . $url_help);?>" title="<?php echo $noticia->n_name;?>"><span class="link"></span></a>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<div class="post-content <?php echo (count($noticia->contents) == 0)? 'full-width' : '';?>">
								<?php echo word_limiter(html_purify(html_entity_decode($noticia->n_description)), 60); ?>
								<a href="<?php echo site_url('noticia/' . $url_help);?>" class="link-lg"><?php echo lang('noticia_leer mas');?><span></span></a>
							</div>
						</article>
						<?php endforeach;?>
						<?php if($pages > 1): ?>
						<nav class="pagination clearfix">
							<?php if($page > 1): ?>
							  <a href="<?php echo site_url("noticias-".($page-1).".html");?>" class="prev" title="Pagina Anterior"><span></span></a>
							<?php endif; ?>
							<?php for ($i = 1; $i <= $pages; $i++): ?>
								<?php if($i == $page): ?>
									<span class="current"><?php echo $i;?></span>
								<?php else: ?>
									<a href="<?php echo site_url("noticias-".$i.".html");?>" title="Pagina <?php echo $i;?>"><?php echo $i;?></a>
								<?php endif; ?>
							<?php endfor; ?>
							<?php if($page < $pages): ?>		
							  <a href="<?php echo site_url("noticias-".($page+1).".html");?>" class="next" title="Pagina siguiente"><span></span></a>
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
				<div class="widget" data-smallscreen="yes"> <!-- show widget on a small-screen mobile device: "yes" or "no" -->
					<h4 class="grey">Recent Posts</h4>
					<ul class="side-menu">
						<li><a href="#">Community Poll: Internet Speeds From Around the World in 2013</a></li>
						<li><a href="#">Post with embedded video</a></li>
						<li><a href="#">A Simple Way to Install Website Themes</a></li>
						<li><a href="#">Nullam laoreet turpis ac ornare tincidunt sed malesuada est, eget sollicitudin purus</a></li>
					</ul>
				</div>

			</aside>
			<!-- end Sidebar -->

		</div> <!-- end columns-wrapper sb-right -->

	</div>

</section>
<!-- end Page Content -->