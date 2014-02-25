<div class="content_site content_internas">
    <h3><?php echo lang('contacto_title');?></h3>
    <div class="contacto_block" style="padding-top:45px;">
      <?php echo lang('contacto_company_data_direccion');?>
      <div class="clear"></div>
      <?php echo lang('contacto_company_data_telefono');?>
      <div class="clear"></div>
      <?php echo lang('contacto_company_data_fax');?>
      <div class="clear"></div>
      <?php echo lang('contacto_company_data_ventas');?>
      <div class="clear"></div>
      <?php echo lang('contacto_company_data_horario');?>
    </div><!-- contacto block -->
    <div class="contacto_block">
      <img src="<?php echo base_url(); ?>assets/celsius/images/fachada_contacto.jpg">
    </div><!-- contacto block -->
    <div class="clear"></div>
    <?php echo lang('contacto_texto_titulo');?>
    <p><?php echo lang('contacto_texto');?></p>
    <p style="padding-bottom:35px;"><?php echo lang('contacto_texto_trabaja');?></p>
    <?php echo lang('contacto_motivo_titulo');?>
  <?php // Change the css classes to suit your needs    
$attributes = array('class' => 'form_contacto', 'id' => '');
$url = site_url($lang."/".(($lang =='es')?'contacto' : 'contact').".html");
echo form_open($url, $attributes); ?>    
        <input type="text" name="motivo" class="motivo_consulta" value="<?php echo set_value('motivo'); ?>">      
      <div class="form_contacto_block">
        <label style="margin-top:20px;"><?php echo lang('contacto_nombre');?></label><input type="text" name="nombre" style="margin-top:20px;" value="<?php echo set_value('nombre'); ?>">
        <label><?php echo lang('contacto_apellido');?></label><input type="text" name="apellido" value="<?php echo set_value('apellido'); ?>">
        <label><?php echo lang('contacto_direccion');?></label><input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>">
        <label><?php echo lang('contacto_ciudad');?></label><input type="text" name="ciudad" value="<?php echo set_value('ciudad'); ?>">
        <label><?php echo lang('contacto_pais');?></label><input type="text" name="pais" value="<?php echo set_value('pais'); ?>">
        <label class="label_tel"><?php echo lang('contacto_telefono');?></label><input type="text" name="telefono" class="input_tel" value="<?php echo set_value('telefono'); ?>">
        <label><?php echo lang('contacto_fax');?></label><input type="text" name="fax" value="<?php echo set_value('fax'); ?>">
        <label><?php echo lang('contacto_email');?></label><input type="email" name="email" value="<?php echo set_value('email'); ?>">
        <label><?php echo lang('contacto_empresa');?></label><input type="text" name="empresa" value="<?php echo set_value('empresa'); ?>">
        <label><?php echo lang('contacto_cargo');?></label><input type="text" name="cargo" value="<?php echo set_value('cargo'); ?>">
      </div><!-- form contacto block -->
      <div class="form_contacto_block">
        <label class="label_consulta"><?php echo lang('contacto_consulta');?></label>
        <?php echo form_textarea( array( 'name' => 'consulta', 'rows' => '22', 'value' => set_value('consulta') ) )?>
<!--        <textarea rows="22" name="consulta"></textarea>-->
        <input type="submit" class="submit" value="<?php echo lang('contacto_enviar');?>">
      </div><!-- form contacto block -->
    <?php echo form_close(); ?>
    <p class="info_contacto"><?php echo lang('contacto_campos_obligatorios');?></p>
  </div><!-- content -->