<h4>Listado de contactos</h4>
<table>
  <thead>
    <tr>
    <th>
        Direcci&oacute;n
      </th>
	  <th>
        Tipo
      </th>
     <th>
        Nombre
      </th>
      <th>
        Funci&oacute;n
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($list as $funcion => $arr): ?>
    <?php foreach($arr as $contacto): ?>
    <tr id="registro_row_<?php echo $contacto->id;?>">
    <td>
        <?php echo ($contacto->direccion); ?>
      </td>
	  <td>
        <?php echo ($contacto->tipo); ?>
      </td>
      <td>
        <?php echo ($contacto->nombre); ?>
      </td>
      <td>
        <?php echo ($contacto->funcion); ?>
      </td>
      <td>
        <a href="<?php echo site_url("contacto/contactoadmin/editContacto/".$contacto->id);?>">
          Editar
        </a>
        <a href="javascript:void(0)" onclick="return deleteItem(<?php echo $contacto->id;?>, 'Esta seguro de querer eliminar el registro?', '<?php echo site_url("contacto/contactoadmin/deleteContacto/".$contacto->id);?>');">
          Eliminar
        </a>
      </td>
    </tr>
    <?php endforeach; ?>  
    <?php endforeach; ?>
  </tbody>
</table>


<a href="<?php echo site_url("contacto/contactoadmin/addContacto");?>">
  Agregar
</a>