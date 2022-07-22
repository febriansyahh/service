<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Data Kendaraan</button>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">Data Kendaraan</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kendaraan</th>
                    <th>Brand</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = motor();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nm_motor'] ?></td>
                        <td><?= $data['nm_brand'] ?></td>
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editMotor" onclick="editableMotor(this)" data-id="<?php echo $data['id_motor'] . "~" . $data['nm_motor'] . "~" . $data['id_brand'] . "~" . $data['nm_brand']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="?v=motor_aksi&kode=<?php echo $data['id_motor']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
                        </td>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Data Kendaraan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=motor_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Kendaraan</label>
                            <input type="text" name="nama" id="" class="form-control" placeholder="Nama Kendaraan" required>
                        </div>

                        <div class="form-group">
                            <label for="">Brand</label>
                            <select class="form-select" name="brand" aria-label="Default select example">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnSimpan" class="btn btn-secondary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMotor" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Kendaraan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=motor_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Kendaraan</label>
                            <input type="hidden" name="id" id="editId" class="form-control" placeholder="Rute">
                            <input type="text" name="nama" id="editNm" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Brand</label>
                            <select class="form-select" name="brand" id="editidBrand" aria-label="Default select example">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnUbah" class="btn btn-secondary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>