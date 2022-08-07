<?php
include_once("koneksi.php");
?>
<a href="panel/laporan/l_karyawan.php" target="_blank" class="btn btn-primary btn-sm mb-4">Cetak Laporan</a>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">Data Karyawan</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Jobdesk</th>
                    <th>Terdaftar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = karyawan();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td>
                            <?php if ($data['gender'] == '1') {
                                echo 'Pria';
                            } else {
                                echo 'Wanita';
                            } ?>
                        </td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['jobdesk'] ?></td>
                        <td><?= date('d-m-Y', strtotime($data['registered'])) ?></td>
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

    </body>


    </html>
