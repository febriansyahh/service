    <div class="form-group">
        <div class="form-group mt-5">
            <span class="label label-info label-inline mr-2" style="font-size: 15px; border-radius: 5px 5px 0px 0px; padding: 15px; background-color: #2e74d6; color: #fff; width:25%"><b>Data Profile Anda</b></span>
            <hr class="cust-hr" style="border-top:4px solid #2e74d6;">

            <div class="card">
                <div class="row">
                    <div class="col-4">
                        <h4 class="text-center mt-3 mb-4" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Identitas Member</h4>
                        <center>
                            <img class="avatar rounded-circle" style="width:120px; height:120px" alt="Image placeholder" src="ass/assets/img/team/icon.png">
                        </center>
                    </div>

                    <!-- Garis tengah -->
                    <div class="col-2 vl">
                    </div>

                    <div class="col-6">
                        <h4 class="text-center mt-3 mb-3" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Dandi Jaya Motor</h4>
                        <table style="width:100%" class="mb-3 mt-2">
                            <?php
                            $profile = mysqli_fetch_row(profile());
                            ?>

                            <tr>
                                <td style="width:130px;"><b>Nama</b></td>
                                <td style="width:20px">:</td>
                                <td><?= $profile[1] ?></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>:</td>
                                <td><?php if($profile[2] == '1'){
                                    echo 'Pria';
                                }else{
                                    echo 'Wanita';
                                } ?></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>:</td>
                                <td><?= $profile[3] ?></td>
                            </tr>
                            <tr>
                                <td><b>No Handphone</b></td>
                                <td>:</td>
                                <td><?= $profile[4] ?></td>
                            </tr>
                            <tr>
                                <td><b>Username</b></td>
                                <td>:</td>
                                <td><?= $profile[8] ?></td>
                            </tr>
                            <tr>
                                <td><b>Tgl. Register</b></td>
                                <td>:</td>
                                <td><?= date('d-M-Y', strtotime($profile[5])) ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>