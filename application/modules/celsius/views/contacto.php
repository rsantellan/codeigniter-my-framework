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
    <?php echo lang('contacto_texto');?>
    <form class="form_contacto">
        <input type="text" name="motivo_consulta" class="motivo_consulta">      
      <div class="form_contacto_block">
        <label style="margin-top:20px;">* Nombre</label><input type="text" name="nombre" style="margin-top:20px;">
        <label>*Apellido</label><input type="text" name="apellido">
        <label>Direcci&oacute;n</label><input type="text" name="direccion">
        <label>Ciudad</label><input type="text" name="ciudad">
        <label>Pa&iacute;s</label><input type="text" name="pais">
        <label class="label_tel">Tel&eacute;fono/Movil</label><input type="text" name="tel/cel" class="input_tel">
        <label>Fax</label><input type="text" name="fax">
        <label>*e-mail</label><input type="email" name="mail">
        <label>Empresa</label><input type="text" name="empresa">
        <label>Cargo</label><input type="text" name="cargo">
      </div><!-- form contacto block -->
      <div class="form_contacto_block">
        <label class="label_consulta">Consulta</label>
        <textarea rows="22" name="consulta"></textarea>
        <input type="submit" class="submit" value="Enviar">
      </div><!-- form contacto block -->
    </form>
    <p class="info_contacto">Los campos marcados con (*) son obligatorios</p>
  </div><!-- content -->