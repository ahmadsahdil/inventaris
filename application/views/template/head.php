<?php
header("Content-Security-Policy:frame-ancestors 'none'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title ?></title>
  <link rel="icon" href="<?= base_url() ?>assets/bp2mi.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">

  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  </head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class=" wrapper">