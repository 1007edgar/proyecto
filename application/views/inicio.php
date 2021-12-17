<!-- libreria que se usa para intercambiar variables de javascript a php-->
<?php echo $this->phptojs->getJsVars(); ?>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">     
    <main id="admin-main"> 
      <section class="content charts-section">
        <div class="container my-3">
          <div class="row" id="account-welcome">
            <div class="container">


             <h2>Bienvenido a&nbsp;<span>Mauva hotel</span></h2>

           </div>
         </div>

         <!-- Empieza a mostrar el conteo de clientes, reservas y habitaciones -->
         <div class="row" id="count">
          <div class="col-md-4">
            <div class="card card-blue">
              <div class="card-header">
                <div class="count">
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="info">
                    <div class="number">
                     <?php echo $Numero_clientes ?>       </div>
                     <div class="label">Clientes</div>
                   </div>
                 </div>
               </div>
                <a href="/clientes" class="small-box-footer">VER CLIENTES <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <div class="col-md-4">
            <div class="card card-red">
              <div class="card-header">
                <div class="count">
                  <div class="icon">
                    <i class="fa fa-hotel"></i>
                  </div>
                  <div class="info">
                    <div class="number">
                     <?php echo $Numero_habitaciones ?>                                </div>
                     <div class="label">Habitaciones</div>
                   </div>
                 </div>
               </div>
                    <a href="/habitaciones" class="small-box-footer">VER HABITACIONES <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <div class="col-md-4">
            <div class="card card-green">
              <div class="card-header">
                <div class="count">
                  <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                  </div>
                  <div class="info">
                    <div class="number">
                     <?php echo $Numero_reservas ?>                               </div>
                     <div class="label">Reservas</div>
                   </div>
                 </div>
               </div>
                    <a href="/reservas" class="small-box-footer">VER RESERVAS <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
         </div>
         <!-- final del conteo de clientes, reservas y habitaciones -->


         <!-- comienzo del grafico -->
         
         <div class="row" style="margin-top: 50px;">
             <div class="col-sm-2"></div>
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                Habitaciones matrimoniales y No Matrimoniales
              </div>
              <div class="graph"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <!-- se usa canvas para pintar los graficos -->
              <canvas id="habitaciones-matrimoniales" style="display: block; height: 204px; width: 409px;" width="613" height="306" class="chartjs-render-monitor"></canvas>
            </div>
          </div>
        </div>
         <!-- 
        
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-header">
              Reservas disponibles y NO disponibles
            </div>
            <div class="graph"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="matrimonial" width="613" height="306" style="background-color: rgb(255, 255, 255); display: block; height: 204px; width: 409px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
            -->
      </div>
    </div>
<!-- la libreria del grafico y codigo javascript es recomendable poner al final del body-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="../chart/chart_render.js"></script>
<script>
  //llamada a la funcion javascrip ubicado en el archivo chart_render.js
  //funcion carga el primer grafico 
  habitacionesmatrimoniales();
  //funcion carga el segundo grafico
  reservasdisponibles();
</script>
  </div>
</div>
</section>
</main>




</div>   
</div>