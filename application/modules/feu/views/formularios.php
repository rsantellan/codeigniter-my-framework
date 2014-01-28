<!-- Page Title -->
<section id="page-title">

    <div class="grid-bg">
        <div class="container"> <!-- 1080 pixels Container -->
            <div class="full-width columns">
                <h1><?php echo lang("formulario_titulo"); ?></h1>
            </div>
        </div>
    </div>

</section>

<!-- Page Content -->
<section id="page-content">

    <div class="container"> <!-- 1080 pixels Container -->
       
        <div class="row">
				<div class="two-thirds columns">
					<div class="offset-right-20px">
						<!-- Announcements -->
						<div class="announcements mb-30px">
							<?php foreach($documents_list as $document): ?>
							<article>
								<h5><?php echo $document->name;?></h5>
<!--								<p>Taciti sociosqu ad litora torquent per conubia nostra, inceptos per himenaeos, lectus orci, elementum quis accumsan sodales vitae fermentum. In ultrices magna non sapien varius sollicitudin entesque tincidunt lacinia justo, convallis turpis rhoncus ut aptent taciti sociosqu ad litora torquent per conubia nostra.</p>-->
								<?php if(!is_null($document->avatar)): ?>
                                <a href="<?php echo site_url("formulario/".$document->avatar->getId().".html");?>" class="link-lg"><?php echo lang("formulario_descargar"); ?><span></span></a>
                                <?php endif; ?>
                                
							</article>
							<?php endforeach; ?>
						</div>
						<!-- end Announcements -->
					</div>
				</div>
				<div class="one-thirds columns">
				  <h4>Enviar formulario</h4>
				  <form action="" metho="POST">
					<label for="file">Enviar archivo</label>
					<input type="file" name="file" id="file" />
					<div class="clear"></div>
					<input type="submit" class="button" value="enviar"/>
				  </form>
				</div>
			</div>
        
    </div>
    
</section>
    

