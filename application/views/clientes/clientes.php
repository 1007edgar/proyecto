div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-4"><h2><?php echo $título; ?></h2></div>
</div>


<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>1º Apellido</th>
                <th>2º Apellido</th>
                <th>Teléfono</th>
                <th>Eliminar</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <?php foreach ($clientes as $cliente):
            $url = "'" . site_url('clientes/eliminar/' . $cliente->id) . "'";
            ?>
            <tr>
                <td><?= $cliente->id ?></td>
                <td><?= $cliente->dni ?></td>
                <td><?= $cliente->nombre ?></td>
                <td><?= $cliente->apellido1 ?></td>
                <td><?= $cliente->apellido2 ?></td>
                <td><?= $cliente->telefono ?></td>
                <td><a class='btn btn-danger' href='javascript:;' onclick="return confirmacion(<?php echo $url; ?>);"><i class='fa fa-trash-alt'></i></a></td>
    <?php echo "<td><a class='btn btn-primary' href=" . site_url('clientes/modificar/' . $cliente->id) . "> <i class='fa fa-pencil'></i></a></td>"; ?>

            </tr>
    <?php endforeach; ?>
    </table>
    <!--imprime links de paginacion-->
    <?php echo "<p>$links </p>"; ?>

    <div class="m-4"><a class="btn btn-primary" href="<?php echo site_url('clientes/registrar'); ?> "> Registrar nuevos clientes</a></div> 

</div> 
