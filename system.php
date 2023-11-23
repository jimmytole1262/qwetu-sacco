<?php
require ('connect.php');
 if ($conn){
        session_start();
        if($_SESSION['logged_in']){
            $sql= "SELECT * FROM users WHERE email='{$_SESSION['email']}'";
            $res = mysqli_query($conn,$sql);
            $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
            print_r($result);
            mysqli_free_result($res);

        } else {
            $_SESSION['logged_in']="";
            echo ("You're not logged in");
        }
    } else {
    echo ('Error connecting to db');
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qwetu</title>
</head>
<body>
    <br>
    Welcome to QWETU SYSTEM

    <div>
        <?php
             if ($_SESSION['logged_in']) {
                //  echo ("You're logged in");
                echo("
                <form action=\"logout.php\" method=\"POST\">
        <button type=\"submit\" name=\"logout\">Logout</button>
    </form>
                ");
             } else {
                 echo ("You're not logged in");
             }
        ?>

    
    </div>
</body>
</html>