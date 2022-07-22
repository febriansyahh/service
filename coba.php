<?php
if (isset($_POST['btnSubmit'])) {
    $val = $_POST['hari'];
    if($val == 'sun'){
        echo 'Data benar';
    }else{
        echo 'Data Salah';
    }
} else {
    echo 'Maaf harus isi diatas';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba</title>
</head>

<body>
    <form action="" class="mt-4" method="post">
        <label for="">Nama Hari</label>
        <input type="text" name="hari" class="form-control">
        <button type="submit" name="btnSubmit" class="btn btn-gray-800">Submit</button>
    </form>

</body>

</html>