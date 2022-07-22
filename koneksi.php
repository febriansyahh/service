<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'bengkel');

define('SITE_ROOT', realpath(dirname(__FILE__)));

$con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');

function Registrasi()
{
    global $con;

    $idperson = "SELECT `AUTO_INCREMENT` as id_member FROM INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'bengkel' AND TABLE_NAME = 'member' ";
    $querys = mysqli_query($con, $idperson);
    $rows = mysqli_fetch_row($querys);
    $idmember = $rows[0];

    $date = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `member`(`nama`, `gender`, `alamat`, `no_hp`, `registered`) VALUES(
                    '" . $_POST['nama'] . "',
                    '" . $_POST['gender'] . "',
                    '" . $_POST['alamat'] . "',
                    '" . $_POST['no_hp'] . "',
                    '" . $date . "')";
    $query_insert = mysqli_query($con, $sql) or die(mysqli_connect_error());


    $password = md5($_POST['password']);
    $sql_insert = "INSERT INTO `user`(`nama`, `username`, `password`, `id_person`, `level`, `actived`, `registered`) VALUES(
                    '" . $_POST['nama'] . "',
                    '" . $_POST['username'] . "',
                    '" . $password . "',
                    '$idmember',
                    '1',
                    '1',
                    '" . $date . "')";
    $query_inserts = mysqli_query($con, $sql_insert) or die(mysqli_connect_error());

    if ($query_insert && $query_inserts) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}

function LoginUser()
{
    global $con;
    $password = md5($_POST['password']);
    $sql_login = "SELECT * FROM `user` WHERE `actived`='1' AND `username`='" . $_POST['username'] . "' AND `password`='" . $password . "'";
    $query_login = mysqli_query($con, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);

    if ($jumlah_login >= 1) {
        session_start();
        $_SESSION["ses_username"] = $data_login["username"];
        $_SESSION["ses_nama"] = $data_login["nama"];
        $_SESSION["ses_level"] = $data_login["level"];
        $_SESSION["ses_id_person"] = $data_login['id_person'];
        $_SESSION["ses_id_user"] = $data_login['id_user'];
        
        // echo "<script>alert('Login Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php'>";
    } else {
        echo "<script>alert('Login Gagal!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=sign-in.php'>";
    }
}

function get_antrian()
{
    global $con;
    $now = date('Y-m-d');

    $sql = "SELECT COUNT(`id_antrian`) as antrian FROM `antrian` WHERE `tanggal` = '$now' ";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($query);
    $antrian = $rows[0];

    return $antrian;
}

