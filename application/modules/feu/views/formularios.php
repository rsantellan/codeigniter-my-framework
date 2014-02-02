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
       
        <div class="row mb-40px">
				<div class="one-half columns mb-20px">
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
				<div class="one-half columns mb-20px">
				  <h4>Enviar formulario</h4>
				  <?php if($messageSent): ?>
					<h5 style='color: #52CC52;'>El formulario a sido enviado con exito</h5>
				  <?php endif;?>
				  <form action="<?php echo site_url('formularios.html');?>" method="POST" enctype="multipart/form-data">
					<label for="name">Nombre</label>
					<?php echo form_error('name'); ?>
					<input type="text" name="name" id="name" />
					<div class="clear"></div>
					<label for="fileform">Enviar archivo</label><?php if(isset($errores["fileform"])): ?> <label style="color: #E62E00; font-weight: bold;"><?php echo $errores['fileform'];?></label><?php endif; ?>  
					<input type="file" name="fileform" id="fileform" />
					<div class="clear"></div>
					<label for="word">Introduzca el texto</label><?php if(isset($errores["captcha"])): ?> <label style="color: #E62E00; font-weight: bold;"><?php echo $errores['captcha'];?></label><?php endif; ?>  
					<?php echo $captchaImage;  // this will show the captcha image?>
					<input type="text" name="word"  />
					<div class="clear"></div>
					<input type="submit" class="button" value="enviar"/>
				  </form>
				</div>
			</div>
        
    </div>
    
</section>
    

