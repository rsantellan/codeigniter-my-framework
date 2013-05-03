<?php //var_dump($usuario); ?>
<?php //var_dump($fichas); ?>
<?php //var_dump($path); ?>

<h1>Ficha de Usuario</h1>
<?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
 <p>El usuario fue ingresado correctamente.</p> 

<?php endif; ?>
  <div class="datos_usuario">
    <span class="tipo_dato">Nombre:</span>
    <span class="resultado_dato"><?php echo $usuario->name;?></span>
  </div>
  <div class="datos_usuario">
    <span class="tipo_dato">Apellido:</span>
    <span class="resultado_dato"><?php echo $usuario->lastname;?></span>
  </div>            
  <div class="datos_usuario">
    <span class="tipo_dato">Cédula de Identidad:</span>
    <span class="resultado_dato"><?php echo $usuario->ci;?></span>
  </div>   
  <div class="datos_usuario">
    <span class="tipo_dato">Télefono:</span>
    <span class="resultado_dato"><?php echo $usuario->phone;?></span>
  </div>   
  <div class="datos_usuario">
    <span class="tipo_dato">Mutualista:</span>
    <span class="resultado_dato"><?php echo $usuario->center;?></span>
  </div>
  <?php foreach($fichas as $ficha): ?>
  <div class="datos_usuario">
    <span class="tipo_dato">Fecha de Adquirido:</span>
    <span class="resultado_dato"><?php echo $ficha->fecha_ingreso;?></span>
  </div>            
  <div class="datos_usuario">
    <span class="tipo_dato">Certificado:</span>
    <span class="resultado_dato">
      <img src="<?php echo base_url() .$path.$ficha->filename ?>" height="276"/>
    </span>
  </div>  
  <?php endforeach; ?>
  <div class="acciones">
    <a href="#">editar</a>
    <a href="#">imprimir ficha</a>
    <a href="#">ingresa otro</a> 
    <a href="#">cerrar</a>
  </div><!--ACCIONES-->