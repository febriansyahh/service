<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertPart();
} elseif (isset($_POST['btnUbah'])) {
    updatePart();
} else {
    if (isset($_GET['kode'])) {
        deletePart($_GET['kode']);
    }
}
