<?php
include_once("koneksi.php");
?>

<!-- Modal Content -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">Rekap Perbaikan Kendaraan</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="?v=book_aksi" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="">Member</label>
                    <select class="form-select" name="member" id="member" onchange="showMember(this.value)" aria-label="Default select example" required>
                        <option value="0" selected>Pilih</option>
                        <?php
                        $a = getmemberservice();
                        foreach ($a as $key => $value) {
                            echo "<option value='" . $value["id_antrian"] . "'>" . $value["nama"] . " - " . $value["nm_motor"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div id="service"></div>

                <!-- <div class="row">
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
                </div> -->
        </form>
    </div>
</div>
<!-- /.card-body -->


</body>


</html>