<?php

include("Conn.php");

?>
<!DOCTYPE html>

<html>

<head>
    <title>home page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        background-image: url("bb.png");
    }
    </style>

</head>

<body>


    <header class="head">

        <img src="WebLogo.PNG" width="100" height="60" alt="Logo">
        <a href="Index.php"><strong>Home</strong></a>
        <a href="Aboutus.html"><strong>About Us</strong></a>

        <div style="float:right">
            <br><a href="login.php"><strong>LogIn</Strong></a>
            <a href="signup.php"><strong>SignUp</Strong></a>
        </div>
    </header>
    <div style="text-align:center">
        <h1 id="green">Welcome to Be Healthy</h1>
    </div>

    <div style="text-align:center">

        <?php

$viewits = "SELECT* FROM `item` WHERE ID =1";
$result = mysqli_query($db, $viewits);

while ($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $logo = $row['logo'];

?>
        <div class="row">
            <span style="position: relative; left: 20%;">
                <div class="column">
                    <img src="<?php echo $row['logo']; ?>" alt="saldwich" style="width:100%">
                    <a href="item.php">
                        <?php echo $row['name']; ?>
                    </a>

                </div>
            </span>

            <?php
}
$viewits1 = "SELECT* FROM `item` WHERE ID =2";
$resultt = mysqli_query($db, $viewits1);
while ($roww = mysqli_fetch_array($resultt)) {
  $name = $roww['name'];
  $logo = $roww['logo'];

?>

            <span style="position: relative; left: 20%;">
                <div class="column">
                    <img src="<?php echo $roww['logo']; ?>" alt="lean meals" style="width:100%">
                    <a href="item2.php">
                        <?php echo $roww['name']; ?>
                    </a>
                </div>
            </span>
            <?php
}
$viewits2 = "SELECT* FROM `item` WHERE ID =3";
$resulti = mysqli_query($db, $viewits2);
while ($rroww = mysqli_fetch_array($resulti)) {
  $name = $rroww['name'];
  $logo = $rroww['logo'];

    ?>
            <span style="position: relative; left: 20%;">
                <div class="column">
                    <img src="<?php echo $rroww['logo']; ?>" alt="boga" height="180" style="width:100%">
                    <a href="item3.php">
                        <?php echo $rroww['name']; ?>
                    </a>
                </div>
            </span>

        </div>
    </div>
    </div>
    <?php
}
mysqli_close($db);

  ?>

    <div id="footer">
        <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
    </div>




</body>

</html>