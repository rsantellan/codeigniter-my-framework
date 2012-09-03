<h2><?php echo lang("contacto_titulo"); ?></h2>
<p><?php echo lang("contacto_subtitulo"); ?></p>
<?php
$attributes = array('class' => 'infield_form contacto_form', 'id' => '');
echo form_open('contacto', $attributes); ?>    

    <p class="<?php echo (form_error('nombre') != "")? "input_error" : "";?>">
      <label for="nombre"><?php echo lang("contacto_nombre"); ?></label>
      <input id="nombre" type="text" name="nombre" maxlength="255" value="<?php echo set_value('nombre'); ?>"  />
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
    <p class="<?php echo (form_error('email') != "")? "input_error" : "";?>">
      <label for="email"><?php echo lang("contacto_email"); ?></label>
      <input  id="email" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>"  />
    </p>
    <?php 
        $t_class = ""; 
        if(form_error('comentario') != "")
        {
          $t_class = "textarea_error";  
        }
      ?>
    <p class="<?php echo (form_error('comentario') != "")? "input_error" : "";?>"> 
      <label for="comentario"><?php echo lang("contacto_consulta"); ?></label>
      
      <?php echo form_textarea( array('class' => $t_class, 'id' => 'comentario', 'name' => 'comentario', 'rows' => '5', 'cols' => '80', 'value' => set_value('comentario') ) )?>
    </p>
    <div class='clear'></div>
    <?php echo form_submit( 'submit', 'enviar formulario', 'class="submit"'); ?>
<?php echo form_close(); ?>
<div class="clear"></div>
