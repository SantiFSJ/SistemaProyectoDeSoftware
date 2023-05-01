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
    <nav style="margin-left:0px!important" class="main-header navbar navbar-expand navbar-white navbar-light my-navbar">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">

          <a href="<?= base_url("home") ?>" class="nav-link" style="font-weight:bold"> <img src="<?php echo base_url('img/171-1714719_elephant-png-icon-free-delta-sigma-theta-elephant-removebg-preview.png') ?>" width="30" height="30" alt="Logo">Mi Prode</a>
        </li>

        <li class="nav-item dropdown my-dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Equipos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
              <a class="dropdown-item" href="<?= base_url("teams/create") ?>">Cargar Equipo</a>
            <?php } ?>
            <a class="dropdown-item" href="<?= base_url("teams/list") ?>">Listado de Equipos</a>
          </div>
        </li>
        <?php if (session()->id_role != 2 || !session()->username) { ?>
          <li class="nav-item dropdown my-dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="<?= base_url("users/create") ?>">Registrar Usuario</a>
              <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                <a class="dropdown-item" href="<?= base_url("users/list") ?>">Listado de Usuarios</a>
              <?php } ?>
            </div>
          </li>
        <?php } ?>

        <li class="nav-item dropdown my-dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Torneos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
              <a class="dropdown-item" href="<?= base_url("tournaments/create") ?>">Registrar torneo</a>
            <?php } ?>
            <a class="dropdown-item" href="<?= base_url("tournaments/list") ?>">Listado de torneos</a>
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
              <a href="<?= base_url("login") ?>" class="nav-link user-box-text"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar sesión</a>
            </li>
          </div>
          
        <?php } ?>


        <?php if (session()->username) { ?>
          <div class="user-box">
            <li class="nav-item dropdown">
              <a class="nav-link user-box-text"" data-toggle="dropdown" href="#">
              <i class="fa-solid fa-user" style="margin-left:10px"></i><span style="float:right;margin-right:15px"><?php echo session()->username ?> <span>
              </a>

              <div class="dropdown-menu dropdown-menu-lg dropdown-menu">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url("login/logout") ?>" class="dropdown-item"> <i class="fa-solid fa-arrow-right-from-bracket"></i>  Cerrar sesión</a>
                <div class="dropdown-divider"></div>
              </div>

            </li>
          </div>
        <?php } ?>


      </ul>

    </nav>
    <!-- /.navbar -->