<?php
$conn = mysqli_connect("localhost", "root", "", "behealthy");

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['submit']);
    //$i=$_GET['id'];
//if(isset($_GET['edit'])){
    $n = $_POST['name'];
    $d = $_POST['Description'];
    $l = $_POST['img'];
    $s = "UPDATE item SET name='$n' and logo='$l' and description='$d' WHERE id='$id'";
    $d = mysqli_query($conn, $s);
    if ($d) {

        echo "<script>alert('Your item have been Editted.')
        window.location.assign('for-edit.html')</script>";

    } else {

        echo "Error updating record: " . $s . "<br>" . mysqli_error($conn);
    }
    //}
}
?>