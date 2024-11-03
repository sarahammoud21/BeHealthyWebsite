<?php

session_start(); ?>
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
    </style>
</head>

<body>
    <header class="head">

        <img src="logo.JPEG" width="100" height="60" alt="Logo">
        <a href="Index.html"><strong>Home</strong></a>
        <a href="Aboutus.html"><strong>About Us</strong></a>

        <div style="float:right">
            <br><a href="login.php"><strong>LogIn</Strong></a>
            <a href="signup.php"><strong>SignUp</Strong></a>
        </div>
    </header>
    <div style="text-align:center">
        <h1 id="green">Edit restaurant profile</h1>
        <center>
            <table id="edit-table" width="60%">

                <?php
                $con = mysqli_connect("localhost", "root", "", "behealthy");
                $sql = "SELECT * FROM item ";

                $result = $con->query($sql);


                if ($sql > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>
           
            
            <td rowspan = 2> <img style='width='90px' height='90px' ;' src='uploads/" . $row['logo'] . "' /> </td>
            <td>" . $row['name'] . "</td>
            <td rowspan = 2> <a href='edit_item.php?id=" . $row['id'] . "'><button class='btn'>
            <i class='fa fa-edit'></i></button></a></td> 
            
            </tr>
            <tr><td>" . $row['description'] . "</td>
          
                
            </tr>";
                  }
                } else {
                  echo "0 results";
                }

                $con->close();
                ?>
                </tbody>

            </table>
        </center>
    </div>
    <footer>

        <div id="footer">
            <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
        </div>
    </footer>
</body>

</html>





<!-- <td rowspan = 2><input type='submit'name=".$row['id']."' class='btn' value='edit'>
              </input></td> -->

<!-- <td rowspan = 2> <a href='edit_item.php? id=".$row['id']."'><button class='btn'>
                <i class='fa fa-edit'></i></button></a></td> -->