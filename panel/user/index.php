<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> User Sistem</button>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">User Pengguna</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Terdaftar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = user();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['username'] ?></td>
                        <td>
                            <?php if ($data['level'] == '1') {
                                echo 'Administrator';
                            } else {
                                echo 'Member/Pengguna';
                            } ?>
                        </td>
                        <td>
                            <?php if ($data['actived'] == '1') {
                                echo '<button class="btn btn-primary btn-sm">Aktif</button>';
                            } else {
                                echo '<button class="btn btn-danger btn-sm">Non Aktif</button>';
                            } ?>
                        </td>
                        <td><?= date('d-m-Y', strtotime($data['registered'])) ?></td>
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editPass" onclick="editablePass(this)" data-id="<?php echo $data['id_user'] . "~" . $data['nama'] . "~" . $data['username'] . "~" . $data['password'] . "~" . $data['actived']  ?>" class="btn btn-danger btn-sm"><i class="fas fa-key"></i> Reset</a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editMember" onclick="editableUser(this)" data-id="<?php echo $data['id_user'] . "~" . $data['id_person'] . "~" . $data['nama'] . "~" . $data['username'] . "~" . $data['password'] . "~" . $data['actived']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="?v=user_aksi&kode=<?php echo $data['id_user']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                    <h2 class="h6 modal-title">Tambah User Baru</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=user_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <span class="label label-info label-inline mr-2" style="font-size: 13px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #eeb15d; color: #000">Identitas
                            Diri</span>
                        <hr class=" cust-hr" style="border-top: 2px solid #2e74d6;">
                        <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <select name="idperson" class="form-select" aria-label="Default select example" required>
                                <option selected>Pilih</option>
                                <?php
                                $a = getMemberinuser();
                                foreach ($a as $key => $value) {
                                    echo "<option value='" . $value["id_karyawan"] . " - " . $value["nama"] . "'>" . $value["nama"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" id="" class="form-control" placeholder="Username Login" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" id="" class="form-control" required>
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

    <div class="modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Reset Password User</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=user_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="hidden" name="id" id="resId" class="form-control">
                            <input type="hidden" name="pass_old" id="resPass" class="form-control">
                            <input type="text" name="nama" id="resNama" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="resUsername" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="btnReset" class="btn btn-secondary">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMember" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Data User</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=user_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            <input type="hidden" name="id" id="editId" class="form-control">
                            <input type="hidden" name="id_person" id="editIdPerson" class="form-control">
                            <input type="text" name="nama" id="editNama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="editUsername" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Status Aktif</label>
                            <select name="actived" id="editActived" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                            <!-- <input type="text" name="username" id="editusername" class="form-control"> -->
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