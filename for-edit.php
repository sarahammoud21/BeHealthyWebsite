<?php
// Initialize the session
session_start();

$conn = mysqli_connect("localhost", "root", "", "behealthy");

$success_msg = '';
$title_err = "";


$id = $_GET['id'];
$name;
$logo;
$description;
$categoryID;

$sql = "SELECT  * FROM item ";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $logo = $row['logo'];
        $description = $row['description'];
        $categoryID = $row['categoryID'];
    }
}

$image = $logo;

//**** code for update
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_FILES["image"]["name"] != "") {

        //  Validate upload file
        $target_dir = "Webproject/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // set image name
        $image = time() . "." . $imageFileType;
        $filepath = "Webproject/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);

        //** delete old image
        $old_image = $logo;
        $filepath = "Webproject/" . $old_image;
        //echo ($filepath);
        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }
    // sql statment
    $name = $_POST['name'];

    $description = $_POST['description'];
    //$categoryID = $_POST['category'];


    $sql = "UPDATE item SET name='$name',
							     logo='$image',
								 description='$description'
								 WHERE id=" . $id;

    //echo $sql; exit;
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record Updated successfully');
          window.location.assign('Editt.php');</script>";

    } else {
        $error_msg = "<span style='color: red;'>Something went wrong. Please try again later.</span>";
    }

    //$conn->close();
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-image: url("bb.png");
    }

    .btn1 {
        background-color: white;
        padding: 12px 16px;
        font-size: 10px;

    }

    .btn1:hover {
        background-color: rgb(24, 95, 24);


    }

    #edit-table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 70%;
    }

    #edit-table td,
    #edit-table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #edit-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }



    #edit-table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

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

        <img src="WebLogo.png" width="100" height="60" alt="Logo">
        <a href="Index.php"><strong>Home</strong></a>
        <a href="Aboutus.html"><strong>About Us</strong></a>
        <a href="#" onclick="history.go(-1)">Go Back</a>
        <div style="float:right">
            <br><a href="login.php"><strong>LogIn</Strong></a>
            <a href="signup.php"><strong>SignUp</Strong></a>
        </div>
    </header>
    <div style="text-align:center">
        <h1 id="green">Edit restaurant profile</h1>
        <center>
            <div class="edit-form">
                <h5 id="green">Edit</h5><br>
                <form method="post">


                    <div>

                        <label>Item Logo</label>
                        <input type="file" name="image">
                    </div><br>
                    <div>
                        <label>Name</label>
                        <input required type="text" name="name" placeholder="Enter name of restaurant">
                    </div><br>

                    <div>
                        <label id="lab1">Description</label><br>
                        <textarea name="description" rows="5" cols="25"></textarea><br><br>
                    </div>


                    <?php


                    $conn->close();
                    ?>





                    <input type="reset" value="Reset">
                    <input type="submit" name="update" value="Update ">

                </form>


            </div>
    </div>
    <br>
    <footer>

        <div id="footer">
            <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
        </div>
    </footer>
</body>

</html>