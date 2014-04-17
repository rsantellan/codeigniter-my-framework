<h1><?php echo lang('contacto_titulo');?></h1>
<div class="content">
  <div class="content_left">           
    <p class="copete_forms">
      <?php echo lang('contacto_copete');?>
    </p>                                                
    <p>
      <?php echo lang('contacto_consulta');?>
    </p>
    <?php if (!$mail): ?>
      <form id="llamadosform" action='<?php echo site_url($this->uri->uri_string());?>' method='POST' data-parsley-validate>
        <input type="text" name="nombre_apellido" placeholder="<?php echo lang('contacto_nombreapellido');?>" value="<?php echo set_value('nombre_apellido'); ?>" data-parsley-required="true" />
        <input type="text" name="mail" placeholder="<?php echo lang('contacto_mail');?>" data-parsley-type="email" value="<?php echo set_value('mail'); ?>" data-parsley-required="true" />
        <input type="text" name="tel" placeholder="<?php echo lang('contacto_telefono');?>" value="<?php echo set_value('tel'); ?>" />
        <textarea rows="8" name="comment" placeholder="<?php echo lang('contacto_comentario');?>" data-parsley-required="true" ><?php echo set_value('comment'); ?></textarea>
        <input type="submit" class="submit" value="<?php echo lang('contacto_enviar');?>">
      </form>        
    <?php else: ?>
      <?php echo lang('contacto_mensaje_enviado');?>
    <?php endif; ?>
  </div><!--LEFT HOME-->
  <div class="content_right">
    <img src="<?php echo base_url(); ?>assets/sumuy/images/contacto.jpg">
  </div><!--RIGHT HOME-->
</div><!--CONTENT-->

<script src="<?php echo base_url(); ?>assets/sumuy/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sumuy/js/es.js"></script>