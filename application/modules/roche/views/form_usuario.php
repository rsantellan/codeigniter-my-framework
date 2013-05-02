<h1>Ingreso de usuario</h1>
<p>Completar los siguientes campos para ingresar al usuario. Los marcos marcados(*) son obligatorios para la creación del mismo.</p>
<form class="registro">
  <label>Nombre*:</label><input type="text" name="nombre"><div class="clear"></div>
  <label>Apellido*:</label><input type="text" name="apellido"><div class="clear"></div>
  <label>Cédula de Identidad*:</label><input type="text" name="cedula"><div class="clear"></div>
  <label>Télefono:</label><input type="text" name="tel"><div class="clear"></div>
  <label>Mutualista:</label><input type="text" name="mutualista"><div class="clear"></div>            
  <label>Fecha de Adquirido:</label>
      <div class="datepiker">
          <div class="datepiker_input">
            <input type="text" id="datepicker" name="date"/>
          </div><!--DATEPIKER INPUT-->
      </div><!--DATEPIKER-->
  <div class="clear"></div>
  <label>Certificado*:</label><input type="file" name="certificado" class="file"><div class="clear"></div>
  <a href="#">Agregar otro producto</a><div class="clear"></div>
  <input type="submit" class="submit" value="guardar"><div class="clear"></div>
</form>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>