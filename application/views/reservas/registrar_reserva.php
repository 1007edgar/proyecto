<?php echo validation_errors(); ?>

<div class="row">
    <div class="col-sm-2"></div>

 
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
  });
</script>



</script>
<div class="col-sm-5">



  <?php echo form_open('reservas/registrar'); ?>
  <table class="table table-bordered table-striped table-highlight">
    <tr> 
      <h1>Registrar reservas</h1>
      <td><label for="fecha_entrada">Fecha entrada</label></td>
      <td><input type="date" name="fecha_entrada" value=""/></td>

  </tr>
  <tr>
    <td><label for="fecha_salida">Fecha salida</label></td>
    <td><input type="date" name="fecha_salida" value=""  /></td>
</tr>

<tr>
   <td><label for="id_cliente">Nombre Cliente</label></td>
   <td>
       <select id='selUser' name="id_cliente" style='width: 200px;'>
          <option value='0'>-- Seleccionar cliente --</option>
      </select>
  </td>

</table>




<table class="table table-bordered table-striped table-highligh">
    
    <thead>
        <tr><td colspan="5">Registrar Reservas</td></tr>
        <tr>
            
            <th>id</th>
            <th>numero_habitacion</th>
            <th>piso</th>
            <th>cantidad_persona</th>
            <th>matrimonial</th>
            <th>precio</th>
        </tr>
    </thead>
    
    <?php foreach ($habitaciones as $habitaciones_item):?>
        <tr>
           <td>
             <input type="checkbox" id="id_habitacion" name="id_habitacion" value="<?php echo $habitaciones_item['id'];?>"><?php echo $habitaciones_item['id']; ?>
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
            <?php echo $habitaciones_item['precio']; ?>
        </td>
    </tr>
<?php endforeach; ?>
<tr>
   <td colspan="5">
       <input type="submit" class="btn btn-primary" name="submit" value="Crear Reserva" />
   </td>
</tr>

</table>
</form>
<a class="btn btn-secondary" href="<?php echo base_url('reservas')?>">Volver</a>
</div>
</div>
