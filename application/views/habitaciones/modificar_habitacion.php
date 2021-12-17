<?php echo validation_errors(); ?>
!----

<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-5">


<form action="<?php echo base_url().("habitaciones/modificar/updatehabitaciones"); ?>" id="updatehabitaciones" method="post">
	<h1>Modificar habitaciones</h1>


 	<input type="hidden" name="id" value="<?php echo $habitaciones->id; ?>" /><br/>
<table class="table table-bordered table-highlight">
 <tr>
	 <td><label for="numero_habitacion">Numero habitaciones</label></td>
   	 <td><input type="input" name="numero_habitacion" value="<?php echo $habitaciones->numero_habitacion; ?>"></td>
</tr>
<tr>
	<td> <label for="piso">Piso</label></td>
 	<td><input type="input" name="piso" value="<?php echo $habitaciones->piso; ?>"></td>
</tr>
<tr>

  	<td><label for="cantidad_persona">Cantidad persona</label></td>
 	<td><input type="input" name="cantidad_persona" value="<?php echo $habitaciones->cantidad_persona; ?>"></td>
</tr>
<tr>
  	<td><label for="matrimonial">Matrimonial</label></td>
 	<td><input type="input" name="matrimonial" value="<?php echo $habitaciones->matrimonial; ?>"></td>
</tr>

<tr>
  	<td><label for="precio">Piso</label></td>
 	<td><input type="input" name="precio" value="<?php echo $habitaciones->precio; ?>"></td>
</tr>
<tr>
 <td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="modificar">
</form>
</tr>
</table>
 

<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-6"><a class="btn btn-secondary" href="<?php echo base_url('habitaciones')?>">volver</a>
<div class="col-sm-3"></div>
</div>
</div>
</div>