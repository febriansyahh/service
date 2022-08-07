<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-print"></i> Pilih Cetak Data</button>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">Data Rekap Perbaikan</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Atas Nama</th>
                    <th>Kendaraan</th>
                    <th>Tgl. Kedatangan</th>
                    <th>Tgl. Perbaikan</th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = rekap_service_admin();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nm_motor'] ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= date('d-M-Y', strtotime($data['is_clear'])) ?></td>
                        <td><?= 'Rp. ' . $data['total_perbaikan'] ?></td>
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
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Pilih Tanggal Perbaikan Service</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="panel/laporan/l_rekap.php" method="post" enctype="multipart/form-data" target="_blank">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="tawal" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="takhir" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnCetak" class="btn btn-secondary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>