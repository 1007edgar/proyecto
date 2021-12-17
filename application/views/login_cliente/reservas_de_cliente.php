<!--BOTÓN VOLVER-->
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-3"><h2><?php echo $titulo; ?></h2></div>
        <div class="col-sm-4"></div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <?php
                echo "Nombre: <i>" . $_SESSION['nombre'] . "</i><br>   DNI: <i>" . $_SESSION['dni'] . "</i>";
                ?>
            </div>
        </div>
        <?php 
        
        $hoy = date("Y-m-d");  
        if(!isset($reservas['0']['fecha_entrada']) <= $hoy){
        echo "<div class='container'>";
        echo '<div class="row pt-5">';
        echo '<div class="col-sm-2"></div>';
        echo '<div class="col-sm-3"><h5>Reservas actuales </h5></div></div>';
        echo "<div class='row'>";
        echo "<div class='col-sm-2'></div>";
        echo "<div class='col-sm-8 fondox'>";
                    echo "<table id='tabla-reservas' class='table table-sm'>";
                    //echo "<thead>";

                    echo "<tr>";
                    //echo "<th>ID</th>";
                    //echo "<th>Nombre Cliente</th>";

                    echo "<th>Fecha entrada</th>";
                    echo "<th>Fecha salida</th>";
                    echo "<th>Nº de Habitación</th>";
                    echo "<th>Piso</th>";
                    echo "<th>Personas</th>";
                    echo "<th>Matrimonial</th>";
                    //echo "<th>ID Cliente</th>";
                    echo "<th>Precio</th>";
                    echo "<th>Cancelar</th>";
                    //echo "<th>Modificar</th>";
                    //echo "<th>Info Cliente</th>";
                    echo "</tr>";
                    //echo "</thead>";
                    //echo "<tbody>";

                    foreach ($reservas as $reserva_item):
                        $url = "'" . site_url('reservas/eliminar/' . $reserva_item['id']) . "'";
                        echo "<tr>";
                        //echo "<td>". $reserva_item['id_reserva']. "</td>";
                        //echo "<td>".$reserva_item['nombre']."</td>";

                        echo "<td>" . $reserva_item['fecha_entrada'] . "</td>";
                        echo "<td> " . $reserva_item['fecha_salida'] . "</td>";
                        //echo "<td>".$reserva_item['id_cliente']."</td>";
                        echo "<td> " . $reserva_item['numero_habitacion'] . "</td>";
                        echo "<td> " . $reserva_item['piso'] . "</td>";
                        echo "<td> " . $reserva_item['cantidad_persona'] . "</td>";
                        echo "<td> " . $reserva_item['matrimonial'] . "</td>";
                        echo "<td>" . $reserva_item['precio'] . ",00 €</td>";
                        ?>
                        <td><a class='btn btn-danger eli_reserva' href='<?php echo site_url('login_cliente/eliminar_reserva/' . $reserva_item['id_reserva']); ?>' onclick="return confirmar_eliminar()"><i class='fa fa-trash-alt mr-2'></i>Cancelar Reserva</a></td>
                        <?php
                        //echo "<td><a class='btn btn-primary' href=".site_url('reservas/modificar/'.$reserva_item['id_reserva'])."> <i class='fa fa-pencil'></i></a></td>";
                        //Botón nuevo Información del cliente
                        //echo "<td><a class='btn btn-success' href=".site_url('reservas/info_cliente/'.$reserva_item['id_cliente'])."> <i class='fa fa-eye'></i></a></td>";

                        /* echo "<td><a class='btn btn-warning' href=".site_url('reservas/reservas_pdf/'.$reserva_item['id'])."> <i class='fa fa-file-pdf'></i></a></td>";


                          echo "<td><a class='btn btn-success' href=".site_url('reservas/reservas_excel/'.$reserva_item['id'])."> <i class='fa fa-file-excel'></i></a></td>";
                          echo "</tr>"; */


                    endforeach;
                    //echo "</tbody>";
                    echo "</table>";
                    //<a class='btn btn-secondary' href=".base_url('login_cliente/salir').">Volver</a>";
                 
                echo "</div>";
             echo "</div>";
         echo "</div>";
        } else {
            echo '<div class="container"></div><div class="col-sm-2"></div><div class="col-sm-10"><strong><i>No dispone de reservas actuales</i></strog></div>';
        }
        
   ?>
        <div class="row pt-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-3"><h5><?php echo "Reservas anteriores"; ?></h5></div>
        </div>

        <!--RESERVAS ANTERIORES-->
        <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 fondox">
                <?php
                if (empty($reservas_anteriores)) {
                    echo "<i>No dispone de reservas anteriores</i>";
                } else {
                    echo "<table id='tabla-reservas' class='table table-sm'>";
                    //echo "<thead>";

                    echo "<tr>";
                    //echo "<th>ID</th>";
                    //echo "<th>Nombre Cliente</th>";

                    echo "<th>Fecha entrada</th>";
                    echo "<th>Fecha salida</th>";
                    echo "<th>Nº de Habitación</th>";
                    echo "<th>Piso</th>";
                    echo "<th>Personas</th>";
                    echo "<th>Matrimonial</th>";
                    //echo "<th>ID Cliente</th>";
                    echo "<th>Precio</th>";
                    //echo "<th>Cancelar</th>";
                    //echo "<th>Modificar</th>";
                    //echo "<th>Info Cliente</th>";
                    echo "</tr>";
                    //echo "</thead>";
                    //echo "<tbody>";

                    foreach ($reservas_anteriores as $reserva_item):
                        $url = "'" . site_url('reservas/eliminar/' . $reserva_item['id']) . "'";
                        echo "<tr>";
                        //echo "<td>". $reserva_item['id_reserva']. "</td>";
                        //echo "<td>".$reserva_item['nombre']."</td>";

                        echo "<td>" . $reserva_item['fecha_entrada'] . "</td>";
                        echo "<td> " . $reserva_item['fecha_salida'] . "</td>";
                        //echo "<td>".$reserva_item['id_cliente']."</td>";
                        echo "<td> " . $reserva_item['numero_habitacion'] . "</td>";
                        echo "<td> " . $reserva_item['piso'] . "</td>";
                        echo "<td> " . $reserva_item['cantidad_persona'] . "</td>";
                        echo "<td> " . $reserva_item['matrimonial'] . "</td>";
                        echo "<td>" . $reserva_item['precio'] . ",00 €</td>";
                        ?>
                                    <!--<td><a class='btn btn-danger eli_reserva' href='<?php //echo site_url('login_cliente/eliminar_reserva/'.$reserva_item['id_reserva']);?>' onclick="return confirmar_eliminar()"><i class='fa fa-trash-alt mr-2'></i>Cancelar Reserva</a></td>-->
                        <?php
                        //echo "<td><a class='btn btn-primary' href=".site_url('reservas/modificar/'.$reserva_item['id_reserva'])."> <i class='fa fa-pencil'></i></a></td>";
                        //Botón nuevo Información del cliente
                        //echo "<td><a class='btn btn-success' href=".site_url('reservas/info_cliente/'.$reserva_item['id_cliente'])."> <i class='fa fa-eye'></i></a></td>";

                        /* echo "<td><a class='btn btn-warning' href=".site_url('reservas/reservas_pdf/'.$reserva_item['id'])."> <i class='fa fa-file-pdf'></i></a></td>";


                          echo "<td><a class='btn btn-success' href=".site_url('reservas/reservas_excel/'.$reserva_item['id'])."> <i class='fa fa-file-excel'></i></a></td>";
                          echo "</tr>"; */


                    endforeach;
                    //echo "</tbody>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </div>
   
    <div class="row mt-5 mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <a class='btn btn-secondary' href="<?php echo site_url('login_cliente/salir') ?>">Volver</a>
        </div>
    </div>
    <div class="row p-5"></div>
    <div class="row p-5"></div>
</div>

<script>
    function confirmar_eliminar() {
        var respuesta = confirm("Estás seguro de cancelar la reserva?");

        if (respuesta) {
            return true;
        } else {
            return false;
        }
    }
</script>
