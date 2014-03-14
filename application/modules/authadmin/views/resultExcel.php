<h3>Cantidad de usuarios ingresados con exito: <?php echo $usuariosOK;?></h3>


<?php 
if(count($erroresListado) > 0):
?>  
  
<h3>Cantidad de usuarios con errores: <?php echo count($erroresListado);?></h3>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
      <th>Error</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($erroresListado as $error): ?>
    <tr>
      <td><?php echo $error['nombre'];?></td>
      <td><?php echo $error['email'];?></td>
      <td><?php echo $error['error'];?></td>
    </tr>      
    <?php endforeach; ?>
    
  </tbody>
</table>
<?php
endif;
?>

<a href="<?php echo site_url('authadmin/getFile/'.base64_encode($filecsv)."/csv")?>">Descargar csv</a>
<a href="<?php echo site_url('authadmin/getFile/'.base64_encode($filexls)."/xls")?>">Descargar Excel</a>