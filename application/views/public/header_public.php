<!DOCTYPE html>
<html>
<head>
  <title>HOTEL MAUVA</title>
  <meta charset="utf-8">

  <title>HOTEL  CodeIgniter</title>
  <link rel="icon" type="image/png" href="../../../imagenes/favicon.png" sizes="64x64">
  <link rel="stylesheet" href="<?php echo base_url("bootstrap/jquery/jquery-ui.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("fonts/css/font-awesome.css"); ?>"/>
  <link rel="stylesheet" href="<?php echo base_url("bootstrap/personalizado/public.css") ; ?>"/>
  <script type="text/javascript" src="<?php echo base_url("bootstrap/jquery/jquery.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("bootstrap/js/bootstrap.min.js"); ?>"></script>
  <link href="<?= base_url() ?>/select2/dist/css/select2.min.css" rel="stylesheet" />
  <script src="<?= base_url() ?>/select2/dist/js/select2.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("datatables/datatables.min.css") ; ?>"/>
  <script type="text/javascript" src="<?php echo base_url("datatables/datatables.min.js"); ?>"></script>

</head>

<body>
  <header id="home-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?php echo base_url("imagenes/public/logo.png"); ?>" alt="..." height="76">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("public_hotel/servicios"); ?>">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('#home-form'); ?>">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('public_hotel/contactos'); ?>">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('public_hotel/galeria'); ?>">Galeria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('login_cliente'); ?>">Gestión reserva</a>
            </li>
            <!--
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cuenta
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php //echo base_url('login_cliente'); ?>">Login Cliente</a></li>
              
                <li><a class="dropdown-item" href="/inicio">Login Administrador</a></li>
              -->
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>