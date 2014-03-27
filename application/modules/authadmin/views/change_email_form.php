<?php if($div): ?>
<div id="change_email_form">
<?php endif; ?>
  <?php
  $email = array(
      'name'	=> 'email',
      'id'	=> 'email',
      'value'	=> set_value('email'),
      'maxlength'	=> 80,
      'size'	=> 30,
  );
  ?>
  <?php echo form_open($this->uri->uri_string(), array('onsubmit' => 'return sendFormChangeEmail(this);')); ?>
  <table>
      <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
      <tr>
          <td><?php echo form_label('New email address', $email['id']); ?></td>
          <td><?php echo form_input($email); ?></td>
          <td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
      </tr>
  </table>
  <?php echo form_submit('change', 'Send confirmation email'); ?>
  <?php echo form_close(); ?>
<?php if($div): ?>
</div>  
<?php endif; ?>
