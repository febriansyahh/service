<?php

$con = new mysqli("localhost", "root", "", "service");
if ($con->connect_error) {
    exit('Could not connect');
}

$id = $_GET['q'];
$sql = "SELECT id_motor, nm_motor FROM motor WHERE id_brand = '$id' ";
$result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['id_motor'] . "'>" . $row['nm_motor'] . "</option>";
    }
    mysqli_close($con);
    ?>