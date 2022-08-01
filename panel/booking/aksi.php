<?php
include_once("__DIR__ .  ../../koneksi.php");

if (isset($_POST['btnSimpan'])) {
    insertBook();
} elseif (isset($_POST['btnBook'])) {
    insertBooking();
} elseif (isset($_POST['btnUbah'])) {
    updateBook();
} else {
    if (isset($_GET['kode'])) {
        deleteBook($_GET['kode']);
    }
}

// if (isset($_POST['btnSimpan'])) {
//     insertBook();
// } elseif (isset($_POST['btnSelesai'])) {
//     clearBook();
// } elseif (isset($_POST['btnBook'])) {
//     insertBooking();
// } elseif (isset($_POST['btnUbah'])) {
//     updateBook();
// } else {
//     if (isset($_GET['kode'])) {
//         deleteBook($_GET['kode']);
//     }
// }
