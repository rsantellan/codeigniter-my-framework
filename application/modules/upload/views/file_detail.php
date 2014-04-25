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
	<form method="POST" action="<?php echo site_url('upload/saveFileDescription');?>" onsubmit="return saveFileDescription(this)">
	<input type="hidden" name="id" value="<?php echo $file->getId();?>" />
	<div class="description_container">
	  <label for="description">Descripción:</label>
	  <textarea name="description"><?php echo $file->getDescription();?></textarea>
	</div>
	<input type="submit" value="Guardar" id="album_description_save" />
	</form>
    <a href="<?php echo site_url('upload/downloadFile/'.$file->getId());?>">
      <img src="<?php echo base_url().'assets/upload/images/download.png'?>" />
    </a>
  </div>
  <?php  
  endif;
  ?>
  
</div>