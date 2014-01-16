<h3>Listado de Promotores</h3>
<table>
  <thead>
    <tr>
      <th>
        Imagen
      </th>  
      <th>
        Nombre
      </th>
      <th>
        Link
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($objects_list as $object): ?>
    <tr id="table_row_<?php echo $object->id;?>">
    <td>
          <?php 
            $imgType = 3;
            $width = 100;
            $height = 100;
            ?>
          <?php if(!is_null($object->avatar)): ?>
            <img alt="<?php echo $object->name;?>" src="<?php echo base_url().thumbnail_image($object->avatar->getPath() , $width, $height, $imgType); ?>" class="img_servicios" />
            <?php else: ?>
            <img src="<?php echo base_url();?>assets/images/default_servicios.jpg" class="img_servicios" width="<?php echo $width;?>" height="<?php echo $height;?>"/>
        <?php endif; ?>
      </td>
      <td>
        <?php echo ($object->name); ?>
      </td>
      <td>
        <?php echo ($object->link); ?>
      </td>
      <td>
        <a href="<?php echo site_url("banners/edit/".$object->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar la radio?', '<?php echo site_url("banners/delete/".$object->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("banners/add");?>">
  Agregar
</a>

<a class="fancy_link iframe" href="<?php echo site_url("ordenable/sort/banners/banner/name");?>" >
  Ordenar
</a>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.fancy_link").fancybox({
            'onClosed': function(){window.location.reload();}
        });
    });
</script>