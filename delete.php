<?php

$con = mysqli_connect("localhost", "root", "", "behealthy");


session_start();

if (isset($_POST["delete"]) && isset($_POST["rest"])) {
    foreach ($_POST["rest"] as $deleteId) {
        $delete = "DELETE FROM item WHERE id = $deleteId";
        mysqli_query($con, $delete);
    }
}


if ($delete) {
    $_SESSION['status'] = "item deleted successfully";

    echo "<script>alert('item deleted successfully');
window.location.assign('Deletee.php');</script>";
} else {
    $_SESSION['status'] = "item not deleted successfully";
    header("location:Deletee.php");
}


mysqli_close($con);

?>