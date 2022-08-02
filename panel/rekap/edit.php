<?php
include_once("koneksi.php");
$id = $_GET['kode'];
?>

<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Rekap Perbaikan Kendaraan</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="?v=rekap_aksi" method="post" enctype="multipart/form-data">

            <div class="form-group mb-4">
                <span class="label label-info label-inline mr-2" style="font-size: 10px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:15%">Member</span>
                <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
                <?php
                $a = rekapedit($id);
                foreach ($a as $key => $value) {
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Member</label>
                                <input type="hidden" class="form-control" name="id_perbaikan" value="<?= $value['id_perbaikan'] ?>" readonly>
                                <input type="text" class="form-control" name="member" value="<?= $value['nama'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pelaksana</label>
                                <input type="text" class="form-control" name="nama_kar" value="<?= $value['nama_kar'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <span class="label label-info label-inline mr-2" style="font-size: 10px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:15%">Part perbaikan</span>
                <hr class="cust-hr" style="border-top:4px solid #2e74d6;">
                <div class="row">
                    <?php

                    $b = editpart($id);
                    foreach ($b as $key => $value) {
                    ?>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""><?= $value['nm_part'] ?> &nbsp;</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id[]" value="<?= $value['id']  ?>">
                                            <input type="hidden" class="form-control" name="is_part[]" value="<?= $value['id_part']  ?>">
                                            <input type="hidden" class="form-control" name="harga[]" value="<?= $value['harga'] ?>">
                                            <input type="text" name="jumlah[]" class="form-control" value="<?= $value['jumlah'] ?>" size="20">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.card-body -->


</body>


</html>