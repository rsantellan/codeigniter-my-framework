<div id="album_<?php echo $id;?>" class="single_album_container">
  <h6>Album: <?php echo $name;?> | <span class="agregar_span">Agregar archivos</span>
    <a class="colorbox_link_upload iframe" href="<?php echo site_url('upload/index/'.$id);?>">
      <img src="<?php echo base_url().'assets/upload/images/add.png'?>" />
    </a>
  </h6>
  <ul class="img_thumb_ul">
  <?php $firstImage = true; ?>  
  <?php foreach($images as $image): ?>
    
    <li id="file_container_<?php echo $image->id;?>" class="img_thumb_li <?php if($firstImage) echo 'avatar_li';?>">
      <div class="img_thumb_container <?php if($firstImage) echo 'avatar';?>">
        <div class="img_edit">
          <a href="<?php echo site_url('upload/editFile/'.$image->id);?>" class="colorbox_link">
            Editar <?php //echo $image->name;?>
          </a>
        </div>
          <img src="<?php echo thumbnail_image(base_url(), $image->path , 150, 150, 3); ?>" />
        <div class="img_delete">
          <a onclick="return deleteFile('<?php echo site_url('upload/deleteFile/'.$image->id);?>', <?php echo $image->id;?>)" href="javascript:void(0)" class="">
            <img src="<?php echo base_url().'assets/upload/images/delete.png'?>" />
          </a>
            
        </div>
          <?php
          ?>
          <?php if( in_array($image->type, array('pdf', 'doc', 'docx', 'xls', 'ppt', 'xlsx', 'pptx', 'ods', 'csv', 'odt'))):
          ?>
          <br/>
          <label style="font-size: 10px"><?php echo $image->name;?></label>
          <?php
          endif;
          ?>
      </div>
    </li>
    <?php $firstImage = false; ?>  
  <?php endforeach; ?>
  </ul>
  <div class="clear"></div>
  <div style="margin-top: 15px">
    <a class="colorbox_link_iframe" href="<?php echo site_url("upload/sort/".$id);?>">
      Ordenar
    </a>
  </div>
</div>