<h1><?php echo lang('llamados_titulo');?></h1>
<div class="content">
  <div class="content_left">           
    <p class="copete_forms">
      <?php echo lang('llamados_texto');?>
    </p>                                                
    <a href="#" class="descargar">descargar bases</a> 

    <?php if (!$mail): ?>
      <?php echo form_error('name'); ?>
      <?php echo form_error('document'); ?>
      <?php echo form_error('birthdate'); ?>
      <?php echo form_error('country'); ?>
      <?php echo form_error('nacionality'); ?>
      <?php echo form_error('title'); ?>
      <?php echo form_error('mail'); ?>
      <?php echo form_error('institution'); ?>
      <?php echo form_error('address'); ?>
      <?php echo form_error('phone'); ?>
      <?php echo form_error('emailinstitucion'); ?>
      <?php echo form_error('postnumber'); ?>
      <?php echo form_error('countryinstitution'); ?>
      <?php echo form_error('website'); ?>
      <?php echo form_error('position'); ?>
      <?php echo form_error('investigation'); ?>
      <?php echo form_error('tutor'); ?>
      <?php echo form_error('cvuy'); ?>
      
      <form id="llamadosform" action='<?php echo site_url($this->uri->uri_string());?>' method='POST' data-parsley-validate>
        <input type="text" name="name" placeholder="<?php echo lang('llamados_nombre');?>" value="<?php echo set_value('name'); ?>" data-parsley-required  />
        <input type="text" name="document" placeholder="<?php echo lang('llamados_ci');?>" value="<?php echo set_value('document'); ?>"  data-parsley-required />
        <input type="text" name="birthdate" placeholder="<?php echo lang('llamados_birthdate');?>" value="<?php echo set_value('birthdate'); ?>"  />
        <input type="text" name="country" placeholder="<?php echo lang('llamados_country');?>" value="<?php echo set_value('country'); ?>"/>
        <input type="text" name="nacionality" placeholder="<?php echo lang('llamados_nacionality');?>" value="<?php echo set_value('nacionality'); ?>" />
        <input type="text" name="title" placeholder="<?php echo lang('llamados_title');?>" value="<?php echo set_value('title'); ?>"  />
        <input type="text" name="mail" placeholder="<?php echo lang('llamados_mail');?>" value="<?php echo set_value('mail'); ?>"  data-parsley-type="email" data-parsley-required="true" />
        <input type="text" name="institution" placeholder="<?php echo lang('llamados_institution');?>" value="<?php echo set_value('institution'); ?>" />
        <input type="text" name="address" placeholder="<?php echo lang('llamados_address');?>" value="<?php echo set_value('address'); ?>"  />
        <input type="text" name="phone" placeholder="<?php echo lang('llamados_phone');?>" value="<?php echo set_value('phone'); ?>"  />
        <input type="text" name="emailinstitucion" placeholder="<?php echo lang('llamados_emailinstitucion');?>" value="<?php echo set_value('emailinstitucion'); ?>" />
        <input type="text" name="postnumber" placeholder="<?php echo lang('llamados_postnumber');?>" value="<?php echo set_value('postnumber'); ?>" />
        <input type="text" name="countryinstitution" placeholder="<?php echo lang('llamados_countryinstitution');?>" value="<?php echo set_value('countryinstitution'); ?>" />
        <input type="text" name="website" placeholder="<?php echo lang('llamados_website');?>" value="<?php echo set_value('website'); ?>" />
        <input type="text" name="position" placeholder="<?php echo lang('llamados_position');?>" value="<?php echo set_value('position'); ?>" />
        <input type="text" name="investigation" placeholder="<?php echo lang('llamados_investigation');?>" value="<?php echo set_value('investigation'); ?>" />
        <input type="text" name="tutor" placeholder="<?php echo lang('llamados_tutor');?>" value="<?php echo set_value('tutor'); ?>"  />
        <input type="text" name="cvuy" placeholder="<?php echo lang('llamados_cvuy');?>" value="<?php echo set_value('cvuy'); ?>"  />
        <?php echo form_textarea( array( 'name' => 'comments', 'rows' => '8', 'value' => set_value('comments'), 'placeholder' => lang('llamados_comentarios') ) )?>
        <input type="submit" class="submit" value="enviar" />
      </form>
    <?php else: ?>
      <span>Gracias por enviar el mail.</span>
    <?php endif; ?>        
  </div><!--LEFT HOME-->
  <div class="content_right">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/llamados_1.jpg" class="img_doble" />
    <img src="<?php echo base_url(); ?>assets/sumuy/images/llamados_2.jpg" />
  </div><!--RIGHT HOME-->
</div><!--CONTENT-->
<script src="<?php echo base_url(); ?>assets/sumuy/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sumuy/js/es.js"></script>