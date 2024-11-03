<?php
$con = mysqli_connect("localhost", "root", "", "behealthy");

if (isset($_POST['Submit'])) {

    $email = $_POST['mail'];
    $password = $_POST['password'];
    $result = (mysqli_query($con, "UPDATE admin SET password='$password' WHERE email='$email'"));


    if (!$result) {

        echo "Connection faild" . mysqli_connect_error();
    } else {
        echo "<script>alert('Your password have been updated successfully.') 
        window.location.assign('login.php')</script>";
    }
}
mysqli_close($con);

?>