function no_antrian()
{
    global $con;

    $sql = "SELECT `no_antrian`, `tanggal` FROM `antrian` WHERE `status` = '1' AND `id_member` = '". $_SESSION["ses_id_person"] ."'  ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function data_antrian()
{
    global $con;
    $sql = "SELECT a.*, b.nm_motor, c.nama FROM antrian a, motor b, member c WHERE a.id_motor=b.id_motor AND a.id_member=c.id_member AND a.status='1' AND a.id_member  = '" . $_SESSION["ses_id_person"] . "' ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function c_antrian()
{
    global $con;
    $now = date('Y-m-d');
    
    $sql = "SELECT COUNT(`id_antrian`) as antrian FROM `antrian` WHERE `tanggal` = '$now' ";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($query);
    $antrian = $rows[0];

    return $antrian;
}

function c_antrianclear()
{
    global $con;
    $now = date('Y-m-d');
    
    $sql = "SELECT COUNT(`id_antrian`) as antrian FROM `antrian` WHERE `tanggal` = '$now' AND `status` = '2' ";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($query);
    $antrian = $rows[0];

    return $antrian;
}

function c_member()
{
    global $con;

    $sql = "SELECT COUNT(`id_member`) as member FROM `member` ";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($query);
    $member = $rows[0];

    return $member;
}

function c_karyawan()
{
    global $con;

    $sql = "SELECT COUNT(`id_karyawan`) as kar FROM `karyawan` ";
    $query = mysqli_query($con, $sql);
    $rows = mysqli_fetch_row($query);
    $member = $rows[0];

    return $member;
}

function brand()
{
    global $con;
    $sql = "SELECT * FROM brand";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertBrand()
{
    global $con;
    $sql = "INSERT INTO `brand`(`nm_brand`) VALUES (
        '" . $_POST['brand'] . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    }
}

function updateBrand()
{
    global $con;
    $sql = "UPDATE brand SET nm_brand = '" . $_POST['nama'] . "' WHERE id = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    }
}

function deleteBrand($id)
{
    global $con;

    $sql = "DELETE FROM brand WHERE id = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=brand'>";
    }
}

function motor()
{
    global $con;
    $sql = "SELECT * FROM motor a, brand b WHERE a.id_brand=b.id";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertMotor()
{
    global $con;
    $sql = "INSERT INTO `motor`(`id_brand`, `nm_motor`) VALUES (
        '" . $_POST['brand'] . "',
        '" . $_POST['nama'] . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    }
}

function updateMotor()
{
    global $con;
    $sql = "UPDATE motor SET 
    id_brand = '" . $_POST['brand'] . "',  
    nm_motor = '" . $_POST['nama'] . "'
    WHERE id_motor = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    }
}

function deleteMotor($id)
{
    global $con;

    $sql = "DELETE FROM motor WHERE id_motor = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=motor'>";
    }
}

function part()
{
    global $con;
    $sql = "SELECT * FROM spare_part a, brand b WHERE a.id_brand=b.id";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertPart()
{
    global $con;
    $sql = "INSERT INTO `spare_part`(`nm_part`,`id_brand`, `harga`, `status`) VALUES (
        '" . $_POST['nama'] . "',
        '" . $_POST['brand'] . "',
        '" . $_POST['harga'] . "',
        '" . $_POST['status'] . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());

    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    }
}

function updatePart()
{
    global $con;
    $sql = "UPDATE spare_part SET 
    nm_part = '" . $_POST['nama'] . "',  
    id_brand = '" . $_POST['brand'] . "',  
    harga = '" . $_POST['harga'] . "',
    status = '" . $_POST['status'] . "'
    WHERE id_part = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    }
}

function deletePart($id)
{
    global $con;

    $sql = "DELETE FROM spare_part WHERE id_part = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=part'>";
    }
}

function member()
{
    global $con;
    $sql = "SELECT * FROM member";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertMember()
{
    global $con;
    $date = date("Y-m-d H:i:s");

    $idperson = "SELECT `AUTO_INCREMENT` as id_member FROM INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'bengkel' AND TABLE_NAME = 'member' ";
    $querys = mysqli_query($con, $idperson);
    $rows = mysqli_fetch_row($querys);
    $idmember = $rows[0];

    $sql = "INSERT INTO `member`(`nama`,`gender`, `alamat`, `no_hp`, `registered`) VALUES (
        '" . $_POST['nama'] . "',
        '" . $_POST['gender'] . "',
        '" . $_POST['alamat'] . "',
        '" . $_POST['nohp'] . "',
        '" . $date . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


    $sqls = "INSERT INTO `user`(`nama`,`username`, `password`, `id_person`, `level`, `actived`, `registered`) VALUES (
        '" . $_POST['nama'] . "',
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $idmember . "',
        '2',
        '1',
        '" . $date . "'
    )";
    $query_user = mysqli_query($con, $sqls) or die(mysqli_connect_error());

    if ($query && $query_user) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    }
}

function updateMember()
{
    global $con;
    $sql = "UPDATE member SET 
    nama = '" . $_POST['nama'] . "',  
    gender = '" . $_POST['gender'] . "',  
    alamat = '" . $_POST['alamat'] . "',
    no_hp = '" . $_POST['nohp'] . "'
    WHERE id_member = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    }
}

function deleteMember($id)
{
    global $con;

    $sql = "DELETE FROM member WHERE id_member = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=member'>";
    }
}

function jobdesk()
{
    global $con;
    $sql = "SELECT * FROM jobdesk";
    $query = mysqli_query($con, $sql);
    return $query;
}

