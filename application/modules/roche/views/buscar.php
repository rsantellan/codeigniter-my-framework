<h1>Búsqueda de Usuario</h1>
  <p>Ingrese algunos de los siguientes datos para poder buscar al usuario.</p>
  <div class="busqueda_contenedor">
    <a href="listado.php">Ver listado de usuarios</a><div class="clear"></div>
      <form class="busqueda">
        <div class="div_busqueda">
          <label>Nombre:</label><input type="text" name="nombre">
        </div><!--DIV BUSQUEDA-->
        <div class="div_busqueda">
          <label>Apellido:</label><input type="text" name="apellido">
        </div><!--DIV BUSQUEDA-->       
        <div class="div_busqueda">
          <label style="width:80px;">Cédula Id.:</label><input type="text" name="cedula">
        </div><!--DIV BUSQUEDA-->     
        <div class="div_busqueda" style="margin-right:0">
          <label>Télefono:</label><input type="text" name="tel">
        </div><!--DIV BUSQUEDA-->   
        <div class="div_busqueda">
          <label>Mutualista:</label><input type="text" name="mutualista">
        </div><!--DIV BUSQUEDA-->    
        <div class="div_busqueda">
          <label>Fecha:</label>
            <div class="datepiker">
                <div class="datepiker_input">
                  <input type="text" id="datepicker" name="date"/>
                </div><!--DATEPIKER INPUT-->
                 <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
        </div><!--DATEPIKER-->                
        </div><!--DIV BUSQUEDA-->  
        <input type="submit" class="submit" value="buscar"><div class="clear"></div>                                                                                
      </form>
  </div><!--BUSQUEDA CONTENEDOR-->