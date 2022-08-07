<?php
include "../../koneksi.php";
$tgawal = $_POST['tawal'];
$tgakhir = $_POST['takhir'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Rekap Perbaikan</title>
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
                    <th>Atas Nama</th>
                    <th>Kendaraan</th>
                    <th>Tgl. Kedatangan</th>
                    <th>Tgl. Perbaikan</th>
                    <th>Biaya</th>
                </tr><br><br>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $a = lrekap($tgawal, $tgakhir);
                foreach ($a as $key => $data) {
                ?>
                    <tr align="center">
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nm_motor'] ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tanggal'])) ?></td>
                        <td><?= date('d-M-Y', strtotime($data['is_clear'])) ?></td>
                        <td><?= 'Rp. ' . $data['total_perbaikan'] ?></td>
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