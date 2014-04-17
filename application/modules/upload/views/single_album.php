<div id="album_<?php echo $id;?>" class="panel panel-default">
  <div class="panel-heading">
    Album: <?php echo $name;?> | <span class="agregar_span">Agregar archivos</span>
    <a class="colorbox_link_upload iframe" href="<?php echo site_url('upload/index/'.$id);?>">
      <img src="<?php echo base_url().'assets/upload/images/add.png'?>" />
    </a>
  </div>
  <div class="panel-body">
    
      <?php 
        $firstImage = true; 
        $gridClass = 'col-md-12';
        $counterImages = 0;
        $openDiv = false;
      ?>
      <?php foreach($images as $image): ?>
      <?php if($firstImage || ($counterImages % 4) == 0):
        $openDiv = true;
        ?>
        <div class="row show-grid">    
      <?php endif;?>
        <div class="<?php echo $gridClass;?>" id="file_container_<?php echo $image->id;?>">
          <div class="img_thumb_container">
            <div class="img_edit">
              <a href="<?php echo site_url('upload/editFile/'.$image->id);?>" class="colorbox_link">
                Editar
              </a>
            </div>
              <img src="<?php echo thumbnail_image(base_url(), $image->basepath.$image->path , 150, 150, 3); ?>" />
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
        </div>
        <?php 
          if(!$firstImage)
            $counterImages ++;
          $firstImage = false; 
          $gridClass = 'col-md-3';
        ?>
        <?php if($firstImage  || ($counterImages % 4) == 0):
          $openDiv = false;
          ?>
          </div>
        <?php endif;?>
        
      <?php endforeach; ?>
      <?php if($openDiv): ?>
        </div>
      <?php endif; ?>
  </div>
  <div class="panel-footer">
    <a class="colorbox_link_iframe" href="<?php echo site_url("upload/sort/".$id);?>">
      Ordenar
    </a></div>
</div>
