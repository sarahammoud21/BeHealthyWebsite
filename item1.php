<?php
include("Conn.php");
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Restaurant Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </style>
</head>

<body>

    <header class="head">
        <img src="logo.JPEG" width="100" height="60" alt="Logo">
        <a href="Index.php"><strong>Home</strong></a>
        <a href="AboutUs.html"><strong>About Us</strong></a>
        <a href="#" onclick="history.go(-1)">Go Back</a>
        <div style="float:right">
            <br><a href="login.html"><strong>LogIn</Strong></a>
            <a href="signup.html"><strong>SignUp</Strong></a>
        </div>
    </header>


    <?php

$viewits = "SELECT* FROM `item` WHERE ID=1";
$result = mysqli_query($db, $viewits);


while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $logo = $row['logo'];
    $description = $row['description'];
?>

    <section id="ItemProfile">
        <div class="content">
            <h1 id="green">
                <?php echo $row['name']; ?>
            </h1>
            <p><img src="<?php echo $row['logo']; ?>" width="200" height="200" alt="picture of the saldwich resturant">
            </p>
            <?php
    $item_id = 1;
    $ratequery = "SELECT * FROM review WHERE item_id = '$item_id' ";
    $rateres = mysqli_query($db, $ratequery);
    while ($data = mysqli_fetch_assoc($rateres)) {
        $rate_db[] = $data;
        $sum_rates[] = $data['rating'];
    }
    if (count($rate_db)) {
        $rate_times = count($rate_db);
        $sum_rates = array_sum($sum_rates);
        $rate_value = $sum_rates / $rate_times;
        $rate_bg = (($rate_value) / 5) * 100;
    } else {
        $rate_times = 0;
        $rate_value = 0;
        $rate_bg = 0;
    }
?>
            <div style="margin-top: 10px">
                <div class="rating" style="width:<?php echo $rate_bg; ?>%" </div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <div class="rate-stars"></div>
                </div>
            </div>

            <p><a href="https://www.instagram.com/saldwich/" class="fa fa-instagram" style="color:#b93cd3"></a>

                <a href="https://www.twitter.com/saldwich/" class="fa fa-twitter" style="color: blue"></a>
            </p>

            <div class="reviews">
                <h4>Description:</h4>
            </div>
            <div class="Description">
                <p><strong>
                        <?php echo $row['description']; ?>
                    </strong></p>
            </div>
            <div class="reviews">
                <h4>reviews:<h4>
            </div>
            <?php
}

$viewr = "SELECT* FROM `review` WHERE item_id=1";
$result2 = mysqli_query($db, $viewr);

if ($row = mysqli_fetch_array($result2)) {

    $name2 = $row['name'];
    $body = $row['body'];
    $rating = $row['rating'];

        ?>
            <div class="box-handel">
                <div class="box">
                    <div class="box-top">
                        <div class="profile">
                            <div class="profile-img">
                                <img src="user1.jfif" width="40" height="40" alt="picture of user">
                            </div>
                            <div class="user-name">
                                <strong>
                                    <?php echo $row['name']; ?>
                                </strong>
                            </div>
                        </div>

                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                    </div>
                    <div class="clien-comment">
                        <p>
                            <?php echo $row['body']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
}


if ($roww = mysqli_fetch_array($result2)) {

    $name2 = $roww['name'];
    $body = $roww['body'];
    $rating = $roww['rating'];

    ?>
            <div class="box-handel">
                <div class="box">
                    <div class="box-top">
                        <div class="profile">
                            <div class="profile-img">
                                <img src="user2.png" width="40" height="40" alt="picture of user">
                            </div>
                            <div class="user-name">
                                <strong>
                                    <?php echo $roww['name']; ?>
                                </strong>
                            </div>
                        </div>
                        <div class='rating'>
                            <span class='fa fa-star checked'></span>
                            <span class='fa fa-star checked'></span>
                            <span class='fa fa-star checked'></span>
                            <span class='fa fa-star'></span>
                            <span class='fa fa-star'></span>
                        </div>
                    </div>
                    <div class="clien-comment">
                        <p>
                            <?php echo $roww['body'];
} ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="box66">
                <a class="button1" href="#popup">Add review</a>
            </div>

            <div id="popup" class="overlay">
                <div class="popup">
                    <h2>Share your review</h2>
                    <a class="close" href="#">&times;</a>
                    <?php
       if (isset($_POST['Submit'])) {
           $rating = $_POST['rating'];
           $name = $_POST['name'];
           $body = $_POST['body'];

           $insert = "INSERT INTO `review`(`ID`,`item_id`,`name`,`body`,`rating`) VALUES ('',' ','$name','$body','$rating')";

           mysqli_query($db, $insert);

           if (!$insert) {
               echo "Connection faild" . mysqli_connect_error();
           } else {
       ?>
                    <div class="content">
                        <form method="POST" action="item.php" class="form-container">
                            <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <p><br><br> <label><b>Name</b></label>
                                <input type="text" placeholder="Enter Your username" name="name">
                            </p>

                            <label for="Comment"><b>Your comment</b><br></label>
                            <input type="text" placeholder="Type your comment here.." name="body" required>

                            <button type="Submit" class="btn" name="Submit">Share</button>

                            <script>
                                location.reload();
                            </script>

                        </form>
                    </div>
                </div>
            </div>

    </section>
    <?php
               echo '<script>alert("Your Review have been submited successfully.")</script>';
           }
       }
       mysqli_close($db);

       ?>
    <div id="footer">
        <p>Contact us on our <a href="mailto:Sara@gmail.com">email</a>&copy;<em> Created by Group 3 2022</em></p>
    </div>

</body>

</html>