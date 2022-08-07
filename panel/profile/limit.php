<?php
include_once("koneksi.php");

if (isset($_POST['btnUbah'])) {

    global $con;
    $limit = $_POST['limit'];


    if ($limit == '' || $limit == 0) {
        echo "<script>alert('Jumlah Batasan Perhari tidak boleh kosong !')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=limit'>";
    }else{
        $sql = "UPDATE limit_antri SET limit_antri = '". $_POST['limit'] ."' WHERE id = '". $_POST['id']."'";
        $queryy = mysqli_query($con, $sql);
        if ($queryy) {
            echo "<script>alert('Jumlah Batasan Perhari berhasil diubah !')</script>";
            echo "<meta http-equiv='refresh' content='0; url=panel.php?v=limit'>";
        }
    }
}
?>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">

        <h4 class="card-title">Limit Antrian Perhari</h4>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jumlah Limit Antrian</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = limit();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['limit_antri'] ?></td>
                        <td>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editMotor" onclick="editableLimit(this)" data-id="<?php echo $data['id'] . "~" . $data['limit_antri'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
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

    <div class="modal fade" id="editMotor" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Edit Limit Service Perhari</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Limit Perhari</label>
                            <input type="hidden" name="id" id="editId" class="form-control" placeholder="Rute">
                            <input type="text" name="limit" id="editLimit" class="form-control">
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