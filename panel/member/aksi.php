<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertMember();
} elseif (isset($_POST['btnUbah'])) {
    updateMember();
} else {
    if (isset($_GET['kode'])) {
        deleteMember($_GET['kode']);
    }
}
