<?php
include_once("koneksi.php");
if (isset($_POST['btnRegistrasi'])) Registrasi();
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Service | Booking Hari Ini</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">




  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="assets/css/theme.css" rel="stylesheet" />

</head>


<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="c">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="#home"><img src="assets/img/groupe.png" height="75" width="auto" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#service">Service</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#alur">Alur Registrasi</a></li>
            <li class="nav-item"><a class="nav-link" aria-current="page" href="#register">Registrasi</a></li>
          </ul>
          <div class="d-flex ms-lg-4">
            <a class="btn btn-warning ms-3" href="sign-in.php">Sign In</a>
            <!-- <a class="btn btn-warning ms-3" href="#!">Sign Up</a> -->
          </div>
        </div>
      </div>
    </nav>
    <section class="pt-7" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-md-start text-center py-6">
            <h1 class="mb-4 fs-9 fw-bold">Service Booking</h1>
            <p class="mb-6 lead text-secondary">Permudah booking service kendaraan anda<br class="d-none d-xl-block" />dengan menggunakan sistem booking service <br class="d-none d-xl-block" />
              ini, segera lakukan registrasi.</p>
            <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" aria-current="page" href="#register" role="button">Registrasi</a></div>
          </div>
          <div class="col-md-6 text-end"><img class="pt-5 pt-md-0 img-fluid mb-4" src="assets/img/hero/montirr.JPG" alt="" /></div>
        </div>
      </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pt-md-9 mb-6" id="service">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets/img/category/shape.png);opacity:.5;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <h1 class="fs-9 fw-bold mb-4 text-center"> Jasa Service Kami <br class="d-none d-xl-block" /></h1>
        <div class="row mt-5">
          <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon1.png" width="75" alt="Feature" />
            <h4 class="mb-3">Service Rutin</h4>
            <p class="mb-0 fw-medium text-secondary">Service berkala 1000 KM</p>
          </div>
          <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon2.png" width="75" alt="Feature" />
            <h4 class="mb-3">Service Cepat</h4>
            <p class="mb-0 fw-medium text-secondary">Sports betting,lottery and bingo playing for the fun</p>
          </div>
          <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon3.png" width="75" alt="Feature" />
            <h4 class="mb-3">Service Ringan</h4>
            <p class="mb-0 fw-medium text-secondary">Pengerjaan ringan hingga sedang.</p>
          </div>
          <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets/img/category/icon4.png" width="75" alt="Feature" />
            <h4 class="mb-3">Heavy Repair</h4>
            <p class="mb-0 fw-medium text-secondary">Service berat yang memakan waktu cukup lama.</p>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5" id="alur">

      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="mb-2 fs-7 fw-bold">Alur Registrasi Akun</h2>
            <p class="mb-4 fw-medium text-secondary">
              Langkah-langkah registrasi member service booking.<br />
            </p>
            <p class="mb-4 fw-medium text-secondary">1. Pilih menu registrasi pada laman awal</p>
            <p class="mb-4 fw-medium text-secondary">2. Masukkan semua isian data yang disediakan, pastikan data yang
              dimasukkan benar</p>
            <p class="mb-4 fw-medium text-secondary">3. Lakukan registrasi data</p>
            <p class="mb-4 fw-medium text-secondary">4. Setelah selesai registrasi, maka anda dapat melakukan login</p>
          </div>
          <div class="col-lg-6"><img class="img-fluid" src="assets/img/validation/validation.png" alt="" /></div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5" id="manager">

      <div class="container">
        <div class="row">
          <div class="col-lg-6"><img class="img-fluid" src="assets/img/manager/manager.png" alt="" /></div>
          <div class="col-lg-6">
            <p class="fs-7 fw-bold mb-2">Alur Service Booking</p>
            <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Login ke sistem</p>
            </div>
            <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Setelah masuk, pilih menu booking service</p>
            </div>
            <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Isi data yang disediakan. Pilih motor yang akan diservice,
                tanggal booking service motor, serta keluhan kendaraan</p>
            </div>
            <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Setelah data terisi semua, tunggu beberapa saat untuk proses
                generate nomor antrian</p>
            </div>
            <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Booking selesai, nomor antrian dan detail antrian service muncul
                pada laman service</p>
            </div>
            <div class="d-flex align-items-center mb-3"><img class="me-sm-4 me-2" src="assets/img/manager/tick.png" width="35" alt="tick" />
              <p class="fw-medium mb-0 text-secondary">Datang sesuai dengan tanggal antrian, dan service kendaraan akan
                di lakukan sesuai dengan urutan nomor booking</p>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- <section> begin ============================-->
    <section class="py-md-11 py-8" id="register">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h1 class="fw-bold mb-4 fs-7">Registrasi Sekarang</h1>
            <p class="mb-5 text-info fw-medium">Isikan sesuai data dengan benar </p>
          </div>
          <div class="form-group">
            <form action="" method="post" enctype="multipart/form">
              <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff;">Identitas
                Diri</span>
              <hr class="cust-hr" style="border-top: 2px solid #2e74d6;">
              <div class="row">
                <div class="col-4">
                  <label for="">Nama Lengkap<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control col-lg-4" name="nama" placeholder="" required>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-4">
                  <label for="">Jenis Kelamin<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <div class="radio-inline">
                    <input type="radio" id="html" name="gender" value="1">
                    <label for="html">Laki-laki</label>
                    <input type="radio" id="css" name="gender" value="0">
                    <label for="css">Perempuan</label><br>
                  </div>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-4">
                  <label for="">Alamat<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control col-lg-4" name="alamat" placeholder="" required>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-4">
                  <label for="">No Handphone<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control col-lg-4" name="no_hp" placeholder="6289854xxxxx" required>
                </div>
              </div>
              <br><br>
              <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff;">Akses Login</span>
              <hr class="cust-hr" style="border-top: 2px solid #2e74d6;">

              <div class="row mt-4">
                <div class="col-4">
                  <label for="">Username<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control col-lg-4" name="username" placeholder="" required>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col-4">
                  <label for="">Password<span class="text-danger">*</span></label>
                </div>
                <div class="col-8">
                  <input type="password" class="form-control col-lg-4" name="password" placeholder="" required>
                </div>
              </div>

              <button type="submit" name="btnRegistrasi" class="btn btn-warning mt-6" style="float: right">Registrasi</button>

            </form>

          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->
    <section class="text-center py-0">

      <div class="container">
        <div class="container border-top py-3">
          <div class="row justify-content-between">
            <div class="col-12 col-md-auto mb-1 mb-md-0">
              <p class="mb-0">&copy; 2022 CV. Trijaya Motor </p>
            </div>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
</body>

</html>