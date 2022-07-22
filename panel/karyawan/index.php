<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Data Karyawan</button>
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
                    <th>Opsi</th>
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
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editMember" onclick="editablekaryawan(this)" data-id="<?php echo $data['id_karyawan'] . "~" . $data['nama'] . "~" . $data['gender'] . "~" . $data['alamat'] . "~" . $data['id_jobdesk'] . "~" . $data['registered'] . "~" . $data['is_status'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="?v=karyawan_aksi&kode=<?php echo $data['id_karyawan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tambah Karyawan Baru</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=karyawan_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" id="" class="form-control" placeholder="Nama Lengkap Anda" required>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="gender" class="form-select" aria-label="Default select example" required>
                                        <option selected>Pilih</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jobdesk</label>
                                    <select class="form-select" name="jobdesk" aria-label="Default select example" required>
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = jobdesk();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id"] . "'>" . $value["jobdesk"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="2" class="form-control" required></textarea>
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

    <div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data Karyawan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=karyawan_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama lengkap</label>
                            <input type="hidden" name="id" id="editId" class="form-control" placeholder="Rute">
                            <input type="text" name="nama" id="editNm" class="form-control" placeholder="Nama Lengkap Anda">
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="gender" class="form-select" id="editGender" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Jobdesk</label>
                                    <select class="form-select" name="jobdesk" id="editIdJob" aria-label="Default select example" required>
                                        <option selected>Pilih</option>
                                        <?php
                                        $a = jobdesk();
                                        foreach ($a as $key => $value) {
                                            echo "<option value='" . $value["id"] . "'>" . $value["jobdesk"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="editAlamat" cols="30" rows="2" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="editStatus" class="form-select">
                                <option selected>Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
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