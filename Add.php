<!DOCTYPE html>

<html>

<head>
    <title>Add item</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
    <style>
    body {
        background-image: url("bb.png");
    }

    input[type=submit] {
        background-color: rgb(24, 95, 24);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=reset] {
        background-color: rgb(24, 95, 24);
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>

<body>
    <header>
        <header class="head">

            <img src="logo.jpeg" width="100" height="60" alt="Logo">
            <a href="Index.php"><strong>Home</strong></a>
            <a href="Aboutus.html"><strong>About Us</strong></a>
            <a href="AdminControlPanel1.html" onclick="history.go(-1)">Go Back</a>
            <div style="float:right">
                <br><a href="login.php"><strong>LogIn</Strong></a>
                <a href="signup.php"><strong>SignUp</Strong></a>
            </div>
        </header>




        <center>
            <div class="edit-form">
                <h1 id="green" style="margin-top:-5%;">Add new resturants</h1><br>
                <form method="POST" action="addit.php">
                    <div class="ee">
                        <label id=label1 for="image">Select image:</label>
                        <input type="file" id="img" name="logo"><br><br>
                    </div>
                    <label style="margin-right:50% ;">Name:
                        <input name="name" type="text" size="20"><br><br>
                    </label>
                    <label id="lab1">Description:<br>
                        <textarea name="description" rows="5" cols="25"></textarea>
                    </label>
                    <p><br>

                        <input type="submit" name="Submit" value="Add">
                    </p>

                </form>
            </div>
        </center>

        <div id="footer">
            <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
        </div>
        </footer>
</body>

</html>