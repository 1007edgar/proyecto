<?php echo validation_errors(); ?>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-5">

<?php echo form_open('clientes/registrar'); ?>
 <table class="table table-bordered table-highlight">
 <h2>Registrar clientes</h2>
 	
    <tr>

  		<td><label for="piso">Nombre</label></td>
     	<td><input type="input" name="nombre"></td>
     </tr>
     <tr>
   		<td><label for="cantidad_persona">1º Apellido</label></td>
     	<td><input type="input" name="apellido1"></td>
     </tr>
	 <tr>
   		<td><label for="cantidad_persona">2º Apellido</label></td>
     	<td><input type="input" name="apellido2"></td>
     </tr>
	 <tr>
   		<td><label for="cantidad_persona">DNI</label></td>
     	<td><input type="input" name="dni"></td>
     </tr>
	 <tr>
   		<td><label for="cantidad_persona">Email</label></td>
     	<td><input type="input" name="email"></td>
     </tr>
	 <tr>
   		<td><label for="cantidad_persona">Direción</label></td>
     	<td><input type="input" name="direccion"></td>
     </tr>
	 <tr>
   		<td><label for="cantidad_persona">Teléfono</label></td>
     	<td><input type="input" name="telefono"></td>
     </tr>
     <tr>
     	 <td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Crear registro"></td>
     	</tr>
 </table>



<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-6"><a class="btn btn-secondary" href="<?php echo base_url('clientes')?>">volver</a></div>
<div class="col-sm-3"></div>
 </div>
 </div>
 </div>