function karyawan()
{
    global $con;
    $sql = "SELECT * FROM karyawan a, jobdesk b WHERE a.id_jobdesk=b.id ORDER BY a.nama ASC";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertKaryawan()
{
    global $con;
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `karyawan`(`nama`,`gender`, `alamat`, `id_jobdesk`, `is_status`,`registered`) VALUES (
        '" . $_POST['nama'] . "',
        '" . $_POST['gender'] . "',
        '" . $_POST['alamat'] . "',
        '" . $_POST['jobdesk'] . "',
        '1',
        '" . $date . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    }
}

function updateKaryawan()
{
    global $con;
    $sql = "UPDATE karyawan SET 
    nama = '" . $_POST['nama'] . "',  
    gender = '" . $_POST['gender'] . "',  
    alamat = '" . $_POST['alamat'] . "',
    is_status = '" . $_POST['status'] . "',
    id_jobdesk = '" . $_POST['jobdesk'] . "'
    WHERE id_karyawan = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    }
}

function deleteKaryawan($id)
{
    global $con;

    $sql = "DELETE FROM karyawan WHERE id_karyawan = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=karyawan'>";
    }
}

function insertJobdesk()
{
    global $con;
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `jobdesk`(`jobdesk`,`keterangan`) VALUES (
        '" . $_POST['jobdesk'] . "',
        '" . $_POST['keterangan'] . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    }
}

function updateJobdesk()
{
    global $con;
    $sql = "UPDATE jobdesk SET 
    jobdesk = '" . $_POST['jobdesk'] . "',  
    keterangan = '" . $_POST['keterangan'] . "'
    WHERE id = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    }
}

function deleteJobdesk($id)
{
    global $con;

    $sql = "DELETE FROM jobdesk WHERE id = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=jobdesk'>";
    }
}


function getBook()
{
    global $con;
    $sql = "SELECT a.*, c.nama, c.no_hp, b.id_motor, b.nm_motor, d.id, d.nm_brand FROM antrian a, motor b, member c, brand d WHERE a.id_motor=b.id_motor AND a.id_member=c.id_member AND b.id_brand=d.id AND a.status='1' ORDER BY a.tanggal, a.no_antrian ASC";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getBooking()
{
    global $con;
    $id_member = $_SESSION["ses_id_person"];

    $sql = "SELECT a.*, c.nama, c.no_hp, b.id_motor, b.nm_motor, d.id, d.nm_brand FROM antrian a, motor b, member c, brand d WHERE a.id_motor=b.id_motor AND a.id_member=c.id_member AND b.id_brand=d.id AND a.status='1' AND a.id_member='$id_member' ORDER BY a.tanggal, a.no_antrian ASC";
    $query = mysqli_query($con, $sql);
    return $query;
}

function insertBook()
{
    global $con;
    
    $tgl = date("Y-m-d");
    $date = date("Y-m-d H:i:s");
    // $post_date = $_POST['tanggal'];

    // $cek = "SELECT COUNT(`no_antrian`) as hitung FROM `antrian` WHERE `tanggal` = '$post_date' ";
    $cek = "SELECT COUNT(`no_antrian`) as hitung FROM `antrian` WHERE `tanggal` = '$tgl' ";
    $cekquery = mysqli_query($con, $cek);
    $rows = mysqli_fetch_row($cekquery);
    $noantrian = $rows[0] + 1;

    $sql = "INSERT INTO `antrian` (`id_member`, `id_motor`, `no_antrian`, `tanggal`, `keluhan`, `status`, `submitted`) VALUES (
        '" . $_POST['member'] . "',
        '" . $_POST['motor'] . "',
        '" . $noantrian . "',
        '" . $_POST['tanggal'] . "',
        '" . $_POST['keluhan'] . "',
        '1',
        '" . $date . "'
    )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    }
}

