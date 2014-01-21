<div class="file_detail">
  <?php
  if($file->getContenttype() == albumcontent::ISYOUTUBE):
      echo $file->youtubeRetrieveEmbeddedCode(array('width' => 350, 'height' => 250));
  else:
  ?>
  <div class="file_image">
    <img src="<?php echo thumbnail_image(base_url(), $file->getPath() , 250, 250); ?>" />
  </div>

  <div class="file_data">
    <span class="title">Nombre: <?php echo $file->getName();?></span>
    <a href="<?php echo site_url('upload/downloadFile/'.$file->getId());?>">
      <img src="<?php echo base_url().'assets/upload/images/download.png'?>" />
    </a>
  </div>
  <?php  
  endif;
  ?>
  
</div>