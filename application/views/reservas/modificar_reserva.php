<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">

		<form action="<?php echo base_url().("reservas/modificar/updatereservas"); ?>" id="updatereservas" method="post">
			<h1>Modificar reservas</h1>
				<input type="hidden" name="id" value="<?php echo $reservas->id; ?>">
			<table class="table table-bordered table-highlight">
				<tr>													
					<td><label for="fecha_entrada">Fecha entrada</label></td>
					<td><input type="input" name="fecha_entrada" value="<?php echo $reservas->fecha_entrada; ?>"></td>
				</tr>
				<tr>
					<td><label for="piso">Fecha salida</label></td>
					<td><input type="input" name="fecha_salida" value="<?php echo $reservas->fecha_salida; ?>"></td>
				</tr>
				<tr>
					<td><label for="id_cliente">ID cliente</label></td>
					<td><input type="input" name="id_cliente"  value="<?php echo $reservas->id_cliente; ?>" ></td>
				</tr>
				<tr>
				<td colspan=" 2"><input class="btn btn-primary" type="submit" name="submit" value="modificar"></td>
			</tr>
			</form>
			</table>
			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-6"><a class="btn btn-secondary"href="<?php echo base_url('reservas')?>">volver</a>
			<div class="col-sm-3"></div>	
		</div>
		</div>
		</div>
