<h1>Usuario</h1>
<?php if($this->session->flashdata('message')): ?>
  	<p id="salvado_ok" class="success">Usuario creado con exito</p>
  	
  	<script type="text/javascript">
 		$(document).ready(function() {
 			$("#salvado_ok").fadeOut(3000);
 		});
 	</script>
  <hr/>
<?php endif; ?>
  
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
  Agregar enviando e-mail
</a>
<a href="<?php echo site_url("authadmin/registerPassword");?>">
  Agregar con contraseña
</a>
