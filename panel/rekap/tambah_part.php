<?php
include_once("koneksi.php");
?>


<?php
$data = explode('~', $_GET['kode']);
$id_per = $data[0];
$member = $data[1];
$brand = $data[2];
?>
<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Tambah Part Perbaikan Kendaraan</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="?v=rekap_aksi" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" class="form-control" name="id_perbaikan" value="<?php echo $id_per ?>">
                <input type="hidden" class="form-control" name="id_member" value="<?php echo $member ?>">
                <!-- <input type="hidden" class="form-control" name="id_perbaikan" value="<?php echo $id_per ?>"> -->
            </div>
            <div class="row">
                <?php
                $a = partperbaikan($brand);
                foreach ($a as $value) {
                ?>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <label for=""><?= $value['nm_part'] ?> &nbsp;</label>
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" name="is_check" aria-label="Checkbox for following text input">
                            </div>
                            <input type="hidden" class="form-control" name="is_part[]" value="<?= $value['id_part']  ?>">
                            <input type="hidden" class="form-control" name="harga[]" value="<?= $value['harga'] ?>">
                            <input type="text" name="jumlah[]" class="form-control" value="0" aria-label="Text input with checkbox">
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="modal-footer mt-3">
                <a href="?v=rekap" class="btn btn-primary">Kembali</a>
                <button type="submit" name="btnTambah" class="btn btn-secondary">Tambah</button>
            </div>
        </form>
    </div>
</div>
<!-- /.card-body -->


</body>


</html>