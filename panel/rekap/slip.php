<?php
include "../../koneksi.php";
// $con = new mysqli("localhost", "root", "", "bengkel");
// if ($con->connect_error) {
//     exit('Could not connect');
// }
// die();
$id = $_POST['id'];
$a = dataslip($id);
foreach ($a as $key => $value) {
    $total = $value["total_perbaikan"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Slip Pembayaran</title>
        <link rel="icon" href="../dist/img/print.jpg">
    </head>

    <body>

        <center>
            <table border="0" cellspacing="0" style="width: 100%">

                <tr class="mt-4">
                    <th>
                        <img src="../../assets/img/groupe.png" width="30%" align="left" />
                    </th>



                    <th align="right">
                        #INVOICE<?= date("dmy") ?>
                    </th>
                </tr>


                <!-- <tr>
				<th align="center" width: "100%">
				<font size="4"> &nbsp;&nbsp;&nbsp;&nbsp; SUDAH BAYAR </font><br>
				</th>
			</tr> -->

                <tr> <br>
                    <th align="left">
                        <font size="2" class="mb-2">Kepada <label for="" style="padding-left: 32px;">: <?php echo $value['nama'] ?></label></font><br>
                        <font size="2" class="mb-2">Id Member <label for="" style="padding-left: 12px;">: 000<?php echo $value['id_member'] ?></label></font><br>
                        <font size="2" class="mb-2">Alamat <label for="" style="padding-left: 34px;">: <?php echo $value['alamat'] ?></label></font><br>
                        <font size="2">No. Hp <label for="" style="padding-left: 36px;">: <?php echo $value['no_hp'] ?></label></font><br>
                    </th>
                    <th align="left">
                        <font size="2" class="mb-2">Bengkel <label for="" style="padding-left: 20px;">: CV. Trijaya Motor</label> </font><br>
                        <font size="2">No. Hp <label for="" style="padding-left: 23px;">: 082 226 278 896</label> </font><br>
                        <font size="2" class="mb-2">Teknisi <label for="" style="padding-left:23px">: <?php echo $value['nama_kar'] ?></label> </font> <br>
                    </th>
                </tr>
            </table>

            .<br>

            <table border="1" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>

                        <th>Kendaraan</th>
                        <th>Keluhan</th>
                        <th>Tgl. Datang</th>
                        <th>Tgl. Selesai</th>
                        <th>Tagihan</th>

                    </tr><br><br>
                </thead>
                <tbody>
                    <?php
                    // $id = $_GET['id_tagihan'];

                    $no = 1;
                    // $sql_tampil = "SELECT p.id_pelanggan, p.nama, p.no_hp, t.id_tagihan, t.tagihan, t.status, t.tgl_bayar, t.bulan, t.tahun, k.id_paket   
                    // from tb_pelanggan p inner join tb_tagihan t on p.id_pelanggan=t.id_pelanggan 
                    // inner join tb_paket k on k.id_paket=p.id_paket where status='LS' AND id_tagihan='$id'";
                    // $query_tampil = mysqli_query($koneksi, $sql_tampil);
                    // while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
                    ?>
                    <tr align="center">
                        <td>
                            <?php echo $value["nm_motor"] ?>
                        </td>
                        <td>
                            <?php echo $value["keluhan"] ?>
                        </td>
                        <td>
                            <?php echo date("d-M-Y", strtotime($value["tgl_datang"])) ?>
                        </td>
                        <td>
                            <?php echo date("d-M-Y", strtotime($value["is_clear"])) ?>
                        </td>
                        <td>
                            <?php echo 'Rp. ' . $value["total_perbaikan"] ?>
                        </td>
                    </tr>

                </tbody>
            <?php
        }
            ?>
            </table>
            <table border="1" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th colspan="3">
                            List Part Perbaikan
                        </th>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>Part</th>
                        <th>Harga</th>
                    </tr><br><br>
                </thead>
                <tbody>
                    <?php
                    $part = slippart($id);
                    foreach ($part as $key => $data) {
                    ?>
                        <tr align="center">
                            <td>
                                <?php echo $data["jumlah"] ?>
                            </td>
                            <td>
                                <?php echo $data["nm_part"] ?>
                            </td>
                            <td>
                                <?php echo $data["harga"] ?>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="center">Total Perbaikan </td>
                        <td align="center">
                            Rp. <?php echo $total ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table border="0" cellspacing="0" style="width: 100%">
                <tr>
                    <th width="800px" align="left">
                        <br>
                        <ul>
                            <li>Terima kasih sudah melakukan service kendaraan kepada kami</li>
                            <li>Jika informasi pada bukti pembayaran ini ada
                                kesalahan, silahkan hubungi kami</li>
                        </ul>
                        <br><br>
                    </th>

                </tr>

                <tr>
                    <th align="left">
                        <li>CV. Trijaya Motor <br> Jl. Lkr. Utara UMK Gg. 11, Kepyar, Dersalam <br> 082 226 278 896</li>

                    </th>
                    <th width="200px" align="left">
                        Total Tagihan
                        <hr width="80%" align="left">
                    </th>
                    <th width="200px" align="right">
                        Rp. <?php echo $total ?>
                        <hr width="80%" align="right">
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