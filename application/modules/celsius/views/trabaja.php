<div class="content_site content_internas">
    <h3><?php echo lang('trabajaconnosotros_titulo');?></h3>
    <p><?php echo lang('trabajaconnosotros_texto');?></p>
  <?php // Change the css classes to suit your needs    

$attributes = array('class' => 'from_trabajar_lab', 'id' => '');
$url = site_url($lang."/".(($lang =='es')?'trabaja-con-nosotros' : 'work-with-us').".html");
echo form_open_multipart($url, $attributes); ?>    
      <div class="from_trabajar_lab_left">
        <label><?php echo lang('trabajaconnosotros_nombre');?></label><input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"/><div class="clear"></div>
        <label><?php echo lang('trabajaconnosotros_apellido');?></label><input type="text" name="apellido" value="<?php echo set_value('apellido'); ?>"/><div class="clear"></div>
        <label class="label_ci"><?php echo lang('trabajaconnosotros_cedula_identidad');?></label><input type="text" name="cedula" class="input_ci" value="<?php echo set_value('cedula'); ?>"/><span>ej: 1111111-1</span><div class="clear"></div>
        <label><?php echo lang('trabajaconnosotros_email');?></label><input type="email" name="email" value="<?php echo set_value('email'); ?>"/><div class="clear"></div>        
        <label><?php echo lang('trabajaconnosotros_direccion');?></label><input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>"/><div class="clear"></div>
        <label><?php echo lang('trabajaconnosotros_ciudad');?></label><input type="text" name="ciudad" value="<?php echo set_value('ciudad'); ?>"/><div class="clear"></div>
        <label><?php echo lang('trabajaconnosotros_pais');?></label><input type="text" name="pais" value="<?php echo set_value('pais'); ?>"><div class="clear"></div>
        <label class="label_tel"><?php echo lang('trabajaconnosotros_telefono');?></label><input type="text" name="phone" class="input_tel" value="<?php echo set_value('phone'); ?>"/><div class="clear"></div>
        <label><?php echo lang('trabajaconnosotros_fax');?></label><input type="text" name="fax" value="<?php echo set_value('fax'); ?>"/><div class="clear"></div>
        <label class="label_adjuntarcv"><?php echo lang('trabajaconnosotros_cv');?></label><input type="file" class="input_adjuntarcv" name="cv"><span><?php echo lang('trabajaconnosotros_cv_type');?></span><div class="clear"></div>
        <label class="label_codv"><?php echo lang('trabajaconnosotros_codigo_verificador');?></label><input type="text" name="codigo" class="input_codv"><div class="clear"></div>
        <div class="captcha">
          <?php echo $captchaImage;  // this will show the captcha image?>
        </div>
      </div><!-- form lab left -->
      <div class="from_trabajar_lab_right">
        <p class="info_contacto" style="margin-top:0;"><?php echo lang('trabajaconnosotros_texto_eleccion');?></p>
        
        <input type="checkbox" class="input_checkbox" name="quimicofarmaceuticorecibido" value="1" <?php echo set_checkbox('quimicofarmaceuticorecibido', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_quimicofarmaceuticorecibido');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="quimicofarmaceuticoestudiante" value="1" <?php echo set_checkbox('quimicofarmaceuticoestudiante', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_quimicofarmaceuticoestudiante');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="quimicotecnologorecibido" value="1" <?php echo set_checkbox('quimicotecnologorecibido', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_quimicotecnologorecibido');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="quimicotecnologoestudiante" value="1" <?php echo set_checkbox('quimicotecnologoestudiante', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_quimicotecnologoestudiante');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="mantenimientomecanico" value="1" <?php echo set_checkbox('mantenimientomecanico', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_mantenimientomecanico');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="operariopreparador" value="1" <?php echo set_checkbox('operariopreparador', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_operariopreparador');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="depositologisticaexpedicion" value="1" <?php echo set_checkbox('depositologisticaexpedicion', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_depositologisticaexpedicion');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="limpieza" value="1" <?php echo set_checkbox('limpieza', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_limpieza');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="comprascomercionexterios" value="1" <?php echo set_checkbox('comprascomercionexterios', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_comprascomercionexterios');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="ventascomercialpromocion" value="1" <?php echo set_checkbox('ventascomercialpromocion', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_ventascomercialpromocion');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="administrativosfinancieroscontable" value="1" <?php echo set_checkbox('administrativosfinancieroscontable', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_administrativosfinancieroscontable');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="sistemainformatica" value="1" <?php echo set_checkbox('sistemainformatica', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_sistemainformatica');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="recepcionistasecretaria" value="1" <?php echo set_checkbox('recepcionistasecretaria', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_recepcionistasecretaria');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="cientificoinvestigadores" value="1" <?php echo set_checkbox('cientificoinvestigadores', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_cientificoinvestigadores');?></label><div class="clear"></div>
        <input type="checkbox" class="input_checkbox" name="estudiantessinexperiencia" value="1" <?php echo set_checkbox('estudiantessinexperiencia', '1'); ?>><label class="label_checkbox"><?php echo lang('trabajaconnosotros_eleccion_estudiantessinexperiencia');?></label><div class="clear"></div>
      </div><!-- form lab right -->
        <input type="submit" class="submit" value="<?php echo lang('trabajaconnosotros_enviar');?>">    
  <?php echo form_close(); ?>
  <?php 
  if(isset($errores['captcha'])):
    echo $errores['captcha'];
  endif;
  if(isset($errores['cedula_identidad'])):
    echo $errores['cedula_identidad'].'<br/>';
  endif;
  if(isset($errores['cv'])):
    echo $errores['cv'];
  endif;
  if(isset($errores['areas'])):
    echo $errores['areas'];
  endif;
  // 
  //var_dump($errores);
  ?>
<?php echo form_error('nombre'); ?>
<?php echo form_error('apellido'); ?>        
<?php echo form_error('cedula'); ?>
<?php echo form_error('email'); ?>
<?php echo form_error('direccion'); ?>
<?php echo form_error('ciudad'); ?>
<?php echo form_error('pais'); ?>
<?php echo form_error('phone'); ?>
<?php echo form_error('fax'); ?>
        
    <p class="info_contacto"><?php echo lang('trabajaconnosotros_campos_obligatorios');?></p>
  </div><!-- content -->
  <div class="images_bottom">
    <img src="<?php echo base_url(); ?>assets/celsius/images/trabaja_con_nosotros.jpg">
  </div>