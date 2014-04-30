<h1><?php echo lang('inscripcion_titulo');?></h1>
<div class="content">
  <div class="content_left">           
    <p class="copete_forms">
      <?php echo lang('inscripcion_texto');?>
    </p>                                                
    

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
      
      <form id="llamadosform" action='<?php echo site_url($this->uri->uri_string());?>' method='POST' enctype="multipart/form-data" data-parsley-validate>
        <input type="text" name="name" placeholder="<?php echo lang('inscripcion_nombre');?>" value="<?php echo set_value('name'); ?>" data-parsley-required  />
        <input type="text" name="document" placeholder="<?php echo lang('inscripcion_ci');?>" value="<?php echo set_value('document'); ?>"  data-parsley-required />
        <input type="text" name="birthdate" placeholder="<?php echo lang('inscripcion_birthdate');?>" value="<?php echo set_value('birthdate'); ?>"  />
        <input type="text" name="country" placeholder="<?php echo lang('inscripcion_country');?>" value="<?php echo set_value('country'); ?>"/>
        <input type="text" name="nacionality" placeholder="<?php echo lang('inscripcion_nacionality');?>" value="<?php echo set_value('nacionality'); ?>" />
        <input type="text" name="title" placeholder="<?php echo lang('inscripcion_title');?>" value="<?php echo set_value('title'); ?>"  />
        <input type="text" name="mail" placeholder="<?php echo lang('inscripcion_mail');?>" value="<?php echo set_value('mail'); ?>"  data-parsley-type="email" data-parsley-required="true" />
        <input type="text" name="institution" placeholder="<?php echo lang('inscripcion_institution');?>" value="<?php echo set_value('institution'); ?>" />
        <input type="text" name="address" placeholder="<?php echo lang('inscripcion_address');?>" value="<?php echo set_value('address'); ?>"  />
        <input type="text" name="phone" placeholder="<?php echo lang('inscripcion_phone');?>" value="<?php echo set_value('phone'); ?>"  />
        <input type="text" name="emailinstitucion" placeholder="<?php echo lang('inscripcion_emailinstitucion');?>" value="<?php echo set_value('emailinstitucion'); ?>" />
        <input type="text" name="postnumber" placeholder="<?php echo lang('inscripcion_postnumber');?>" value="<?php echo set_value('postnumber'); ?>" />
        <input type="text" name="countryinstitution" placeholder="<?php echo lang('inscripcion_countryinstitution');?>" value="<?php echo set_value('countryinstitution'); ?>" />
        <input type="text" name="website" placeholder="<?php echo lang('inscripcion_website');?>" value="<?php echo set_value('website'); ?>" />
        <input type="text" name="position" placeholder="<?php echo lang('inscripcion_position');?>" value="<?php echo set_value('position'); ?>" />
        <input type="text" name="investigation" placeholder="<?php echo lang('inscripcion_investigation');?>" value="<?php echo set_value('investigation'); ?>" />
        <label><?php echo lang('inscripcion_adjuntar_recibo');?>(1)</label><input type="file" class="browse" name="sendfile1" />
        <div class="clear"></div>
        <p>
        <?php 
        if(count($errores) > 0):
          foreach($errores as $uError):
            echo $uError;
          endforeach;
        endif; ?>
        </p>
        <input type="text" name="cvuy" placeholder="<?php echo lang('inscripcion_cvuy');?>" value="<?php echo set_value('cvuy'); ?>"  />
        <?php echo form_textarea( array( 'name' => 'comments', 'rows' => '8', 'value' => set_value('comments'), 'placeholder' => lang('inscripcion_comentarios') ) )?>
        <input type="submit" class="submit" value="enviar" />
      </form>
    <?php else: ?>
      <span>Gracias por enviar el mail.</span>
    <?php endif; ?>        
  </div><!--LEFT HOME-->
  <div class="content_right">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/inscripcion_1.jpg" class="img_doble" />
    <img src="<?php echo base_url(); ?>assets/sumuy/images/inscripcion_2.jpg" />
  </div><!--RIGHT HOME-->
</div><!--CONTENT-->
<script src="<?php echo base_url(); ?>assets/sumuy/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sumuy/js/es.js"></script>
