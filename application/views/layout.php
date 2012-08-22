<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>
        <?php echo (isset($title))? $title: 'Titulo';?>
      </title>
      
    </head>
  <body>
    <div class="header">
      <div class="logo">
        <a href="index.html"><img src="<?php echo base_url();?>assets/images/logo.png" /></a>
      </div>
      
      <?php echo language_menu(); ?>
    </div>
    <hr/>
    <div class="content">
      <?php if(isset($content)): ?>
        <?php echo $this->load->view($content) ?>
      <?php endif; ?>
    </div>
    <hr/>
    <div class="footer">
        Footer
    </div>
  </body>
</html>