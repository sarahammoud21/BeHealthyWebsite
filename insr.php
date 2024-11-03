<?php

include("Conn.php");
if(isset($_POST['Submit']))
{		
    $rating = $_POST['rating'];
    $name = $_POST['name'];
    $body = $_POST['body'];

    $insert ="INSERT INTO `review`(`ID`,`item_id`,`name`,`body`,`rating`) VALUES ('',' ','$name','$body','$rating')";
mysqli_query($db,$insert);

    if(!$insert)
    {
        echo "Connection faild" .mysqli_connect_error();
    }
    else
    {
       echo "<script>alert('Your Review have been submited successfully.');
	   window.location.assign('item.php');
	   </script>"; 
	   }
}

mysqli_close($db);
?>