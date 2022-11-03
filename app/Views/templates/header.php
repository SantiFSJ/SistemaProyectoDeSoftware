<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('css/adminlte.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
<nav style="margin-left:0px" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("home")?>" class="nav-link">Mi Prode</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("teams/create")?>" class="nav-link">Cargar Equipo</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("teams/list")?>" class="nav-link">Listado de Equipos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("users/create")?>" class="nav-link">Registrar Usuario</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("users/list")?>" class="nav-link">Listado de Usuarios</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("tournaments/create")?>" class="nav-link">Registrar Torneo</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("tournaments/list")?>" class="nav-link">Listado de Torneos</a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->
