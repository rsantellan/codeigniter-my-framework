<div class="content_site content_internas">
  <h3><?php echo lang('consultamedico_title');?></h3>
  <p><?php echo lang('consultamedico_aviso');?></p>
  <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'from_trabajar_lab', 'id' => '');
$url = site_url($lang."/".(($lang =='es')?'consulta-medico' : 'medic-consultation').".html");
echo form_open($url, $attributes); ?>
    <div class="from_trabajar_lab_left">
      <label><?php echo lang('consultamedico_nombre');?></label><input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"><div class="clear"></div>
      <label><?php echo lang('consultamedico_apellido');?></label><input type="text" name="apellido" value="<?php echo set_value('apellido'); ?>"><div class="clear"></div>
      <label class="label_ci"><?php echo lang('consultamedico_cedula_identidad');?></label><input type="text" name="cedula_identidad" class="input_ci" value="<?php echo set_value('cedula_identidad'); ?>"><span>ej: 1111111-1</span><div class="clear"></div>
      <label><?php echo lang('consultamedico_email');?></label><input type="email" name="email" value="<?php echo set_value('email'); ?>"><div class="clear"></div>        
      <label><?php echo lang('consultamedico_direccion');?></label><input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>"><div class="clear"></div>
      <label><?php echo lang('consultamedico_ciudad');?></label><input type="text" name="ciudad" value="<?php echo set_value('ciudad'); ?>"><div class="clear"></div>
      <label><?php echo lang('consultamedico_pais');?></label><input type="text" name="pais" value="<?php echo set_value('pais'); ?>"><div class="clear"></div>
      <label class="label_tel"><?php echo lang('consultamedico_telefono');?></label><input type="text" name="telefono" class="input_tel" value="<?php echo set_value('telefono'); ?>"><div class="clear"></div>
      <label><?php echo lang('consultamedico_profesion');?></label><input type="text" name="profesion" value="<?php echo set_value('profesion'); ?>"><div class="clear"></div>
      <label class="label_codv"><?php echo lang('consultamedico_codigo_verificador');?></label><input type="text" name="codigo" class="input_codv"><div class="clear"></div>
      <div class="captcha">
        <?php echo $captchaImage;  // this will show the captcha image?>
      </div>
    </div><!-- form lab left -->
    <div class="from_trabajar_lab_right">
      <label class="label_consulta"><?php echo lang('consultamedico_consulta');?></label>
      <?php echo form_textarea( array( 'name' => 'consulta', 'rows' => '22', 'value' => set_value('consulta') ) )?>
<!--      <textarea rows="22" name="consulta"></textarea>        -->
    </div><!-- form lab right -->
    <input type="submit" class="submit" value="<?php echo lang('consultamedico_enviar');?>">    
  <?php echo form_close(); ?>
  <?php 
  if(isset($errores['captcha'])):
    echo $errores['captcha'];
  endif;
  if(isset($errores['cedula_identidad'])):
    echo $errores['cedula_identidad'];
  endif;
  // 
//  var_dump($errores);
  ?>
    <?php echo form_error('nombre'); ?>
    <?php echo form_error('apellido'); ?>
    <?php echo form_error('cedula_identidad'); ?>
    <?php echo form_error('email'); ?>
    <?php echo form_error('direccion'); ?>
    <?php echo form_error('ciudad'); ?>
    <?php echo form_error('telefono'); ?>
    <?php echo form_error('profesion'); ?>
    <?php echo form_error('consulta'); ?>
  <p class="info_contacto"><?php echo lang('consultamedico_campos_obligatorios');?></p>
</div><!-- content -->
<div class="images_bottom">
  <img src="<?php echo base_url(); ?>assets/celsius/images/img_productos.jpg">
</div>