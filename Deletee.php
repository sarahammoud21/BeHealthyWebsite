<?php

session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <title>Delete item</title>
    <meta charset="UTF-8">

    <style>
    body {
        background-image: url("bb.png");
    }

    .head {
        padding: 20px;
        text-align: Left;
        display: inline-block;
        width: 100%;
        font-size: 15px;
        background: rgb(24, 95, 24);
        color: white;
        white-space: nowrap;

    }

    #footer {
        position: fixed;
        bottom: 1px;
        width: 100%;
        height: 20px;
        background: rgb(24, 95, 24);
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .wrapper {
        width: 100%;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        display: grid;
        place-items: center;
        gap: 15px;
    }

    .container {
        height: 150px;
        width: 150px;
        background-color: #ffffff;
        box-shadow: 0 0 25px rgba(17, 1, 68, 0.08);
        border-radius: 8px;
        position: relative;
        cursor: pointer;
    }

    input[type="checkbox"] {
        -webkit-appearance: none;
        position: relative;
        width: 100%;
        cursor: pointer;
    }

    input[type="checkbox"]:after {
        position: absolute;
        font-family: "Font Awesome 5 Free";
        font-weight: 400;
        content: "\f0c8";
        font-size: 18px;
        color: Green;
        right: 10px;
        top: -5px;
    }

    input[type="checkbox"]:checked:after {
        font-weight: 900;
        content: "\f058";
        color: #478bfb;
    }

    .container img {
        width: 20%;
        position: absolute;
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        cursor: pointer;
    }

    @media screen and (min-width: 950px) {
        .wrapper {
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .container {
            height: 200px;
            width: 200px;
        }

        input[type="checkbox"]:after {
            font-size: 22px;
        }
    }




    .button11 {
        background-color: Green;
        left: 47%;
        position: fixed;
        border: none;
        color: white;
        padding: 10px 27px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 25px 400px;
        cursor: pointer;
        left: 10%;
        margin-top: -0.1px;


    }

    /* Green */
    .button2 {
        background-color: Green;
        left: 47%;
        position: fixed;
        border: none;
        color: white;
        padding: 10px 27px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 40px;
        margin-top: -1px;
    }

    /* Green */

    table,
    td {
        margin-inline: auto;
        border-style: hidden;
    }
    </style>


    <header>
        <header class="head">

            <img src="WebLogo.png" width="100" height="60" alt="Logo">
            <a href="Index.php"><strong>Home</strong></a>
            <a href="Aboutus.html"><strong>About Us</strong></a>
            <a href="AdminControlPanel1.html" onclick="history.go(-1)">Go Back</a>
            <div style="float:right">
                <br><a href="login.php"><strong>LogIn</Strong></a>
                <a href="signup.php"><strong>SignUp</Strong></a>
            </div>


            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Delete items</title>
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
            <!-- Stylesheet -->
            <link rel="stylesheet" href="style.css" />
        </header>
        <br>
        <br>
        <br>
        <br>

<body>
    <table border=5 cellpadding=8 cellspacing=50>
        <form method="post" action="delete.php" enctype="multipart/form-data">
            <?php
            $con = mysqli_connect("localhost", "root", "", "behealthy");
            $sql = "SELECT * FROM item ";

            $result = $con->query($sql);


            if ($sql > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<td> <img class='container' style='width='150' height='150'src='" . $row['logo'] . "' > <input  id ='jj' type='checkbox' name='rest[]'  value='" . $row['id'] . "' >   </td>";
                }
            } else {
                echo "0 results";
            }

            $con->close();
            ?>
            </tbody>
    </table>







    <input class="button11" type="reset" value="Cancel">
    <input class="button2" type="submit" name="delete" value="Delete">

    </form>


    <div id="footer">
        <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
    </div>
    </footer>

</body>

</html>