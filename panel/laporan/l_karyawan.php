<?php
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Karyawan</title>
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
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Jobdesk</th>
                    <th>Terdaftar</th>
                </tr><br><br>
            </thead>
            <tbody>
                <?php
                $a = karyawan();
                $no = 1;
                foreach ($a as $key => $data) {
                ?>
                    <tr align="center">
                        <td><?php echo $no++; ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td>
                            <?php if ($data['gender'] == '1') {
                                echo 'Pria';
                            } else {
                                echo 'Wanita';
                            } ?>
                        </td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['jobdesk'] ?></td>
                        <td><?= date('d-m-Y', strtotime($data['registered'])) ?></td>
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