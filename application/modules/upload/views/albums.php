<?php
foreach($albums as $album):
  echo $album['completo'];
?>

<input id="refresh_album_<?php echo $album["id"]?>" type="hidden" value="<?php echo site_url("upload/viewAlbum/".$album["id"]);?>" />

<?php 
endforeach;
?>