<?php echo validation_errors(); ?>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-5">
<?php echo form_open('habitaciones/registrar'); ?>
 <table class="table table-bordered table-highlight">
 	<tr>

    <h2>Registrar habitaciones</h2>
  			<td><label for="numero_habitacion">Numero habitacion</label></td>
     		<td><input type="input" name="numero_habitacion"></td>
	</tr>
 
	<tr>

  			<td><label for="piso">Piso</label></td>
     		<td><input type="input" name="piso"></td>
     </tr>
     
 	<tr>

   			<td><label for="cantidad_persona">Cantidad persona</label></td>
    		<td> <input type="input" name="cantidad_persona"></td>
    </tr>

    
 	<tr>

   			<td><label for="matrimonial">Matrimonial</label></td>
     		<td><input type="input" name="matrimonial" /></td>
 	</tr>


  <tr>

        <td><label for="precio">Precio</label></td>
        <td><input type="input" name="precio" /></td>
  </tr>
 	<tr>
 			<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Crear registro"></td>

 	</tr>

</form>
 </table>

</div>
 <div class="row">
  <div class="col-sm-6"></div>
 <div class="col-sm-3"><a class="btn btn-secondary" href="<?php echo base_url('habitaciones')?>"> Volver</a></div>
 <div class="col-sm-3"></div>
</div>
</div>
</div>