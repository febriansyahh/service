<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertJobdesk();
} elseif (isset($_POST['btnUbah'])) {
    updateJobdesk();
} else {
    if (isset($_GET['kode'])) {
        deleteJobdesk($_GET['kode']);
    }
}
