<h1>Búsqueda de Usuario</h1>
  <p>Ingrese algunos de los siguientes datos para poder buscar al usuario.</p>
  <div class="busqueda_contenedor">
    <!-- <a href="listado.php">Ver listado de usuarios</a><div class="clear"></div> -->
      
      <form action="<?php echo site_url('busqueda'); ?>" method="GET" class="busqueda">
        <div class="div_busqueda">
          <label>Nombre:</label><input type="text" name="name" id="name" value="<?php echo (isset($name)? $name: "")?>" />
        </div><!--DIV BUSQUEDA-->
        <div class="div_busqueda">
          <label>Apellido:</label><input type="text" name="lastname" id="lastname" value="<?php echo (isset($lastname)? $lastname: "")?>" />
        </div><!--DIV BUSQUEDA-->       
        <div class="div_busqueda">
          <label style="width:80px;">Cédula Id.:</label><input type="text" name="ci" id="ci" value="<?php echo (isset($ci)? $ci: "")?>" />
        </div><!--DIV BUSQUEDA-->     
        <div class="div_busqueda" style="margin-right:0">
          <label>Télefono:</label><input type="text" name="phone" id="phone" value="<?php echo (isset($phone)? $phone: "")?>" />
        </div><!--DIV BUSQUEDA-->   
        <div class="div_busqueda">
          <label>Mutualista:</label><input type="text" name="center" id="center" value="<?php echo (isset($center)? $center: "")?>" />
        </div><!--DIV BUSQUEDA-->    
        <div class="div_busqueda">
          <label>Fecha:</label>
            <div class="datepiker">
                <div class="datepiker_input">
                  <input type="text" id="datepicker" name="date" value="<?php echo (isset($date)? $date: "")?>" />
                  <?php //echo $date;?>
                </div><!--DATEPIKER INPUT-->
            </div><!--DATEPIKER-->                
        </div><!--DIV BUSQUEDA-->  
        <input type="submit" class="submit" value="buscar"><div class="clear"></div>                                                                                
      </form>
  </div><!--BUSQUEDA CONTENEDOR-->
  
<script>
$(function() {
  
  $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
  $( "#datepicker" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
  //$( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd');
  
  
  $( "#datepicker" ).datepicker('setDate', $( "#datepicker" ).val());
  
  $( "#center" ).autocomplete({
    source: '<?php echo site_url('roche/searchCenter'); ?>',
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });
  
  $( "#name" ).autocomplete({
    source: '<?php echo site_url('roche/searchName'); ?>',
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });
  
  $( "#lastname" ).autocomplete({
    source: '<?php echo site_url('roche/searchLastname'); ?>',
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });
  
  $( "#ci" ).autocomplete({
    source: '<?php echo site_url('roche/searchCi'); ?>',
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });
  
  $( "#phone" ).autocomplete({
    source: '<?php echo site_url('roche/searchPhone'); ?>',
    minLength: 2,
    select: function( event, ui ) {
      //console.info(ui);
      //console.info(this.value);
    }
  });
  
});
</script>
<?php if($showListado): ?>

<?php if($noParameters):

  ?>
  <h2>Tiene que ingresar por lo menos un campo para la busqueda</h2>
<?php
else:
  //var_dump($listado);
  //var_dump($order);
  //var_dump($order_type);
?>  
<h2>Listado de Usuarios</h2>
<table cellpadding="0" cellspacing="0" border="none" style="width:960px;">
  <tr>
    <th>Nombre 
      <?php if($order == "name" && $order_type == "desc"):?>
        <a href="<?php echo site_url('busqueda'); ?>?order=name&type=asc">
          <img src="<?php echo base_url();?>assets/images/roche/up.jpg"/>
        </a>        
      <?php else: ?>
        <a href="<?php echo site_url('busqueda'); ?>?order=name&type=desc">
          <img src="<?php echo base_url();?>assets/images/roche/down.jpg"/>
        </a>      
      <?php endif; ?>
    </th>
    <th>Apellido
      <?php if($order == "lastname" && $order_type == "desc"):?>
        <a href="<?php echo site_url('busqueda'); ?>?order=lastname&type=asc">
          <img src="<?php echo base_url();?>assets/images/roche/up.jpg"/>
        </a>        
      <?php else: ?>
        <a href="<?php echo site_url('busqueda'); ?>?order=lastname&type=desc">
          <img src="<?php echo base_url();?>assets/images/roche/down.jpg"/>
        </a>      
      <?php endif; ?>
    </th>
    <th>Cédula de Id.</th>
    <th>Télefono</th>
    <th>Mutualista
      <?php if($order == "center" && $order_type == "desc"):?>
        <a href="<?php echo site_url('busqueda'); ?>?order=center&type=asc">
          <img src="<?php echo base_url();?>assets/images/roche/up.jpg"/>
        </a>        
      <?php else: ?>
        <a href="<?php echo site_url('busqueda'); ?>?order=center&type=desc">
          <img src="<?php echo base_url();?>assets/images/roche/down.jpg"/>
        </a>      
      <?php endif; ?>
    </th> 
    <th>Fecha
      <?php if($order == "fecha" && $order_type == "desc"):?>
        <a href="<?php echo site_url('busqueda'); ?>?order=fecha&type=asc">
          <img src="<?php echo base_url();?>assets/images/roche/up.jpg"/>
        </a>        
      <?php else: ?>
        <a href="<?php echo site_url('busqueda'); ?>?order=fecha&type=desc">
          <img src="<?php echo base_url();?>assets/images/roche/down.jpg"/>
        </a>      
      <?php endif; ?>
    </th>
    <th>Ficha</th>
  </tr>
  <?php foreach($listado as $usuario): ?>
  <tr>
    <td><?php echo $usuario->name;?></td>
    <td><?php echo $usuario->lastname;?></td>
    <td><?php echo $usuario->ci;?></td>
    <td><?php echo $usuario->phone;?></td>
    <td><?php echo $usuario->center;?></td>
    <td><?php echo my_format_mysql_date($usuario->fecha_ingreso);?></td>   
    <td><a href="<?php echo site_url("ficha/".$usuario->roche_usuarios_id.".html");?>" class="verficha">ver ficha</a></td>           
  </tr>
  <?php endforeach; ?>
</table>
<?php
endif;
?>
<?php endif; ?>