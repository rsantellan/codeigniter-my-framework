<h3>Listado de <?php echo ($docType == "doc") ? "Documentos" : "Formularios";?></h3>
<table>
  <thead>
    <tr>
      <th>
        Nombre
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
        <?php echo ($object->name); ?>
      </td>
      <td>
        <a href="<?php echo site_url("documents/edit/".$object->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return adminManager.getInstance().deleteTableRow(<?php echo $object->id;?>, 'Esta seguro de querer eliminar la radio?', '<?php echo site_url("documents/delete/".$object->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
      
    <?php endforeach; ?>
  </tbody>
</table>

<?php
 $add_url = "documents/";
 if($docType == "doc"){
     $add_url .= "add";
 }else{
     $add_url .= "addForm";
 }
?>

<a href="<?php echo site_url($add_url);?>">
  Agregar
</a>

<a class="fancy_link iframe" href="<?php echo site_url("ordenable/sort/documents/document/".$docType);?>" >
  Ordenar
</a>

<script type="text/javascript">
    $(document).ready(function() {
        $("a.fancy_link").fancybox({
            'onClosed': function(){window.location.reload();}
        });
    });
</script>