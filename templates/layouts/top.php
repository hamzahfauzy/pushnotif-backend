<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="">
  <title>Notif Man</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url() ?>/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/vendors/summernote/dist/summernote-lite.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url() ?>/vendors/select2/select2.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/vendors/jquery-tags-input/jquery.tagsinput.min.css"> -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>/images/logo.png" />
  <style>
    table.dataTable td,
    table.dataTable th {
      -webkit-box-sizing: content-box;
      box-sizing: content-box;
      padding: 8px 10px;
    }

    .dataTables {
      box-sizing: border-box;
      display: inline-block;
      min-width: 1.5em;
      padding: 8px 10px;
      margin-top: 0;
      text-align: center;
      text-decoration: none !important;
      cursor: pointer;
      *cursor: hand;
      color: #333 !important;
      border: 0px solid transparent;
      border-top: 1px solid transparent;
      border-radius: 2px;
    }
    div.tagsinput {
      padding:8px;
      padding-left:15px;
    }
    .note-editable {
      background:#FFF;
    }
    .profile-feed img {
      max-width: 100% !important;
    }
    .post-content {
      font-size:14px;
    }
    .select2 {
      width:100%!important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <?php load_templates('layouts/header') ?>

      <?php load_templates('layouts/nav') ?>
    </div>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">