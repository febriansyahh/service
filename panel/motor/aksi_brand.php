<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertBrand();
} elseif (isset($_POST['btnUbah'])) {
    updateBrand();
} else {
    if (isset($_GET['kode'])) {
        deleteBrand($_GET['kode']);
    }
}
