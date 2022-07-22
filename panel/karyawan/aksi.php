<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertKaryawan();
} elseif (isset($_POST['btnUbah'])) {
    updateKaryawan();
} else {
    if (isset($_GET['kode'])) {
        deleteKaryawan($_GET['kode']);
    }
}
