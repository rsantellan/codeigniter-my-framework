<div id="object_tags_container" class="actas_container" >
  <span>Tags Usadas</span>
  <div class="tags_usadas">
    <?php foreach($tags_used as $tag):
    ?>  

    <div class="tag_div" id="tag_<?php echo $tag->getId();?>" style="background-color: <?php echo $tag->getColor();?>">
      <a href="javascript:void(0)" onclick="removeActaTag(<?php echo $id;?>, <?php echo $tag->getId();?>, '<?php echo site_url('tags/removeActaTag')?>')"> 
        <?php echo $tag->getName();?>
      </a>
    </div>

    <?php
    endforeach;
    ?>
  </div>
  <div class="clear"></div>
  <hr/>
  <span>Tags posibles</span>
  <div class="tags_libres">
  <?php foreach($tags as $tag):
  ?>  

  <div class="tag_div" id="tag_<?php echo $tag->getId();?>" style="background-color: <?php echo $tag->getColor();?>">
    <a href="javascript:void(0)" onclick="addActaTag(<?php echo $id;?>, <?php echo $tag->getId();?>, '<?php echo site_url('tags/addActaTag')?>')"> 
      <?php echo $tag->getName();?>
    </a>
  </div>

  <?php
  endforeach;
  ?>
  </div>
</div>

<input type="hidden" value="<?php echo site_url('tags/refreshActasTags/'.$id);?>" id="refresh_tags_object" />