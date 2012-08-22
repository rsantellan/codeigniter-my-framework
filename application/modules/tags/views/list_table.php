<table id="tags_table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $tag): ?>
    <tr id="tag_table_<?php echo $tag->getId();?>">
      <td><?php echo $tag->getName();?></td>
      <td>
        <a href="javascript:void(0)" onclick ="return addTag('<?php echo site_url('tags/editTag/'.$tag->getId());?>')">Editar</a>
        <a href="javascript:void(0)" onclick="return deleteTag(<?php echo $tag->getId();?>, 'Esta seguro de querer eliminar el tag?', '<?php echo site_url("tags/deleteTag/".$tag->getId());?>');">Eliminar</a>
      </td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>