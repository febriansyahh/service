<?php

$con = new mysqli("localhost", "root", "", "bengkel");
if ($con->connect_error) {
    exit('Could not connect');
}

$id = $_GET['q'];

//get data informasi service

$sql = "SELECT a.id_antrian, a.id_member, a.no_antrian, a.tanggal, a.keluhan, b.nm_motor, c.nama, c.no_hp FROM antrian a, motor b, member c WHERE a.id_motor=b.id_motor AND a.id_member=c.id_member AND a.id_antrian ='$id' ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_row($result);

// get data part perbaikan
// $query = "SELECT * FROM `spare_part` WHERE `status` = '1' ";
// $part = mysqli_query($con, $query);

if ($id != 0) {
?>
    <span class="label label-info label-inline mr-2" style="font-size: 10px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:15%">Data Service</span>
    <hr class="cust-hr" style="border-top:4px solid #2e74d6;">

    <div class="row">
        <div class="col-6">
            <input type="hidden" name="id_antrian" value="<?= $data[0] ?>" class="form-control" readonly>
            <input type="hidden" name="id_antrian" value="<?= $data[1] ?>" class="form-control" readonly>
            <div class="form-group">
                <label for="">Nama Pemilik</label>
                <input type="text" value="<?= $data[6] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="">WhatsApp</label>
                <input type="text" value="<?= $data[7] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="">No Antrian</label>
                <input type="text" name="" value="<?= $data[2] ?>" class="form-control" readonly>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Keluhan</label>
        <input type="text" name="" value="<?= $data[4] ?>" class="form-control" readonly>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Kendaraan</label>
                <input type="text" name="" value="<?= $data[5] ?>" class="form-control" readonly>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="">Tgl. Antrian</label>
                <input type="text" name="" value="<?= date("d-m-Y", strtotime($data[3])) ?>" class="form-control" readonly>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="">Tgl. Perbaikan</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
        </div>
    </div>

    <!-- Data part yang digunakan -->


    <label for="">Part Perbaikan</label>

    <div class="input-group">
        <select class="custom-select form-control" id="inputGroupSelect04">
            <option selected>- Pilih -</option>
            <?php
            foreach ($part as $key => $value) {
                echo "<option value='" . $value["id_part"] . "'>" . $value["nm_part"] . " - " . $value["harga"] . "</option>";
            }
            ?>
        </select>
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="button" id="addpart">Tambah</button>
        </div>
    </div>



    <div class="modal-footer mt-3">
        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" name="btnSimpan" class="btn btn-secondary">Simpan</button>
    </div>

<?php
}
?>


<?php
mysqli_close($con);
