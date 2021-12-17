


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-4"><h2><?php echo $título; ?></h2></div>
</div>


<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
<?php
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Numero habitacion</th>";
echo "<th>Piso</th>";
echo "<th>Cantidad persona</th>";
echo "<th>Matrimonial</th>";
echo "<th>Precio</th>";
echo "<th>Eliminar</th>";
echo "<th>Modificar</th>";

echo "</tr>";
echo "</thead>";
echo"<tbody>";
foreach ($habitaciones as $habitacion_item):
  $url = "'".site_url('habitaciones/eliminar/'.$habitacion_item['id'])."'";
  echo "<tr>";
  echo "<td>". $habitacion_item['id']. "</td>";
  echo "<td>".$habitacion_item['numero_habitacion']."</td>";
  echo "<td> ".$habitacion_item['piso']."</td>";
  echo "<td>".$habitacion_item['cantidad_persona']."</td>";
  echo "<td>".$habitacion_item['matrimonial']."</td>";
  echo "<td>".$habitacion_item['precio']."</td>";
    ?>
    <td><a class='btn btn-danger' href='javascript:;' onclick="return confirmacion(<?php echo $url; ?>);"><i class='fa fa-trash-alt'></i></a></td>
    <?php
  echo "<td><a class='btn btn-primary' href=".site_url('habitaciones/modificar/'.$habitacion_item['id'])."> <i class='fa fa-pencil'></i></a></td>";
  echo "</tr>";
endforeach;
echo "</tbody>";
echo "</table>";
echo "<p>$links </p>";
?>
<div class="m-4"><a class="btn btn-primary" href="<?php echo site_url('habitaciones/registrar'); ?> "> Registrar nueva habitacion</a></div> 
</div>
