<?php
include_once("koneksi.php");
?>
<button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-plus-square"></i> Jobdesk</button>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h5 class="card-title">Jobdesk</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jobdesk</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = jobdesk();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['jobdesk'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editBrand" onclick="editableJobdesk(this)" data-id="<?php echo $data['id'] . "~" . $data['jobdesk'] . "~" . $data['keterangan']  ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="?v=jobdesk_aksi&kode=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Hapus</a>
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
                    <h2 class="h6 modal-title">Tambah Jobdesk</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=jobdesk_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Jobdesk</label>
                            <input type="text" name="jobdesk" id="" class="form-control" placeholder="Jobdesk Karyawan" required>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
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
                    <h2 class="h6 modal-title">Edit Jobdesk</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="?v=jobdesk_aksi" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Jobdesk</label>
                            <input type="hidden" name="id" id="editId" class="form-control">
                            <input type="text" name="jobdesk" id="editNm" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="editKet" cols="30" rows="3" class="form-control"></textarea>
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