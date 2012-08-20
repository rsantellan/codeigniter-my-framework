<table>
  <thead>
    <tr>
      <th>
        Usuario
      </th>
      <th>
        Mail
      </th>
      <th>
        Activo
      </th>
      <th>
        Baneado
      </th>
      <th>
        Creado el
      </th>
      <th>
        Acciones
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($user_rows as $row):
      echo $row;
    endforeach;
    ?>
  </tbody>
</table>


<a href="<?php echo site_url("authadmin/register");?>">
  Agregar
</a>
