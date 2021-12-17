<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-3">


<form action="<?php echo base_url().("clientes/modificar/updateclientes"); ?>" id="updateclientes" method="post">
<h2>Modificar clientes</h2>

 <input type="hidden" name="id" value="<?php echo $clientes->id; ?>">

<table class="table table-bordered table-highlight">

<tr>
 <td><label for="dni">DNI</label></td>
 <td><input type="input" name="dni" value="<?php echo $clientes->dni; ?>"></td>
</tr>

<tr>
 <td><label for="nombre">Nombre</label></td>
 <td><input type="input" name="nombre" value="<?php echo $clientes->nombre; ?>"></td>
</tr>

<tr>
  <td><label for="apellido1">Apellido</label></td>
  <td><input type="input" name="apellido" value="<?php echo $clientes->apellido1; ?>"/></td>
</tr>
<tr>
 <td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="modificar"></td>
</tr>
</form>
</table>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-6"><a class="btn btn-secondary" href="<?php echo base_url('clientes')?>">volver</a>
<div class="col-sm-3"></div>
</div>
</div>
</div>