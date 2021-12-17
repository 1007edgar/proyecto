<script>
   /*$( document ).ready(function() {
    $('#exampleModal').modal()
});*/
</script>

<div class="modal" tabindex="-1" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Fechas Disponibles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="fecha_disponible">Fecha Entrada</label>
        <input type="text" value="">
      </div>
      <div class="modal-body">
        <label for="fecha_disponible">Fecha Salida</label>
        <input type="text" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<div class="container bg-light p-5 m-5">
   
<h3>
  Detalles de su reserva
  <small class="text-muted h6">Podrá gestionar su reserva en el apartado de Ver/Cancelar reserva ingresando su nombre y DNI.</small>
</h3>
       


    <?php foreach($reserva as $reserva_item){

    echo "<p>Nombre: ".$reserva_item['nombre']." ".$reserva_item['apellido1']." ".$reserva_item['apellido2']."</p>";
    echo "<p>DNI: ".$reserva_item['dni']."</p>";
    echo "<p>Fecha Entrada: ".$reserva_item['fecha_entrada']."</p>";
    echo "<p>Fecha salida: ".$reserva_item['fecha_salida']."</p>";
    echo "<p>Nº de habitación: ".$reserva_item['numero_habitacion']."</p>";
    echo "<p>Precio: ".$reserva_item['precio_total']." €</p>";
    } ?>
    
    <div class="row">
        <tr>
        <div class="col-7">

        </div>
        <div class="col-1">
        <?php
            echo "<td class=''><a class='' href=".site_url('/')."> Volver</a></td>";
            
        ?>
      </div>
      <div class="col-4">
        
        <?php
            echo "<td class=''><a class='' target='_blank' href=".site_url('reservas_cliente/reservas_pdf/'.$reserva_item['id_reservas'])."> Generar pdf</a></td>";
        ?>
        </div>
        </tr>
    </div>
</div>
<div class="container p-3 m-5"></div>