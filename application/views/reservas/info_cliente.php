<style>
	.main{
 	padding: 40px 0;
}
.main input,
.main input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}
.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 400px;
    padding: 10px 40px;
	background:#009edf;
	    color: #FFF;
    text-shadow: none;
	-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

}
span.input-group-addon i {
    color: #009edf;
    font-size: 17px;
}

</style>

<body>

<?php foreach($clientes as $cliente):?>
<div class="container">
			<div class="main">
				<div class="main-center">
				<h5>Información del cliente.</h5>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name">Nombre</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="" value="<?php echo $cliente['nombre'];?>" readonly />
							</div>
						</div>

						<div class="form-group">
							<label for="email">Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" value="<?php echo $cliente['email'];?>" placeholder="" readonly />
							</div>
						</div>

						<div class="form-group">
							<label for="username">1º Apellido</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" value="<?php echo $cliente['apellido1'];?>" placeholder="" readonly />

								</div>
						</div>

						<div class="form-group">
							<label for="username">2º Apellido</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" value="<?php echo $cliente['apellido2'];?>" placeholder="" readonly />

								</div>
						</div>

						<div class="form-group">
							<label for="dni">DNI</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="dni" value="<?php echo $cliente['dni'];?>" placeholder="" readonly />
								</div>
						</div>

						<div class="form-group">
							<label for="dni">Direccción</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="dni" value="<?php echo $cliente['direccion'];?>" placeholder="" readonly />
								</div>
						</div>

						<div class="form-group">
							<label for="dni">Teléfono</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="dni" value="<?php echo $cliente['telefono'];?>" placeholder="" readonly />
								</div>
						</div>

						<!--*************************************************************-->
						<!--Un campo sobrante en caso de mostrar más registros-->

						<!--<div class="form-group">
							<label for="confirm">Confirm Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" placeholder="Confirm your Password"/>
								</div>
						</div>-->
				<a class="btn btn-light btn-sm mt-4" href="<?php echo site_url('/reservas'); ?> "> Volver</a>
				<!--<button type="submit" class="mt-4">Volver</button>-->
						</a>

					</form>
				</div><!--main-center"-->
			</div><!--main-->
		</div><!--container-->

<?php endforeach; ?>







