<?php //var_dump($usuario); ?>
<?php //var_dump($fichas); ?>
<?php //var_dump($path); ?>

<h1>Ficha de Usuario</h1>
<?php
   if($this->session->flashdata('salvado') == "ok"):
  ?>
 <p>El usuario fue ingresado correctamente.</p> 
<?php endif; ?>
<?php
   if($this->session->flashdata('ficha_salvada') == "ok"):
  ?>
 <p>El certificado fue ingresado correctamente.</p> 
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
 <div id="certificado_<?php echo $ficha->id;?>">
    <div class="datos_usuario">
      <span class="tipo_dato">Fecha de Adquirido:</span>
      <span class="resultado_dato"><?php echo my_format_mysql_date($ficha->fecha_ingreso);?></span>
    </div>            
    <div class="datos_usuario">
      <span class="tipo_dato">Certificado:</span>
      <span class="resultado_dato">
        <img src="<?php echo base_url() .$path.$ficha->filename ?>" height="276"/>
      </span>
    </div>

    <div class="acciones">
      <a href="javascript:void(0)" onclick="return deleteFicha('<?php echo site_url("eliminarCertificado/".$ficha->id.".html");?>', <?php echo $ficha->id?>)">eliminar certificado</a>
    </div>
   <div class="clear"></div>
 </div>
  <?php endforeach; ?>
 
  <div class="acciones">
    <a href="<?php echo site_url("editar/".$usuario->id.".html");?>">editar</a>
    <a href="<?php echo site_url("imprimir/".$usuario->id.".html");?>">imprimir ficha</a>
    <a href="<?php echo site_url("agregar/certificado/".$usuario->id.".html");?>">ingresa otro</a> 
    
  </div><!--ACCIONES-->
  
  <div class="clear"></div>
  <div class="acciones">
    <a href="javascript:void(0)" onclick="return deleteUser('<?php echo site_url("eliminar/".$usuario->id.".html");?>', '<?php echo site_url("busqueda"); ?>');">eliminar usuario</a>
  </div>
  
  <hr/>
  
  <a href="<?php echo site_url("busqueda"); ?>" class="go_back"> < Volver</a>
  