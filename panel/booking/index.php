<?php
include_once("koneksi.php");
switch ($data_level) {
    case '1':
?>
        <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Booking Service</button>
        <!-- Modal Content -->
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
                            <th>No WhatsApp</th>
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
                        $a = getBook();
                        $no = 1;
                        foreach ($a as $key => $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['no_hp'] ?></td>
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
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editBrand" onclick="editableBooking(this)" data-id="<?php echo $data['id_antrian'] . "~" . $data['id_member'] . "~" . $data['no_antrian'] . "~" . $data['tanggal'] . "~" . $data['keluhan'] . "~" . $data['status'] . "~" . $data['nama'] . "~" . $data['nm_motor'] . "~" . $data['id'] . "~" . $data['id_motor']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
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
    case '2':
    ?>
        <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-book"><i class="fas fa-plus-square"></i> Booking Service</button>
        <!-- Modal Content -->
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
                        $a = getBooking();
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
                                    <!-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editBook" onclick="editableBookings(this)" data-id="<?php echo $data['id_antrian'] . "~" . $data['id_member'] . "~" . $data['no_antrian'] . "~" . $data['tanggal'] . "~" . $data['keluhan'] . "~" . $data['status'] . "~" . $data['nama'] . "~" . $data['nm_motor']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a> -->
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

<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Booking Service</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?v=book_aksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <select class="form-select" name="member" aria-label="Default select example" required>
                            <option selected>Pilih</option>
                            <?php
                            $a = member();
                            foreach ($a as $key => $value) {
                                echo "<option value='" . $value["id_member"] . "'>" . $value["nama"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Brand Kendaraan</label>
                                <select class="form-select" name="brand" id="brand" onchange="showBrand(this.value)" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = brand();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id"] . "'>" . $value["nm_brand"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kendaraan</label>
                                <select class="form-select" name="motor" id="motor" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="btnSimpan" class="btn btn-secondary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editBrand" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Detail Booking</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?v=book_aksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <input type="hidden" name="id" id="editId" class="form-control">
                        <select class="form-select" name="member" id="editIdMember" aria-label="Default select example" required>
                            <option selected>Pilih</option>
                            <?php
                            $a = member();
                            foreach ($a as $key => $value) {
                                echo "<option value='" . $value["id_member"] . "'>" . $value["nama"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Brand Kendaraan</label>
                                <select class="form-select" name="brand" id="editIdBrands" onchange="showBrandss(this.value)" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = brand();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id"] . "'>" . $value["nm_brand"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kendaraan</label>
                                <select class="form-select" name="motor" id="editIdMotors" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = motor();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id_motor"] . "'>" . $value["nm_motor"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal" id="editTanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" cols="30" rows="3" id="editKeluhanBook" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="btnSelesai" class="btn btn-secondary">Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-book" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Booking Service</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?v=book_aksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <input type="hidden" name="id" value="<?= $data_idUser ?>" class="form-control">
                        <input type="text" name="id" value="<?= $data_nama ?>" class="form-control" readonly>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Brand Kendaraan</label>
                                <select class="form-select" name="brand" id="editIdBrand" onchange="showBrands(this.value)" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = brand();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id"] . "'>" . $value["nm_brand"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kendaraan</label>
                                <select class="form-select" name="motor" id="editIdMotor" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = motor();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id_motor"] . "'>" . $value["nm_motor"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal" id="editTanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" cols="30" rows="3" id="editKeluhanBook" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="btnBook" class="btn btn-secondary">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Edit Book Service</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="?v=book_aksi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <input type="hidden" name="id" value="<?= $data_idUser ?>" class="form-control">
                        <input type="text" name="id" value="<?= $data_nama ?>" class="form-control" readonly>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Brand Kendaraan</label>
                                <select class="form-select" name="brand" id="idBrands" onchange="showBrandss(this.value)" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = brand();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id"] . "'>" . $value["nm_brand"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kendaraan</label>
                                <select class="form-select" name="motor" id="idMotors" aria-label="Default select example" required>
                                    <option selected>Pilih</option>
                                    <?php
                                    $a = motor();
                                    foreach ($a as $key => $value) {
                                        echo "<option value='" . $value["id_motor"] . "'>" . $value["nm_motor"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Kendaraan</label>
                        <input type="date" class="form-control" name="tanggal" id="editTanggals" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Kedatangan</label>
                        <input type="date" class="form-control" name="tanggal" id="editTanggals" required>
                    </div>

                    <div class="form-group">
                        <label for="">Keluhan</label>
                        <textarea name="keluhan" cols="30" rows="3" id="editKeluhanBooks" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>