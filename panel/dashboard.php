<?php
$antrian = c_antrian();
$antrian_clear = c_antrianclear();
$member = c_member();
$kar = c_karyawan();
?>
<?php
switch ($data_level) {
    case '0':
?>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Antrian</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $antrian ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Antrian</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $antrian ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    <?php
                                    echo date("d-m-Y");
                                    ?>
                                </small>
                                <div class="small d-flex mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">Member</h2>
                                    <h3 class="mb-1"><?= $member ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Member</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $member ?></h3>
                                </div>
                                <small class="text-gray-500">
                                    Feb 1 - Apr 1
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5"> Karyawan</h2>
                                    <h3 class="mb-1"><?= $kar ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Karyawan</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $kar ?></h3>
                                </div>
                                <small class="text-gray-500">
                                    Feb 1 - Apr 1
                                </small>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="card mt-4">
                <h5 class="text-center mt-4 mb-3" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SELAMAT DATANG DI PANEL ADMIN</b></h5>
                <h5 class="text-center mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SISTEM INFORMASI BOOKING SERVICE </b></h5>
                <!-- <center>
                    <img src="assets/img/admin.png" alt="Admin" style="width:200px; height:200px;" class="mb-4">
                </center> -->
            </div>

            <!-- <div class="form-group mt-5">
                <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%">Pelaporan Terbaru</span>
                <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
            </div> -->

        </div>

    <?php
        break;

    case '1':
    ?>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Antrian</h2>
                                    <h3 class="fw-extrabold mb-1"><?= $antrian ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Antrian</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $antrian ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    <?php
                                    echo date("d-m-Y");
                                    ?>
                                </small>
                                <div class="small d-flex mt-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">Member</h2>
                                    <h3 class="mb-1"><?= $member ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Member</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $member ?></h3>
                                </div>
                                <small class="text-gray-500">
                                    Feb 1 - Apr 1
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5"> Karyawan</h2>
                                    <h3 class="mb-1"><?= $kar ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Karyawan</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $kar ?></h3>
                                </div>
                                <small class="text-gray-500">
                                    Feb 1 - Apr 1
                                </small>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="card mt-4">
                <h5 class="text-center mt-4 mb-3" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SELAMAT DATANG DI PANEL ADMIN</b></h5>
                <h5 class="text-center mb-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif;"><b>SISTEM INFORMASI BOOKING SERVICE </b></h5>
                <!-- <center>
                    <img src="assets/img/admin.png" alt="Admin" style="width:200px; height:200px;" class="mb-4">
                </center> -->
            </div>

            <!-- <div class="form-group mt-5">
                <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%">Pelaporan Terbaru</span>
                <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
            </div> -->

        </div>
    <?php
        break;
    case '2':
    ?>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5">Jumlah Antrian</h2>
                                    <h3 class="mb-1"><?= $antrian ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0">Jumlah Antrian</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $antrian ?></h3>
                                </div>
                                <small class="d-flex align-items-center text-gray-500">
                                    <?= date("d-M-Y") ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-6 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="fw-extrabold h5"> Antrian Selesai</h2>
                                    <h3 class="mb-1"><?= $antrian_clear ?></h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0"> Antrian Selesai</h2>
                                    <h3 class="fw-extrabold mb-2"><?= $antrian_clear ?></h3>
                                </div>
                                <small class="text-gray-500">
                                    <?= date("d-M-Y") ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group mt-5">
                <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%">Data Booking Anda</span>
                <hr class="cust-hr" style="border-top:4px solid #2e74d6;">

                <?php
                $an = mysqli_fetch_row(no_antrian());
                if (is_null($an)) {
                ?>
                    <div class="card">
                        <div class="row">
                            <div class="fporm-group">
                                <h4 class="text-center mt-3 mb-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">No Antrian Anda</h4>

                                <h1 class="text-center mt-3 mb-4" style="font-size:58px"><b>-</b></h1>
                                <p class="text-center mt-2 mb-3" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><b>Maaf anda belum memiliki no antrian</b></p>

                            </div>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="card">
                        <div class="row">
                            <div class="col-4">
                                <h4 class="text-center mt-3 mb-4" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">No Antrian Anda</h4>
                                <h1 class="text-center mt-3 mb-3" style="font-size:58px"><b><?= $an[0]; ?></b></h1><br>
                                <p class="text-center mb-3" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><b><?= date("d-m-Y", strtotime($an[1])) ?></b></p>
                            </div>

                            <!-- Garis tengah -->
                            <div class="col-2 vl">
                            </div>

                            <div class="col-6">
                                <h4 class="text-center mt-3 mb-3" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Dandi Jaya Motor</h4>
                                <table style="width:100%" class="mb-3 mt-2">
                                    <?php
                                    $data_antri = mysqli_fetch_row(data_antrian());
                                    ?>

                                    <tr>
                                        <td style="width:120px;"><b>Nama</b></td>
                                        <td style="width:20px">:</td>
                                        <td><?= $data_antri[10] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kendaraan</b></td>
                                        <td>:</td>
                                        <td><?= $data_antri[9] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl. Booking</b></td>
                                        <td>:</td>
                                        <td><?= date('d-M-Y', strtotime($data_antri[4])) ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Keluhan</b></td>
                                        <td>:</td>
                                        <td><?= $data_antri[5] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl. Pesan</b></td>
                                        <td>:</td>
                                        <td><?= date('d-M-Y', strtotime($data_antri[7])) ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
<?php
        break;
}
?>