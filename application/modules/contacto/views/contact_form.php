<div class="content_ext">
    <div class="content">
		<h1><?php echo lang('contacto_titulo');?></h1>
		<div class="subtitle"><?php echo lang('contacto_sub_titulo');?></div>
    </div><!--CONTENT-->
    <hr />
    <div class="content">
        <p class="<?php echo (form_error('nombre') != "" || form_error('email') != "" || form_error('comentario') != "" )? "error" : "";?>">*Completar los campos obligatorios para enviar el formulario.</p>
		
		<?php //echo validation_errors(); ?>
        <?php
        $attributes = array('method' => 'POST');
        echo form_open('contacto', $attributes); ?>
            <label class="<?php echo (form_error('nombre') != "")? "error" : "";?>"><?php echo lang('contacto_nombre')?></label>
            <input type="text" name="nombre" class="<?php echo (form_error('nombre') != "")? "error" : "";?>" value="<?php echo set_value('nombre'); ?>" />
            <label class="<?php echo (form_error('email') != "")? "error" : "";?>"><?php echo lang('contacto_email')?></label>
            <input type="text" class="<?php echo (form_error('email') != "")? "error" : "";?>" name="email" maxlength="255" value="<?php echo set_value('email'); ?>" />
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
		  <?php echo lang('contacto_texto');?>
            
        </div><!--CONTENT-COL-->
    </div><!--CONTENT-->
</div><!--CONTENT-EXT-->