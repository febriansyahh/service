<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertMotor();
} elseif (isset($_POST['btnUbah'])) {
    updateMotor();
} else {
    if (isset($_GET['kode'])) {
        deleteMotor($_GET['kode']);
    }
}
