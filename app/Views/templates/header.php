<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Mi prode </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('css/adminlte.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">

</head>

<body class="hold-transition sidebar-mini  sidebar-collapse">
  <div class="wrapper">
    <!-- Navbar -->
    <nav style="margin-left:0px!important" class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">

          <a href="<?= base_url("home") ?>" class="nav-link" style="font-weight:bold"> <img src="<?php echo base_url('img/171-1714719_elephant-png-icon-free-delta-sigma-theta-elephant-removebg-preview.png') ?>" width="30" height="30" alt="Logo">Mi Prode</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Equipos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url("teams/create") ?>">Cargar Equipo</a>
            <a class="dropdown-item" href="<?= base_url("teams/list") ?>">Listado de Equipos</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuarios
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url("users/create") ?>">Registrar Usuario</a>
            <a class="dropdown-item" href="<?= base_url("users/list") ?>">Listado de Usuarios</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Torneos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url("tournaments/create") ?>">Registrar Torneo</a>
            <a class="dropdown-item" href="<?= base_url("tournaments/list") ?>">Listado de Torneos</a>
          </div>
        </li>

      </ul>




      <!-- Right navbar links -->

      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->


        <?php if (!session()->username) { ?>
          <div class="user-box">
            <li class="nav-item d-none d-sm-inline-block">
              <a href="<?= base_url("login") ?>" class="nav-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar Sesión</a>
            </li>
          </div>
        <?php } ?>


        <?php if (session()->username) { ?>
          <div class="user-box">
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <span><?php echo session()->username ?> <span><i class="fa-solid fa-user"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url("login/logout") ?>" class="dropdown-item">Log-out <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                <div class="dropdown-divider"></div>
              </div>

            </li>
          </div>
        <?php } ?>


      </ul>

    </nav>
    <!-- /.navbar -->