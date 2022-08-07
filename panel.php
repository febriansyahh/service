<?php
session_start();

include_once("koneksi.php");

if (isset($_SESSION['ses_username']) == "") {
  echo "<meta http-equiv='refresh' content='0;url=sign-in.php'>";
} else {
  $data_username = $_SESSION["ses_username"];
  $data_nama = $_SESSION["ses_nama"];
  $data_id = $_SESSION["ses_id_person"];
  $data_idUser = $_SESSION["ses_id_user"];
  $data_level = $_SESSION["ses_level"];
}

error_reporting();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>Booking Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta name="author" content="Themesberg">
  <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
  <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
  <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="ass/assets/img/favicon/gear-100.png">
  <link rel="icon" type="image/png" sizes="32x32" href="ass/assets/img/favicon/gear-32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="ass/assets/img/favicon/gear-16.png">
  <link rel="manifest" href="ass/assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="ass/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="ass/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="ass/vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="ass/css/volt.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- datatables bootstrap 5-->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <style>
    .vl {
      border-left: 4px solid #2e74d6;
      height: auto;
    }
  </style>



  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
  <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="ass/index.html">
      <img class="navbar-brand-dark" src="ass/assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="ass/assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
      <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <nav id="sidebarMenu" class="sidebar d-lg-block bg-yellow-100 collapse" data-simplebar>
    <?php
    switch ($data_level) {
      case '0':
    ?>
        <div class="sidebar-inner px-4 pt-3">
          <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
              <div class="avatar-lg me-4">
                <img src="ass/assets/img/team/icon.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
              </div>
              <div class="d-block">
                <h2 class="h5 mb-3"><?= $data_nama ?></h2>
                <a href="logout.php" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                  <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Sign Out
                </a>
              </div>
            </div>
            <div class="collapse-close d-md-none">
              <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
          <ul class="nav flex-column pt-3 pt-md-0">

            <li class="nav-item">
              <a href="panel.php" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <img src="ass/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                </span>
                <span class="mt-1 ms-1 sidebar-text">Booking Service</span>
              </a>
            </li>
            <li class="nav-item active ">
              <a href="panel.php" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-home"></i>
                </span>
                <span class="sidebar-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="?v=limit">
                <span class="sidebar-text">Limit Perhari</span>
              </a>
            </li>
            <li class="nav-item">
              <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-app">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-users"></i>
                  </span>
                  <span class="sidebar-text">Laporan Data</span>
                </span>
                <span class="link-arrow">
                  <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
              </span>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=lmember">
                      <span class="sidebar-text">Lap Member</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=lkaryawan">
                      <span class="sidebar-text">Lap Karyawan</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=lrekap">
                      <span class="sidebar-text">Lap Rekap Service</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

          </ul>
        </div>
      <?php
        break;
      case '1':
      ?>
        <div class="sidebar-inner px-4 pt-3">
          <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
              <div class="avatar-lg me-4">
                <img src="ass/assets/img/team/icon.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
              </div>
              <div class="d-block">
                <h2 class="h5 mb-3"><?= $data_nama ?></h2>
                <a href="logout.php" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                  <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Sign Out
                </a>
              </div>
            </div>
            <div class="collapse-close d-md-none">
              <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
          <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
              <a href="panel.php" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <img src="ass/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                </span>
                <span class="mt-1 ms-1 sidebar-text">Booking Service</span>
              </a>
            </li>
            <li class="nav-item active ">
              <a href="panel.php" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-home"></i>
                </span>
                <span class="sidebar-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-apps">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-gear"></i>
                  </span>
                  <span class="sidebar-text">Master Motor</span>
                </span>
                <span class="link-arrow">
                  <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
              </span>
              <div class="multi-level collapse " role="list" id="submenu-apps" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=limit">
                      <span class="sidebar-text">Limit Perhari</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-apps" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=brand">
                      <span class="sidebar-text">Brand Motor</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-apps" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=motor">
                      <span class="sidebar-text">Kendaraan</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-apps" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=part">
                      <span class="sidebar-text">Sparepart</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-app">
                <span>
                  <span class="sidebar-icon">
                    <i class="fas fa-users"></i>
                  </span>
                  <span class="sidebar-text">Master Data</span>
                </span>
                <span class="link-arrow">
                  <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
              </span>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=member">
                      <span class="sidebar-text">Data Member</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=karyawan">
                      <span class="sidebar-text">Data Karyawan</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">
                <ul class="flex-column nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="?v=jobdesk">
                      <span class="sidebar-text">Jobdesk Karyawan</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a href="?v=book" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <i class="fas fa-person fa-xl"></i>
                </span>
                <span class="sidebar-text">&nbsp;&nbsp;&nbsp;Antrian Service</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="?v=rekap" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <i class="fas fa-history"></i>
                </span>
                <span class="sidebar-text">&nbsp;&nbsp;&nbsp;Rekap Service </span>
              </a>
            </li>

            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            <li class="nav-item">
              <a href="?v=user" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <i class="fas fa-users"></i>
                </span>
                <span class="sidebar-text">Data User </span>
              </a>
            </li>

          </ul>
        </div>
      <?php
        break;
      case '2':
      ?>
        <div class="sidebar-inner px-4 pt-3">
          <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
              <div class="avatar-lg me-4">
                <img src="ass/assets/img/team/icon.png" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
              </div>
              <div class="d-block">
                <h2 class="h5 mb-3"><?= $data_nama ?></h2>
                <a href="logout.php" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                  <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Sign Out
                </a>
              </div>
            </div>
            <div class="collapse-close d-md-none">
              <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
          <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
              <a href="panel.php" class="nav-link d-flex align-items-center">
                <span class="sidebar-icon">
                  <img src="ass/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
                </span>
                <span class="mt-1 ms-1 sidebar-text">Booking Service</span>
              </a>
            </li>
            <li class="nav-item active ">
              <a href="?v=dashboard" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-home"></i>
                </span>
                <span class="sidebar-text">Home</span>
              </a>
            </li>
            <li class="nav-item ">
              <a href="?v=profile" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-user"></i>
                </span>
                <span class="sidebar-text">Profil</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?v=book" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="sidebar-text">Booking Service</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="?v=rekap" class="nav-link">
                <span class="sidebar-icon">
                  <i class="fas fa-history"></i>
                </span>
                <span class="sidebar-text">Rekap Service </span>
              </a>
            </li>

          </ul>
        </div>
    <?php
        break;
    }
    ?>

  </nav>

  <main class="content">

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
          <div class="d-flex align-items-center">

          </div>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center">
            <!-- Untuk Notifications icons -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-link text-dark notification-bell unread dropdown-toggle " data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                <div class="list-group list-group-flush">
                  <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                  <a href="#" class="list-group-item list-group-item-action border-bottom">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="ass/assets/img/team/profile-picture-1.jpg" class="avatar-md rounded">
                      </div>
                      <div class="col ps-0 ms-2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                          </div>
                          <div class="text-end">
                            <small class="text-danger">a few moments ago</small>
                          </div>
                        </div>
                        <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action border-bottom">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <img alt="Image placeholder" src="ass/assets/img/team/profile-picture-2.jpg" class="avatar-md rounded">
                      </div>
                      <div class="col ps-0 ms-2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                          </div>
                          <div class="text-end">
                            <small class="text-danger">2 hrs ago</small>
                          </div>
                        </div>
                        <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome new project".</p>
                      </div>
                    </div>
                  </a>

                  <a href="#" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                    <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                      <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                    View all
                  </a>
                </div>
              </div>
            </li> -->
            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="media d-flex align-items-center">
                  <img class="avatar rounded-circle" alt="Image placeholder" src="ass/assets/img/team/icon.png">
                  <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                    <span class="mb-0 font-small fw-bold text-gray-900"><?= $data_nama ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1 ">

                <?php
                if ($data_level == 2) {
                ?>
                  <a class="dropdown-item d-flex align-items-center" href="?v=profile">
                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                    </svg>
                    Profile Saya
                  </a>

                <?php
                }
                ?>
                <div role="separator" class="dropdown-divider my-1"></div>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                  <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="py-4">

    </div>


    <div class="content-wrapper">
      <div class="container-fluid">
        <?php
        if (isset($_GET['v'])) {
          $hal = $_GET['v'];

          switch ($hal) {
            case 'brand':
              include "panel/motor/brand.php";
              break;

            case 'brand_aksi':
              include "panel/motor/aksi_brand.php";
              break;

            case 'motor':
              include "panel/motor/index.php";
              break;

            case 'motor_aksi':
              include "panel/motor/aksi.php";
              break;

            case 'part':
              include "panel/part/index.php";
              break;

            case 'part_aksi':
              include "panel/part/aksi.php";
              break;

            case 'member':
              include "panel/member/index.php";
              break;

            case 'member_aksi':
              include "panel/member/aksi.php";
              break;

            case 'karyawan':
              include "panel/karyawan/index.php";
              break;

            case 'karyawan_aksi':
              include "panel/karyawan/aksi.php";
              break;

            case 'jobdesk':
              include "panel/jobdesk/index.php";
              break;

            case 'jobdesk_aksi':
              include "panel/jobdesk/aksi.php";
              break;

            case 'book':
              include "panel/booking/index.php";
              break;

            case 'book_aksi':
              include "panel/booking/aksi.php";
              break;

            case 'rekap':
              include "panel/rekap/index.php";
              break;

            case 'tambah_part':
              include "panel/rekap/tambah_part.php";
              break;

            case 'ubah_part':
              include "panel/rekap/ubah_part.php";
              break;

            case 'rekapitulasi':
              include "panel/rekap/rekap.php";
              break;

            case 'rekapedit':
              include "panel/rekap/edit.php";
              break;

            case 'cetakslip':
              include "panel/rekap/slip.php";
              break;

            case 'rekap_aksi':
              include "panel/rekap/aksi.php";
              break;

            case 'dashboard':
              include "panel/dashboard.php";
              break;

            case 'profile':
              include "panel/profile/index.php";
              break;

            case 'limit':
              include "panel/profile/limit.php";
              break;

            case 'logout':
              include "logout.php";
              break;

            case 'user':
              include "panel/user/index.php";
              break;

            case 'user_aksi':
              include "panel/user/aksi.php";
              break;

            case 'lmember':
              include "panel/laporan/v_member.php";
              break;

            case 'lkaryawan':
              include "panel/laporan/v_karyawan.php";
              break;

            case 'lrekap':
              include "panel/laporan/v_rekap.php";
              break;

            default:
              include "panel/404.php";
              break;
          }
        } else {
          include "panel/dashboard.php";
        }
        ?>
      </div>
    </div>

  </main>

  <!-- Core -->
  <script src="js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script> -->


  <script src="ass/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="ass/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Vendor JS -->
  <script src="ass/vendor/onscreen/dist/on-screen.umd.min.js"></script>

  <!-- Slider -->
  <script src="ass/vendor/nouislider/distribute/nouislider.min.js"></script>

  <!-- Smooth scroll -->
  <script src="ass/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

  <!-- Charts -->
  <script src="ass/vendor/chartist/dist/chartist.min.js"></script>
  <script src="ass/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

  <!-- Datepicker -->
  <script src="ass/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Sweet Alerts 2 -->
  <script src="ass/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
</body>


<!-- Vanilla JS Datepicker -->
<script src="ass/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="ass/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="ass/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="ass/assets/js/volt.js"></script>

<!-- Swetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });


  document.getElementById('basicAlert').addEventListener('click', function() {
    Swal.fire(
      'Basic alert',
      'You clicked the button!'
    )
  });
</script>


</body>

</html>