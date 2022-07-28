<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertPerbaikan();
} elseif (isset($_POST['btnUbah'])) {
    updateBook();
} else {
    if (isset($_GET['kode'])) {
        deleteBook($_GET['kode']);
    }
}
