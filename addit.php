<?php

include("Conn.php");

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $logo = $_POST['logo'];
    $description = $_POST['description'];

    $insert = "INSERT INTO `item`(`name`,`logo`,`description`) VALUES ('$name ','$logo','$description')";
    mysqli_query($db, $insert);

    if (!$insert) {
        echo "Connection faild" . mysqli_connect_error();
    } else {
        echo "<script>alert('Your item have been added.');window.location.assign('Add.php');</script>";
    }
}

mysqli_close($db);
?>