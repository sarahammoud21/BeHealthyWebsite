<?php



$con = mysqli_connect("localhost", "root", "", "behealthy");

$username_eror = $password_eror = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username_eror) && empty($password_eror)) {



        $sql = "SELECT * FROM admin where username='$username'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $svd_passowrd = $row['password'];

            if ($password === $svd_passowrd) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header('Location:AdminControlPanel1.html');
            } elseif ($password != $svd_passowrd) {
                $password_eror = "your password is wrong";
                echo "<script>alert('incorrect password');
                window.location.assign('login.php');</script>";
            }
        } else {
            $username_eror = "your username is wrong";

            echo "<script>alert('incorrect username');
            window.location.assign('login.php');</script>";
        }
    }

    $conn->close();
}


?>
<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        background-image: url("bb.png");
    }
    </style>
</head>


<body>
    <header class="head">
        <img src="WebLogo.png" width="100" height="60" alt="Logo">
        <a href="Index.php"><strong>Home</strong></a>
        <a href="AboutUs.html"><strong>About Us</strong></a>

        <div style="float:right">
            <br><a href="login.php"><strong>LogIn</Strong></a>
            <a href="signup.php"><strong>SignUp</Strong></a>
        </div>
    </header>
    <section>
        <form method="post" action="login.php">
            <div class="box1">
                <div class="box2">

                    <h1>Login</h1>

                </div>

                <div class="box3">

                    <input type="text" name="username" class="container1" placeholder="username" />
                    <input type="password" name="password" class="container2" placeholder="password" />
                    <br />
                    <h6><a href="restpass.html">Forgot <span class="pas">Password?</a></span></h6>

                    <a href="AdminControlPanel1.html"><input type="submit" class="submit1" value="login"></a>
                </div>
                <h5 class="txt2">
                    <p>Don't have an account?</p>
                </h5>
                <h5 class="txt"><a href="signup.php">Sign up now</a></h5>

        </form>
        </div>
    </section>
    <footer>

        <div id="footer">
            <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
        </div>
    </footer>
</body>

</html>