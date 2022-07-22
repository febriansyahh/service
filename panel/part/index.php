<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Part Kendaraan</button>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">Part Kendaraan</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Part</th>
                    <th>Brand</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = part();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nm_part'] ?></td>
                        <td><?= $data['nm_brand'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?php
                            if ($data['status'] == '1') {
                                echo '<button class="btn btn-primary btn-sm">On Stok</button>';
                            } else {
                                echo '<button class="btn btn-danger btn-sm">Non Stok</button>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editMotor" onclick="editablePart(this)" data-id="<?php echo $data['id_part'] . "~" . $data['nm_part'] . "~" . $data['id_brand'] . "~" . $data['harga'] . "~" . $data['status']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="?v=part_aksi&kode=<?php echo $data['id_motor']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                    <h2 class="h6 modal-title">Tambah Part Kendaraan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=part_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Part</label>
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

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" id="" class="form-control" placeholder="Harga">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="1">Stok</option>
                                        <option value="0">Non Stok</option>
                                    </select>
                                </div>
                            </div>
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
                <form action="?v=part_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Part</label>
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

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" id="editHarga" class="form-control" placeholder="Harga">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-select" name="status" id="editStatus" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="1">Stok</option>
                                        <option value="0">Non Stok</option>
                                    </select>
                                </div>
                            </div>
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