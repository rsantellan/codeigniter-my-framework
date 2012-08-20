<div class="content_right img_contacto">
    <h1><?php echo lang("contacto_titulo"); ?></h1>
    <p><?php echo lang("contacto_subtitulo"); ?></p>
    <?php
    $attributes = array('class' => 'infield_form contacto_form', 'id' => '');
    echo form_open('contacto', $attributes); ?>    
    
        <p>
          <label for="nombre"><?php echo lang("contacto_nombre"); ?></label>
          <input class="<?php echo (form_error('nombre') != "")? "input_error" : "";?>" id="nombre" type="text" name="nombre" maxlength="255" value="<?php echo set_value('nombre'); ?>"  />
        </p>        
        <p>
          <label for="institucion"><?php echo lang("contacto_institucion"); ?></label>
          <input id="institucion" type="text" name="institucion" maxlength="255" value="<?php echo set_value('institucion'); ?>"  />
        </p>           
        <p>
          <label for="telefono"><?php echo lang("contacto_telefono"); ?></label>
          <input id="telefono" type="text" name="telefono" maxlength="255" value="<?php echo set_value('telefono'); ?>"  />
        </p>
        <p>
          <label for="celular"><?php echo lang("contacto_celular"); ?></label>
          <input id="celular" type="text" name="celular" maxlength="255" value="<?php echo set_value('celular'); ?>"  />
        </p>        
        <p>
          <label for="email"><?php echo lang("contacto_email"); ?></label>
          <input class="<?php echo (form_error('email') != "")? "input_error" : "";?>" id="email" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>"  />
        </p>
        <p>
          <label for="comentario"><?php echo lang("contacto_consulta"); ?></label>
          <?php 
            $t_class = ""; 
            if(form_error('email') != "")
            {
              $t_class = "textarea_error";  
            }
          ?>
          <?php echo form_textarea( array('class' => $t_class, 'id' => 'comentario', 'name' => 'comentario', 'rows' => '5', 'cols' => '80', 'value' => set_value('comentario') ) )?>
        </p>
        <div class='clear'></div>
        <?php echo form_submit( 'submit', 'enviar formulario', 'class="button button_large"'); ?>
    <?php echo form_close(); ?>
    <div class="clear"></div>
    <p><a href="<?php echo site_url("contacto/descargarFormulario");?>" style="float:right"><?php echo lang("contacto_denuncias"); ?></a></p>
</div><!--CONTENT RIGHT-->
