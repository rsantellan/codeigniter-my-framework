<div class="file_detail">

  <div class="file_image">
    <img src="<?php echo base_url().thumbnail_image($file->path , 250, 250); ?>" />
  </div>

  <div class="file_data">
    <span class="title">Nombre: <?php echo $file->name;?></span>
    <a href="<?php echo site_url('upload/downloadFile/'.$file->id);?>">
      <img src="<?php echo base_url().'assets/upload/images/download.png'?>" />
    </a>
  </div>
</div>