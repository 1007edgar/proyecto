<?php
    if(isset($_SESSION["fecha_entrada"])) {
        $fecha_entrada = $_SESSION["fecha_entrada"];
     }

     if(isset($_SESSION["fecha_salida"])) {
        $fecha_salida = $_SESSION["fecha_salida"];
     }
?>


<!--FORMULARIO VÁLIDO-->
<?php echo validation_errors(); ?>
<div class="container">
<div class="row">
    <div class="col-sm-3"></div>

        <script type="text/javascript">
                $(document).ready(function(){

                    $("#selUser").select2({
                        ajax: { 
                            url: '<?= base_url() ?>reservas/reservas_buscador',
                            type: "post",
                            dataType: 'json',
                            delay: 250,
                            data: function (params) {
                            return {
                                    buscarTermino: params.term // search term
                                };
                            },
                            processResults: function (respuesta) {
                            return {
                            results: respuesta
                        };
                        },
                        cache: false
                        }
                    });

                    /*$("#form_reserva").submit(function (e) { 
                        e.preventDefault();
                        $.ajax({
                            type: $("form").attr("method");
                            url: $("form").attr("action");
                            data: $("form").serialize(),
                            //dataType: "dataType",
                            success: function (respuesta) {
                                alert(respuesta);
                            }
                        }); 
                    });*/
                });
        </script>


    <div class="col-sm-6 fondox">

        <?php echo form_open('reservas_cliente/registrar_reserva', ['id'=>'form_reserva']); ?>
        <table class="table table-sm">
            <tr> 
            <h1>Registrar reserva</h1>
            <tr><td colspan="5">Datos Reserva</td></tr>
            <td><label  class="form-label"for="fecha_entrada">Fecha entrada</label></td>
            <td><input class="form-control" type="date" name="fecha_entrada" value="<?PHP  echo date('Y-m-d',strtotime($fecha_entrada)); ?>"/></td>

            </tr>
            <tr>
                <td><label  class="form-label"for="fecha_salida">Fecha salida</label></td>
                <td><input class="form-control" type="date" name="fecha_salida" value="<?PHP  echo date('Y-m-d',strtotime($fecha_salida)); ?>"  /></td>
            </tr>

            <!--<tr>
            <td><label  class="form-label"for="id_cliente">Nombre Cliente</label></td>
            <td>
                <select id='selUser' name="id_cliente" style='width: 200px;'>
                    <option value='0'>-- Seleccionar cliente --</option>
                </select>
            </td>-->

        </table>


        <table class="table table-sm">
        
            <thead>
                <tr><td colspan="5">Elegir habitación</td></tr>
                <tr>
                    
                    <th></th>
                    <th>Numero habitación</th>
                    <th>Piso</th>
                    <th>Cantidad Persona</th>
                    <th>Matrimonial</th>
                    <th>Precio</th>
                </tr>
            </thead>
        
            <?php foreach ($habitaciones as $habitaciones_item):?>
                <tr>
                <td>
                    <input type="radio" id="id_habitacion" name="id" value="<?php echo $habitaciones_item['id'];?>">
                    </td>
                    <td>
                        <?php echo $habitaciones_item['numero_habitacion']; ?>
                    </td>
                    <td>
                        <?php echo $habitaciones_item['piso']; ?>
                    </td>
                    <td>
                        <?php echo $habitaciones_item['cantidad_persona']; ?>
                    </td>
                    <td>
                        <?php echo $habitaciones_item['matrimonial']; ?>
                    </td>

                    <td>
                        <input type="hidden" id="precio" name="precio" value="<?php echo $habitaciones_item['precio']; ?>">
                        <?php echo $habitaciones_item['precio']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

        <!--DATOS DEL CLIENTE-->
        <table class="table table-sm">
            <tr><td colspan="5">Datos Cliente</td></tr>
            <tr>  
                <td>
                    <label  class="form-label"for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" value=""/>
                </td>
                <td>
                    <label  class="form-label"for="apellido1">1º Apellido</label>
                    <input class="form-control" type="text" name="apellido1" value=""/>
                </td>
                <td>
                    <label  class="form-label"for="apellido2">2º Apellido</label>
                    <input class="form-control" type="text" name="apellido2" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                    <label  class="form-label"for="dni">DNI</label>
                    <input class="form-control" type="text" name="dni" value=""/>
                </td>
                <td>
                    <label  class="form-label"for="email">Email</label>
                    <input class="form-control" type="email" name="email" value=""/>
                </td>
                <td>
                    <label  class="form-label"for="direccion">Dirección</label>
                    <input class="form-control" type="text" name="direccion" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                    <label  class="form-label"for="telefono">Teléfono</label>
                    <input class="form-control" type="tel" name="telefono" value=""/>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="submit" class="btn btn-primary" name="submit" value="Crear Reserva" />
                </td>
            </tr>
        </table>

        </form>
        <a class="btn btn-secondary" href="<?php echo base_url('/')?>">Volver</a>
    </div>
</div>
</div>