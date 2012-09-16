<div id="album_<?php echo $id;?>">
  <h6>Album: <?php echo $name;?> | <span class="agregar_span">Agregar archivos</span>
    <a class="fancy_link iframe" href="<?php echo site_url('upload/index/'.$id);?>">
      <img src="<?php echo base_url().'assets/upload/images/add.png'?>" />
    </a>
  </h6>
  <ul class="img_thumb_ul">
  <?php $firstImage = true; ?>  
  <?php foreach($images as $image): ?>
    
    <li id="file_container_<?php echo $image->id;?>" class="img_thumb_li">
      <div class="img_thumb_container <?php if($firstImage) echo 'avatar';?>">
        <div class="img_edit">
          <a href="<?php echo site_url('upload/editFile/'.$image->id);?>" class="fancy_link">
            Editar
          </a>
        </div>
        <img src="<?php echo base_url().thumbnail_image($image->path , 150, 150, 3); ?>" />
        <div class="img_delete">
          <a onclick="return deleteFile('<?php echo site_url('upload/deleteFile/'.$image->id);?>', <?php echo $image->id;?>)" href="javascript:void(0)" class="">
            <img src="<?php echo base_url().'assets/upload/images/delete.png'?>" />
          </a>
        </div>
		<div class="img_name">
		  <label>
			<?php echo $image->name;?>
		  </label>
		</div>
      </div>
    </li>
    <?php $firstImage = false; ?>  
  <?php endforeach; ?>
  </ul>
  <div class="clear"></div>
  <div>
    <a class="fancy_link iframe" href="<?php echo site_url("upload/sort/".$id);?>">
      Ordenar
    </a>
  </div>
</div>