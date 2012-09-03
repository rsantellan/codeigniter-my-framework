<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>
        <?php echo (isset($title))? $title: 'Titulo';?>
      </title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/style.css";?>" />
      <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie7.css" />
      <![endif]-->
      <?php if($jquery_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/js/jquery-1.7.1.min.js";?>"></script>
      <?php endif; ?>
      <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
      <?php endforeach; ?>
		
      <?php foreach($stylesheet as $sheet): ?>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/".$sheet;?>" />
      <?php endforeach; ?>      
    </head>
  <body>
    <div id="page">
      <!-- Empieza el header -->
      <div id="header">
        <div>
          <a href="index.html"><img src="<?php echo base_url();?>assets/images/logo.gif" alt="Logo" /></a>
        </div>
        <ul>
          <li class="<?php echo ($menu_id == "home")? "current" : "";?>"><a href="index.html"><span>Home</span></a></li>
          <li><a href="organic.html"><span>Organic Gardening</span></a></li>
          <li><a href="tips.html"><span>Gardening Tips &amp; Useful Links</span></a></li>
          <li class="<?php echo ($menu_id == "blog")? "current" : "";?>"><a href="<?php echo site_url('blog');?>"><span>Blog</span></a></li>
          <li><a href="about.html"><span>About</span></a></li>
          <li class="<?php echo ($menu_id == "contacto")? "current" : "";?>"><a href="<?php echo site_url('contacto');?>"><span>Contact</span></a></li>
        </ul>
      </div>
      <!-- Termina el header -->
      <!-- Empieza el body -->
      <div class="body">
	  
      <?php if(isset($content)): ?>
        <?php echo $this->load->view($content) ?>
      <?php endif; ?>
      </div>
      <!-- Termina el body -->
      <!-- Empieza el footer -->
      <div id="footer">
        <ul>
          
          <li>
            <h3>Magazine &amp; Books</h3>
            <div id="magazine">
              <p>Fusce interdum vestibulum lacus, sagittis sagittis mauris</p>
              <a href="index.html"><img src="<?php echo base_url();?>assets/images/magazine.jpg" alt="Image" /></a>
            </div>
          </li>
          
          <li>
            <h3>Gallery</h3>
            <div id="gallery">
              <b>Donec a quam quis est</b>
              <a href="index.html"><img src="<?php echo base_url();?>assets/images/family-harvesting.jpg" alt="Image" /></a>
              <p>Nam eu tellus a sem laoreet vel pulvinarid nisi at risus sit <br />by: Lizah</p>
              <a href="index.html" class="viewall">View all Photos</a>
            </div>
          </li>
          <li>
            <h3>Suppliers Directory</h3>
            <div>
              <b>Lorem ipsum dolor</b>
              <span>Vivamus placerat eros aligula vulpu</span>
              <p>(+36) 924-068-207</p>
              <b>Molestie Faucibus</b>
              <span>Proin magna velit, mattis portitor</span>
              <p>(+36) 924-068-207</p>
              <b>Vestibulum Matti</b>
              <p>(+36) 924-068-207</p>
              <a href="index.html" class="viewall">View all Suppliers</a>
            </div>
          </li>
          <li>
            <h3>Get in Touch</h3>
            <div>
              <p>Email:<br />company@email.com<br /><br /></p>
              <p>Address:<br />189 Lorem Ipsum Pellentes<br />Mauris Etiam ut velit odio<br />Proin nisi 0000<br /><br /></p>
              <p>Phone:<br /> 117-683-9187-000</p>
            </div>
          </li>
        </ul>
        <div>
          <p class="connect">Join us on <a href="http://facebook.com/freewebsitetemplates" target="_blank">Facebook</a> &amp; <a href="http://twitter.com/fwtemplates" target="_blank">Twitter</a></p>
          <p class="footnote">Copyright &copy;. All right reserved.</p>
        </div>
      </div>
      <!-- Termina el footer -->
      
      
    </div>
	
<!--	<div class="header">
      <div class="logo">
        <a href="index.html"><img src="<?php echo base_url();?>assets/images/logo.png" /></a>
      </div>
      
      <?php //echo language_menu(); ?>
    </div>
    <hr/>
    <div class="content">
      
    </div>
    <hr/>
    <div class="footer">
        Footer
    </div>-->
  </body>
</html>
