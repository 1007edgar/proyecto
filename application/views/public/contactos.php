<div class="container">
<div class="row">
	
	<div class="col-sm-12">
    <p></p>
   <center><h2 class="div-localiza">Contacto</h1></center>
   <P style="text-align: justify;">Alicante es una ciudad encantadora que se desenvuelve risueña y luminosa cara al mar. Está situada en un bellísimo entorno, en la misma ciudad encontramos estupendas playas de arena, numerosos parques, y un urbanismo cuidado y bello que se despliega alrededor de una montaña.
   </P>
 </div>

</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="parte-iz">
        <h4><img width="20" height="20"  src="../../imagenes/public/img/iconos/ubicacion.png" alt="icono"> Encuéntranos en:</h4>
        <p>Ronda de Segovia, 14 Alicante<br><a href="https://www.google.es/maps/dir//03001+Alicante+(Alacant),+Alicante/@38.3378189,-0.4928488,15z/data=!4m9!4m8!1m0!1m5!1m1!1s0xd6237b319b97717:0x1c02af723e134b50!2m2!1d-0.4850407!2d38.3438926!3e0?hl=es" target="_blank"> Cómo llegar</a></p>
        <h4><img idth="20" height="20" src="../../imagenes/public/img/iconos/mail.png" alt="icono"> Correo:</h4>
        <p>mauva.mauva@gmail.com<br><a href="mailto:mauva.mauva@gmail.com" target="_blank"> Mandar un e-mail</a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="parte-der">
        <h4><img width="20" height="20" src="../../imagenes/public/img/iconos/telf.png" alt="icono"> Teléfono:</h4>
        <p>0034.632.333.365<br><a href="tel:+34632333365" target="_blank"> Llamar</a></p>
        <h4><img width="20" height="20" src="../../imagenes/public/img/iconos/redes.png" alt="icono"> Redes sociales:</h4>
        <div class="mt-4">
          <!-- Facebook -->
          <a type="button" href="https://www.facebook.com" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
          <!-- Dribbble -->
          <a type="button" href="https://www.instagram.com" class="btn btn-floating btn-light btn-lg"><i class="fa-brands fa-instagram-square"></i></a>
          <!-- Twitter -->
          <a type="button" href="https://www.Twitter.com" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
          <!-- Google + -->
          <a type="button" href="https://es.linkedin.com" class="btn btn-floating btn-light btn-lg"><i class="fa-brands fa-linkedin"></i></a>
          <!-- Linkedin -->
           <a type="button" href="https://www.youtube.com" class="btn btn-floating btn-light btn-lg"><i class="fa-brands fa-youtube"></i></a>
        </div>
        
        <p id="info"></p>
      </div>
    </div>
</div>
</div>

<div class="container" style="height: 100%">
    <div id="map"></div>

    <script type="text/javascript">
      function iniciarMap(){
        var coord = {lat: 38.340869 ,lng: -0.486204};
        var map = new google.maps.Map(document.getElementById('map'),{
          zoom: 14,
          center: coord
        });
        var marker = new google.maps.Marker({
          position: coord,
          map: map
        });
      }
    </script>
    <!--Api de google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAK29l9lyayY1tSf9Y7Y0FlPz1NeqbdnY&callback=iniciarMap"></script>
    
  </div> 
  <!--
<div class="container">

<div class="row">
	<div class="col-sm-1"></div> 
  <div class="col-sm-4">
  <p></p>
  <h2>Formulario de contacto</h2>
    <form action="/action_page.php">
     <div class="form-group">
       <label for="email">Nombre:</label>
       <input type="email" class="form-control" id="email" placeholder="" name="email" >
     </div>
     <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" id="pwd" placeholder="" name="apellido">
    </div>

    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="pwd" placeholder="" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">Telefono:</label>
      <input type="text" class="form-control" id="pwd" placeholder="" name="Telefono">
    </div>

    <div class="form-group">
      <label for="pwd">Asunto:</label>
      <input type="text" class="form-control" id="pwd" placeholder="" name="asunto">
    </div>
    <div class="form-group">
      <label for="pwd">Consulta:</label>
      <textarea class="form-control" id="pwd" placeholder="" name="consulta"></textarea>
    </div>
    <div class="form-group form-check">
     <label class="form-check-label"></label>
     <input class="form-check-input" type="checkbox" name="remember"> Recuerdame
   </div>
   <p>*campos obligatorios</p>
 </form>
</div>
<div class="col-sm-4"></div> 
<div class="col-sm-3">
  <p></p>
  <h2>Mas informacion</h2>

</div>
</div>
</div>

-->
