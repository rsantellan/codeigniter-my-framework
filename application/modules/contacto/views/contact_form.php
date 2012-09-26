<div class="content_ext">
    <div class="content">
        <h1>Contacto</h1>
        <div class="subtitle">Si desea ponerse en contacto con nosotros complete el siguiente formulario.</div>
    </div><!--CONTENT-->
    <hr />
    <div class="content">
        <p class="<?php echo (form_error('nombre') != "")? "error" : "";?>">*Completar los campos obligatorios para enviar el formulario.</p>
        <?php
        $attributes = array('method' => 'POST');
        echo form_open('contacto', $attributes); ?>
            <label class="<?php echo (form_error('nombre') != "")? "error" : "";?>">Nombre y Apellido*</label>
            <input type="text" class="<?php echo (form_error('nombre') != "")? "error" : "";?>" />
            <label class="<?php echo (form_error('email') != "")? "error" : "";?>">E-mail*</label>
            <input type="text" class="<?php echo (form_error('email') != "")? "error" : "";?>" />
            <?php 
                $t_class = ""; 
                if(form_error('comentario') != "")
                {
                  $t_class = "textarea_error";  
                }
              ?>
            <p class="<?php echo (form_error('comentario') != "")? "error" : "";?>"> 
              <label for="comentario"><?php echo lang("contacto_consulta"); ?></label>

              <?php echo form_textarea( array('class' => $t_class, 'id' => 'comentario', 'name' => 'comentario', 'rows' => '8', 'cols' => '80', 'value' => set_value('comentario') ) )?>
            </p>
            <?php echo form_submit( 'submit', 'enviar formulario', 'class="submit"'); ?>
          <?php echo form_close(); ?>
        <div class="content_col">
            <iframe width="300" height="160" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.uy/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=1770+Miguelete,+Montevideo&amp;aq=0&amp;oq=Miguelete+1770,+&amp;sll=-34.826295,-56.22742&amp;sspn=0.253647,0.42572&amp;ie=UTF8&amp;hq=&amp;hnear=Miguelete,+Montevideo&amp;ll=-34.893516,-56.177497&amp;spn=0.01584,0.026608&amp;t=m&amp;z=14&amp;output=embed" class="map"></iframe><br />
            <small>
              <a href="https://maps.google.com.uy/maps?f=q&amp;source=embed&amp;hl=es-419&amp;geocode=&amp;q=1770+Miguelete,+Montevideo&amp;aq=0&amp;oq=Miguelete+1770,+&amp;sll=-34.826295,-56.22742&amp;sspn=0.253647,0.42572&amp;ie=UTF8&amp;hq=&amp;hnear=Miguelete,+Montevideo&amp;ll=-34.893516,-56.177497&amp;spn=0.01584,0.026608&amp;t=m&amp;z=14" class="link_google" target="_blank">Ver mapa más grande</a>
            </small>
            <div class="clear"></div>
            <ul class="contacto">
                <li><img src="images/house.jpg" /></li>
                <li>Miguelte 1760</li>
                <li>Monteivdeo - Uruguay</li>
                <li><img src="images/tel.jpg" /></li>
                <li>( + 598) 2924 6540</li>
                <li><img src="images/mail.jpg" /></li>
                <li><a href="mailto:contacto@metalizadorauruguaya.com.uy?subject=Consulta desde sitio web" target="_blank">contacto@metalizadorauruguaya.com.uy</a></li>
            </ul>
        </div><!--CONTENT-COL-->
    </div><!--CONTENT-->
</div><!--CONTENT-EXT-->