function insertBooking()
{
    global $con;

    $tgl = date("Y-m-d");
    $date = date("Y-m-d H:i:s");

    $id_member = $_SESSION["ses_id_person"];

    $is_cek = "SELECT `id_antrian` FROM `antrian` WHERE id_member = '$id_member' AND `status` = '1'  ORDER BY `id_antrian` DESC";
    $query_iscek = mysqli_query($con, $is_cek);
    $cek_isnull = mysqli_fetch_row($query_iscek);

    if (is_null($cek_isnull)) {

        $post_date = $_POST['tanggal'];
        $cek = "SELECT COUNT(`no_antrian`) as hitung FROM `antrian` WHERE `tanggal` = '$post_date' ";
        $cekquery = mysqli_query($con, $cek);
        $rows = mysqli_fetch_row($cekquery);
        $noantrian = $rows[0] + 1;


        $sql = "INSERT INTO `antrian`(`id_member`, `id_motor`, `no_antrian`, `tanggal`, `keluhan`, `status`, `submitted`) VALUES (
        '" . $_SESSION["ses_id_person"] . "',
        '" . $_POST['motor'] . "',
        '" . $noantrian . "',
        '" . $_POST['tanggal'] . "',
        '" . $_POST['keluhan'] . "',
        '1',
        '" . $date . "')";
        $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


        if ($query) {
            echo "<script>alert('Booking Service Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
        } else {
            echo "<script>alert('Booking Service Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
        }
    }else{
        echo "<script>alert('Data booking anda sudah ada, Lakukan booking kembali setelah antrian selesai')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    }

}

// function clearBook()
// {
//     global $con;
//     $date = date("Y-m-d H:i:s");

//     $sql = "UPDATE `antrian` SET 
//     `status` = '2',
//     `clear_at` = '$date'
//     WHERE `id_antrian` = '" . $_POST['id'] . "' ";
//     $query_ubah = mysqli_query($con, $sql);

//     if ($query_ubah) {
//         echo "<script>alert('Konfirmasi Berhasil')</script>";
//         echo "<meta http-equiv='refresh' content='0; url=panel.php?v=rekap'>";
//     } else {
//         echo "<script>alert('Konfirmasi Gagal')</script>";
//         echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
//     }
// }

function clearBook()
{
    global $con;
    $date = date("Y-m-d H:i:s");

    $member = $_POST['member'];
    $id = $_POST['id'];
    $sql_no = "SELECT no_hp FROM member WHERE id_member = '$member'";
    $query_no = mysqli_query($con, $sql_no);

    $cek = "SELECT * FROM `antrian` WHERE `id_member` = '$id'";
    $query = mysqli_query($con, $cek);
    $row = mysqli_fetch_row($query);

    $textt = "Kepada member bengkel Dandi Motor Jaya, antrian service motor anda dengan detail data :";
    $rplc = str_replace(' ', '%20', $textt);

    foreach ($query_no as $value) {
        $curl = curl_init();

        $noWa = $value['noWa'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=BVHKMPMKEXZZ0O0GHO2T&number=$noWa&text=$rplc",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $sql = "UPDATE `antrian` SET 
            `status` = '2',
            `clear_at` = '$date'
            WHERE `id_antrian` = '" . $_POST['id'] . "' ";
            $query_ubah = mysqli_query($con, $sql);

            $query_validasi = mysqli_query($con, $query_ubah);

            if ($query_validasi) {
                echo "<script>alert('Validasi Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
            } else {
                echo "<script>alert('Validasi Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
            }
        }
    }
}

function updateBook()
{
    global $con;
    $sql = "UPDATE antrian SET 
    id_motor = '" . $_POST['motor'] . "',  
    tanggal = '" . $_POST['tanggal'] . "',  
    keluhan = '" . $_POST['keluhan'] . "'
    WHERE id_antrian = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    }
}

function deleteBook($id)
{
    global $con;

    $sql = "DELETE FROM antrian WHERE id_antrian = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=book'>";
    }
}

