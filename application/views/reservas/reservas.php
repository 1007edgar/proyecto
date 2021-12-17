<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-3"><h2><?php echo $título; ?></h2></div>
  <div class="col-sm-4">



  </div>
  <div class="col-sm-2">
   <?php
   echo "<td><a class='btn btn-primary' target='_blank' href=".site_url('reservas/reservas_pdf/')."> <i class='fa fa-file-pdf'></i></a>&nbsp;";

   echo"<a class='btn btn-success' target='_blank' href=".site_url('reservas/reservas_excel/')."> <i class='fa fa-file-excel'></i></a>";
   ?>
 </div>
</div>


<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <?php
    echo "<table id='tabla-reservas' class='table table-striped'>";
    echo "<thead>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre Cliente</th>";
 
    echo "<th>Fecha entrada</th>";
    echo "<th>Fecha salida</th>";
    echo "<th>ID Cliente</th>";
    echo "<th>Precio</th>";
    echo "<th>Eliminar</th>";
    echo "<th>Modificar</th>";
    echo "<th>Info Cliente</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($reservas as $reserva_item):

      $urlreservaseliminar = "'".site_url('reservas/eliminar/'.$reserva_item['id_reserva'])."'";
      echo "<tr>";
      echo "<td>". $reserva_item['id_reserva']. "</td>";
      echo "<td>".$reserva_item['nombre']."</td>";
   
      echo "<td>".$reserva_item['fecha_entrada']."</td>";
      echo "<td> ".$reserva_item['fecha_salida']."</td>";
      echo "<td>".$reserva_item['id_cliente']."</td>";
      echo "<td>".$reserva_item['precio']."</td>";
      ?>
      <td><a class='btn btn-danger' href='javascript:;' onclick="return confirmacion(<?php echo $urlreservaseliminar; ?>);"><i class='fa fa-trash-alt'></i></a></td>
      <?php
      echo "<td><a class='btn btn-primary' href=".site_url('reservas/modificar/'.$reserva_item['id_reserva'])."> <i class='fa fa-pencil'></i></a></td>";
      //Botón nuevo Información del cliente
       echo "<td><a class='btn btn-success' href=".site_url('reservas/info_cliente/'.$reserva_item['id_cliente'])."> <i class='fa fa-eye'></i></a></td>";

  /*echo "<td><a class='btn btn-warning' href=".site_url('reservas/reservas_pdf/'.$reserva_item['id'])."> <i class='fa fa-file-pdf'></i></a></td>";
   
 
   echo "<td><a class='btn btn-success' href=".site_url('reservas/reservas_excel/'.$reserva_item['id'])."> <i class='fa fa-file-excel'></i></a></td>";
   echo "</tr>";*/


  endforeach;
 echo "</tbody>";
 echo "</table>";

 echo "<p>$links </p>";
 
 ?>

<script type="text/javascript">
  // cuando se termina de cargar la pagina se ejecuta el javascript
 $(document).ready(function() {
$('#tabla-reservas').dataTable( { // coge el id de la tabla y le aplica data table
        "paging":   false, // quita el paginado
        "ordering": true, // permiote ordenar por columna
        "info":     false,// quita el pie de la columna


  "language": { 
    "search": "", //quita el label
    "searchPlaceholder": "Buscar Reservas",
   
  }
} );

});
</script>



</script>
 <div class="m-4"><a class="btn btn-primary" href="<?php echo site_url('reservas/registrar'); ?> "> Registrar Nueva reserva</a></div> 
</div>
