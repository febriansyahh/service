<?php
include "../../koneksi.php";
$tgawal = $_POST['tawal'];
$tgakhir = $_POST['takhir'];
// $total = $value["total_perbaikan"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Member</title>
    <link rel="icon" href="../dist/img/print.jpg">
</head>

<body>

    <center>
        <table border="0" cellspacing="0" style="width: 100%">

            <tr class="mt-4" align="center">
                <th>
                    <img src="../../assets/img/groupe.png" width="20%" />
                    <br>
                    <h5>Jl. Lingkar Utara UMK Gang 11, Kepyar, Dersalam <br class="mt-2"> 082 226 278 896</h5>
                </th>
            </tr>



        </table>


        <table border="1" cellspacing="0" style="width: 100%">
            <thead>
                <tr>

                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>No WhatsApp</th>
                    <th>Tgl. Registrasi</th>

                </tr><br><br>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $a = lmember($tgawal, $tgakhir);
                foreach ($a as $key => $value) {
                ?>
                <tr align="center">
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $value["nama"] ?>
                        </td>
                        <td>
                            <?php 
                            if ($value["gender"] == '1') {
                                echo 'Pria';
                            }else{
                                echo 'Wanita';
                            }
                             ?>
                        </td>
                        <td>
                            <?php echo $value["alamat"] ?>
                        </td>
                        <td>
                            <?php echo $value["no_hp"] ?>
                        </td>
                        <td>
                            <?php echo date("d-M-Y", strtotime($value["registered"])) ?>
                        </td>
                    </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
        <br>
        <br>
        <table class="mt-8">
            <tr class="mt-4" align="right">
                <th>
                    Mengetahui, 
                    <br>
                    <br>
                    <img src="../../assets/img/groupe.png" width="20%" />
                    <br>
                </th>
            </tr>
        </table>

        <?php
        // }
        ?>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>