function profile()
{
    global $con;

    $id_member = $_SESSION["ses_id_person"];

    $sql = "SELECT * FROM member a, user b WHERE a.id_member=b.id_person AND a.id_member = '$id_member' ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function rekap_service_admin()
{
    global $con;
    $sql = "SELECT  a.*, b.tanggal, b.keluhan, d.nama, d.no_hp, c.nm_motor, e.nama FROM perbaikan a, antrian b, motor c, member d, karyawan e WHERE a.id_antrian=b.id_antrian AND b.id_motor=c.id_motor AND b.id_member=d.id_member AND  a.id_karyawan=e.id_karyawan";
    $query = mysqli_query($con, $sql);
    return $query;
}

function rekapservicemember()
{
    global $con;
    $id_member = $_SESSION["ses_id_person"];

    $sql = "SELECT  a.*, b.tanggal, b.keluhan, d.nama, d.no_hp, c.nm_motor, e.nama FROM perbaikan a, antrian b, motor c, member d, karyawan e WHERE a.id_antrian=b.id_antrian AND b.id_motor=c.id_motor AND b.id_member=d.id_member AND a.id_karyawan=e.id_karyawan AND d.id_member = '$id_member'";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getmemberservice()
{
    global $con;
    $sql = "SELECT a.id_antrian, a.id_member, a.no_antrian, b.nm_motor, c.nama FROM antrian a, motor b, member c WHERE a.id_motor=b.id_motor AND a.id_member=c.id_member AND a.status='1'";
    $query = mysqli_query($con, $sql);
    return $query;
}


function getkaryawan()
{
    global $con;
    $sql = "SELECT * FROM karyawan a, jobdesk b WHERE a.id_jobdesk=b.id AND b.jobdesk != 'Administrator' ORDER BY a.nama ASC";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getpart()
{
    global $con;
    $sql = "SELECT * FROM `spare_part` WHERE `status` = '1' ";
    $query = mysqli_query($con, $sql);
    return $query;
}

function user()
{
    global $con;
    $sql = "SELECT * FROM user";
    $query = mysqli_query($con, $sql);
    return $query;
}

function getMemberinuser()
{
    global $con;
    $sql = "SELECT * FROM `karyawan` WHERE `id_karyawan` NOT IN (SELECT `id_person` FROM `user` WHERE `level`='1') AND `is_status` ='1' AND `id_jobdesk` = '2'";
    $query = mysqli_query($con, $sql);
    return $query;
}



function insertUser()
{
    global $con;
    $date = date("Y-m-d H:i:s");
    $idp = explode("-", $_POST['idperson']);
    
    $id_person = $idp[0];
    $nama = $idp[1];

    $password = md5($_POST['password']);
    $sql = "INSERT INTO `user`(`nama`,`username`,`password`, `id_person`, `level`, `actived`,`registered`) VALUES (
        '" . $nama . "',
        '" . $_POST['username'] . "',
        '" . $password . "',
        '" . $id_person . "',
        '1',
        '1',
        '" . $date . "'
    )";
    
    // $password = $_POST['password'];
    // $sql = "INSERT INTO `user`(`nama`,`username`,`password`, `id_person`, `level`, `actived`,`registered`) VALUES (
    //     '" . $nama . "',
    //     '" . $_POST['username'] . "',
    //     '" . $password . "',
    //     '" . $id_person . "',
    //     '1',
    //     '1',
    //     '" . $date . "'
    // )";
    $query = mysqli_query($con, $sql) or die(mysqli_connect_error());


    if ($query) {
        echo "<script>alert('Simpan Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    } else {
        echo "<script>alert('Simpan Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    }
}

function updateUser()
{
    global $con;
    $sql = "UPDATE user SET 
    nama = '" . $_POST['nama'] . "',  
    username = '" . $_POST['username'] . "',  
    actived = '" . $_POST['alamat'] . "'
    WHERE id_user = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    }
}

function resetPassword()
{
    global $con;
    $password = md5($_POST['password']);

    $sql = "UPDATE `user` SET 
    `password` = '" . $password . "'
    WHERE `id_user` = '" . $_POST['id'] . "' ";
    $query_ubah = mysqli_query($con, $sql);

    // $sql = "UPDATE `user` SET 
    // `password` = '" . $_POST['password'] . "'
    // WHERE `id_user` = '" . $_POST['id'] . "' ";
    // $query_ubah = mysqli_query($con, $sql);

    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    } else {
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    }
}

function deleteUser($id)
{
    global $con;

    $sql = "DELETE FROM user WHERE id_user = '$id' ";
    $query_delete = mysqli_query($con, $sql);

    if ($query_delete) {
        echo "<script>alert('Hapus Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    } else {
        echo "<script>alert('Hapus Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=panel.php?v=user'>";
    }
}
