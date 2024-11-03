<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>edit item1</title>
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

</head>

<body>
    <header class="head">
        <img src="logo.JPEG" width="100" height="60" alt="Logo">
        <a href="Index.html"><strong>Home</strong></a>
        <a href="Aboutus.html"><strong>About Us</strong></a>
        <a href="edit.html" onclick="history.go(-1)">Go Back</a>
        <div style="float:right">
            <br><a href="login.php"><strong>LogIn</Strong></a>
            <a href="signup.php"><strong>SignUp</Strong></a>
        </div>
    </header>
    <center>

        <div class="edit-form">
            <h5 id="green">Edit</h5><br>
            <form method="post" action="Edit.php">
                <div class="ee">
                    <label id=label1 for="image">Select image:</label>
                    <input type="file" id="img" name="img" required><br><br>
                </div>
                <label style="margin-right:50% ;">Name:
                    <input name="name" type="text" size="20" required><br><br>
                </label>
                <label id="lab1">Description:<br>
                    <textarea name="Description" rows="5" cols="25" required> </textarea>
                </label>
                <p><br>
                    <input type="reset" value="cancle">
                    <input type="submit" value="update" name="submit">
                </p>

        </div>
        </form>
    </center>
    <div id="footer">
        <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
    </div>
</body>

</html>