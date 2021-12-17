<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//comprobamos que existe una variable de sesion, en caso contrario redireccionamos al login
 if($this->session->userdata('username') == '')  
 {  
 redirect(base_url() . 'main/login'); 

}else{
    $usuario_session= $this->session->userdata('username'); 
}


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HOTEL  CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("fonts/css/font-awesome.css"); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/personalizado/estilos.css") ; ?>"/>
	<script type="text/javascript" src="<?php echo base_url("bootstrap/jquery/jquery.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("bootstrap/personalizado/javascript.js"); ?>"></script>
	<link href="<?= base_url() ?>/select2/dist/css/select2.min.css" rel="stylesheet" />
	<script src="<?= base_url() ?>/select2/dist/js/select2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("datatables/datatables.min.css") ; ?>"/>
	<script type="text/javascript" src="<?php echo base_url("datatables/datatables.min.js"); ?>"></script>

</head>
<body>
	<header>
		<nav class="navbar navbar-dark fixed-top bg-dark">
			<a class="navbar-brand col-sm-3 col-md-2" href="/"><h>Hotel Mauva</h></a>
                                    <!-- Right Side -->
            <div class="btn-group float-end">
                <a href="#" class="dropdown-toggle text-decoration-none text-light" data-bs-toggle="dropdown">
                    <!--  En esta url hay mas avatares https://pickaface.net/explore/avatars/page-1.html -->
<img src="<?php echo base_url("imagenes/$usuario_session.png"); ?>" class="avatar" alt="Avatar"> <?php echo $usuario_session; ?> <b class="caret"></b>
                </a>
                
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="<?php echo base_url("main/salir"); ?>" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
                </ul>
            </div>
		</nav>
	</header>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 bg-light sidebar">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>inicio">
							<span class="fa fa-house" ></span>Inicio
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>clientes">
							<span class="fa fa-users"></span>Clientes
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>habitaciones">
							<span class="fa fa-hotel"></span>Habitaciones
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>reservas">
							<span class="fa fa-shopping-cart"></span>Reservas
						</a>
					</li>
					
				</ul>
			</nav>
			<div class="col-sm-2"></div>
			<div class="col-sm-8" style="margin-top: 5%">
			</div>



			
			

			





