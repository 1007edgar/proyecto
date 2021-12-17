<?php //phpinfo();?>
  <div class="container-fluid paco">
   
   <!-- Carousel -->
   <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="<?php echo base_url("imagenes/public/carrusel/carrusel0.jpg"); ?>" alt="Los Angeles" height="550" width="300" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url("imagenes/public/carrusel/carrusel0.jpg"); ?>" alt="Los Angeles" height="550" width="300" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url("imagenes/public/carrusel/carrusel1.png"); ?>" alt="Chicago" height="550" width="300" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url("imagenes/public/carrusel/carrusel2.jpg"); ?>" alt="New York" height="550" width="300" class="d-block" style="width:100%">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
   <?php
    $error= $this->session->flashdata('error');
    if(isset($error)){
   echo "<div class='container' style='margin-top:3%'>";
   echo    "<div class='row' id='error-busqueda'>";
   echo    "<div class='col-sm-1'></div>";
   echo         "<div class='col-sm-10'><div class='alert alert-danger'>";
   echo            "<label class='text-danger'>". $error ."</label> </div>";
   echo               "</div>";
   echo          "</div>";
   echo            "</div>";
 }
   ?>
  <div class="container-fluid paco imagen-fondo">
    <div class="rows">
      <main>
        <section id="home-form">
          <div class="wrapper">
          <?php echo validation_errors(); ?>
          <?php echo form_open('fechas_disponibles/index', ['id'=>'find-available-rooms-form']); ?>
            
              <div class="form-group">
                <label for="check-in">Fecha de entrada</label>
                <input
                type="hidden"
                id="check-in"
                class="form-control"
                name="fecha_entrada" required
                />
                <button id="check-in-button" class="btn input-button">
                  Fecha de entrada
                </button>
              </div>
              <div class="form-group">
                <label for="check-in">Fecha de salida</label>
                <input
                type="hidden"
                id="check-out"
                class="form-control"
                name="fecha_salida"
                value="" required
                />
                <button id="check-out-button" class="btn input-button">
                  Fecha de salida
                </button>
              </div>
              <div class="form-group">
                <select id="personas" class="form-select" name="personas">
                  <option selected>Cantidad de personas</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>

            </div>
            <div class="form-group">

              <button type="submit"  class="btn btn-primary" name="find-rooms">
                Busqueda
              </button>
            </div>
          </form>
        </div>
      </section>
      <div class="container">
       <div class="row">
        
       <!--PRUEBAS
        <div class="row">
        <?php //echo validation_errors(); ?>
          <?php //echo form_open('fechas_disponibles', ['id'=>'find-available-rooms-form']); ?>
            
          <input type="date" name="fecha_entrada" value="">
          <input type="date" value="">
          <input type="submit" value="enviar">
</form>
        </div>-->


        <div class="card-header">
          Bienvenidos al hotel MAUVA
        </div>
        <div class="alert alert-light" role="alert">
         <p>Todo el equipo del hotel queremos ofrecerte una estancia cómoda, divertida y tranquila. Nos encanta trabajar para cuidar a nuestros clientes y hacer que se sientan como en casa, sin renunciar a los numerosos servicios que ponemos a su alcance.
          Nuestra situación privilegiada frente la playa del Arenal te permitirá disfrutar del mar y de toda la oferta lúdica del paseo marítimo sin ningún esfuerzo, reservando las energías para degustar la gastronomía, adentrarse en el legado cultural, practicar un sinfín de deportes acuáticos y recorrer las rutas de senderismo que nos ofrece nuestra bella Jávea.

        El hotel consta de 150 habitaciones, con vistas al mar y al majestuoso Montgó, todas ellas reformadas en el 2011, y en constante actualización en aquellos detalles que puedan hacer tu estancia más confortable..</p>

      </div>

      <!-- Featured Rooms -->
      <section id="featured-rooms">
        <div class="container my-5 py-5">
          <div class="section-title">
            <h2>Nuestras ofertas de Navidades</h2>
          </div>
          <div class="row custom-room-cards">
            <div class="col col-md-3">
              <div class="card">
                <div class="card-body">
                  <img src="imagenes/public/1.jpg" class="img-responsive" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Individual</div>
                    <div class="price">100€/dia</div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col col-md-3">
              <div class="card">
                <div class="card-body">
                  <img src="imagenes/public/2.jpg" class="img-responsive" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Doble</div>
                    <div class="price">€200/dia</div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="card">
                <div class="card-body">
                  <img src="imagenes/public/3.jpg" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Semanal</div>
                    <div class="price">€150/dia</div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col col-md-3">
              <div class="card">
                <div class="card-body">
                  <img src="imagenes/public/4.jpg" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Fines de semanas</div>
                    <div class="price">€250/dia</div>
                  </div>
                  
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>

    </div>
  </div>
</div>
</main>
</div>

<!--MODAL-->
<!-- aparece en html, lo dejo comentado<input type="button" id="modal_true"value=""> -->
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


<script>
   /*$(document).ready(function(){ 
    //e.evenDefault();
    $('#modal_true').on('click',function(){
      $('#exampleModal').modal('show');

    });
  
    
    $("#find-available-rooms-form").submit(function (e) {
     
       //$('#exampleModal').modal('show');
         e.preventDefault();
         //e.stopImmediatePropagation();

        $.ajax({
            type: 'POST',
            url: "<?php //echo site_url('fechas_disponibles/index');?>",
            data: $('#find-available-rooms-form').serialize(),
            dataType: 'text',
            success: function (data) {
                  var resp = JSON.parse(data);
                  //alert(resp);
                  //$('#exampleModal1').modal('show');
                if(resp=== ""){
                  //$("#idDeTuFormulario").submit();
                  //$('#find-available-rooms-form').unbind();
                  //enviar_submit();
                  location.reload();
                    console.log("estoy en if");
                    //$("#find-available-rooms-form").submit();
                    //window.location.href = "<?php //echo site_url('reservas_cliente/formulario_reserva');?>";
                   //return true; 
                  //$('#find-available-rooms-form').unbind(e.preventDefault());
                  //return false;
                  //allowSubmit = true;
                  //$('#find-available-rooms-form').unbind(); 
                  //if (resp==="Error") {
                    //alert("funciona");
                    //$('#find-available-rooms-form').unbind();
                }
                
                else{
                  
                  alert(resp);
                  
                  console.log("estoy en else");
                  //
                    
                }
                  //$('#find-available-rooms-form').unbind();
                  //$("#find-available-rooms-form").click(function (e) {
                 //enviar_submit();
                 //return true;
                
                   
                  //window.location.href = "<?php //echo site_url('reservas_cliente/formulario_reserva');?>";
            }
            
            //e.preventDefault();
            //$('#find-available-rooms-form').unbind();
        });
        //$('#find-available-rooms-form').unbind();
        //e.preventDefault();
    });
    //$('#find-available-rooms-form').unbind();
  });

  function enviar_submit() {
    $('#find-available-rooms-form').submit(function(){
      $.ajax({
            type: 'POST',
            url: "<?php //echo site_url('fechas_disponibles/index');?>",
            data: $('#find-available-rooms-form').serialize(),
            dataType: 'text',
            success: function (data) {
              
                }
              
                  //window.location.href = "<?php //echo site_url('reservas_cliente/formulario_reserva');?>";
        });
           
    });

  }
  */
</script>
 <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.bundle2.min.js"); ?>"></script>


