<?php
include_once("koneksi.php");
switch ($data_level) {
    case '1':
?>

        <!-- <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Perbaikan Selesai</button> -->
        <a href="?v=rekapitulasi" class="btn btn-block btn-gray-800 mb-3"><i class="fas fa-plus-square"></i> Perbaikan Selesai</a>
        <!-- Modal Content -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Data Rekap Perbaikan</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Atas Nama</th>
                            <th>Kendaraan</th>
                            <!-- <th>Keluhan</th> -->
                            <th>Tgl. Kedatangan</th>
                            <th>Tgl. Perbaikan</th>
                            <th>Biaya</th>
                            <th>Detail</th>
                            <th>Opsi</th>
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
                                <!-- <td><?= $data['keluhan'] ?></td> -->
                                <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
                                <td><?= date('d-M-Y', strtotime($data['is_clear'])) ?></td>
                                <td><?= 'Rp. ' . $data['total_perbaikan'] ?></td>
                                <td>
                                    <a href="?v=tambah_part&kode=<?php echo $data['id_perbaikan'] . "~" . $data['id_member'] . "~" . $data['id_brand'] ?>" class="btn btn-warning"><i class="fas fa-plus-square"></i> Part</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#adakdjakd" onclick="detailPerbaikan(this)" data-id="<?php echo $data['id_perbaikan'] . "~" . $data['id_antrian'] . "~" . $data['id_member'] . "~" . $data['id_karyawan'] . "~" . $data['total_perbaikan'] . "~" . $data['is_clear'] . "~" . $data['is_input'] . "~" . $data['tanggal'] . "~" . $data['keluhan'] . "~" . $data['nama'] . "~" . $data['no_hp'] . "~" . $data['nm_motor']  . "~" . $data['karyawan']  ?>" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                    <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#adakdjakd" onclick="editableBooking(this)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> -->
                                    <a href="?v=rekap_edit&kode=<?php echo $data['id_perbaikan']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <?php
                                    if ($data['status_antri'] == '1') {
                                    ?>
                                        <a href="?v=rekap_aksi&clear=<?php echo $data['id_perbaikan'] . "~" . $data['id_antrian'] . "~" . $data['id_member']; ?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                                    <?php
                                    }
                                    ?>
                                    <a href="?v=rekap_aksi&kode=<?php echo $data['id_perbaikan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    <?php
        break;
    case '2':
    ?>
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Booking Service</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Atas Nama</th>
                            <th>Kendaraan</th>
                            <th>Keluhan</th>
                            <th>Tgl. Kedatangan</th>
                            <th>Tgl. Booking</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = rekapservicemember();
                        $no = 1;
                        foreach ($a as $key => $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['nm_motor'] ?></td>
                                <td><?= $data['keluhan'] ?></td>
                                <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
                                <td><?= date('d-M-Y', strtotime($data['submitted'])) ?></td>
                                <td>
                                    <?php
                                    if ($data["status"] == '1') {
                                        echo '<button class="btn btn-warning btn-sm">Antrian</button>';
                                    } else {
                                        echo '<button class="btn btn-primary btn-sm">Selesai</button>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editBook" onclick="editableBookings(this)" data-id="<?php echo $data['id_antrian'] . "~" . $data['id_member'] . "~" . $data['no_antrian'] . "~" . $data['tanggal'] . "~" . $data['keluhan'] . "~" . $data['status'] . "~" . $data['nama'] . "~" . $data['nm_motor'] . "~" . $data['id'] . "~" . $data['id_motor']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="?v=book_aksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
<?php
        break;
}
?>


</body>


</html>

<div class="modal fade" id="adakdjakd" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Detail Booking</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?v=rekap_aksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <input type="hidden" name="id" id="detIdPerbaikan" class="form-control">
                        <input type="hidden" name="id_antri" id="detIdAntrian" class="form-control">
                        <input type="hidden" name="id_member" id="detIdMember" class="form-control">
                        <input type="text" class="form-control" name="member" id="detNama" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Kendaraan</label>
                        <input type="text" class="form-control" id="detMotor" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal" id="detTglDatang" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" cols="30" rows="3" id="detKeluhan" class="form-control" readonly></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Total Biaya</label>
                        <input type="text" class="form-control" id="detTotHarga" readonly>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="btnCetak" class="btn btn-secondary">Cetak Slip</button>
                </div>
            </form>
        </div>
    </div>
</div>