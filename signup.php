<?php
$errors = array();
$con = mysqli_connect("localhost", "root", "", "behealthy");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "password is required");
    }
    if (count($errors) == 0) {
        $sql = "INSERT INTO admin (username,password,email) VALUES ('$username','$password','$email') ";
        mysqli_query($con, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: AdminControlPanel1.html');
    }


}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Sign Up Page</title>
    <link href="style.css" rel="stylesheet" />
    <style>
    body {
        background-image: url("bb.png");
    }
    </style>
</head>

<body>
    <header>
        <header class="head">
            <img src="WebLogo.png" width="100" height="60" alt="Logo">
            <a href="Index.php"><strong>Home</strong></a>
            <a href="AboutUs.html"><strong>About Us</strong></a>

            <div style="float:right">
                <br><a href="login.php"><strong>LogIn</Strong>
                    <a href="signup.php"><strong>SignUp</Strong></a>
                    <span style="position: relative; right:  50%;"></span></a>
            </div>
        </header>
        <section>
            <form method="post" action="signup.php">
                <div class="box11">
                    <div class="box2">

                        <h1>Sign Up</h1>

                    </div>

                    <div class="box3">
                        <input type="text" class="container1" placeholder="Username" name="username" required />


                        <input type="email" class="container1" placeholder="email" name="email" required />

                        <input type="password" class="container2" placeholder="password" name="password" required />
                        <br />

                        <input type="submit" class="submit" value="Sign Up" name="submit"></a>

                    </div>
                    <div>
                        <h5 class="txt2"><a>Do you have account?</a></h5><br>
                        <h5 class="txtt">
                            </p><a href="login.php">Click Here to login</a></h5>
            </form>
            </div>
        </section>
        <footer>

            <div id="footer">
                <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em>
                </p>
            </div>
        </footer>

</body>

</html>