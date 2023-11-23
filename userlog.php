<?php

require ('connect.php');
 if ($conn){
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['pass_word'];
        // echo($email);
        $sql= "SELECT * FROM users WHERE email='$email'";
        $res = mysqli_query($conn,$sql);
        $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
        // print_r($result);
         $db_pwd=($result[0]['pass_word']);
        //  echo ($db_pwd);
         if ($db_pwd===$password){
             // echo ("Logged IN");
             session_start();
             $_SESSION['logged_in']=true;
             $_SESSION['email']= $email;
             $_SESSION['user_id']=$result[0]['id'];
             echo($_SESSION['user_id']);
            //  header ("Location:userdashboard.php");
             header("Location:userdashboard.php");
         } else {
             echo ('Wrong Password');
         }
        
        mysqli_free_result($res);
    }
 } else {
    echo ('Error connecting to db');
 }

?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Signin Form Template Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

<body>
  <div class="userlog">
    <div id="form">
      <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
          <div id="userform">
            <ul class="nav nav-tabs nav-justified " role="tablist">
                        <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li>
            
              <div class="tab-pane fade in" id="login">
                <h2 class="text-uppercase text-center"> USER Log in</h2>
                <form id="login" action="userlog.php" method="POST">
                  <div class="form-group">
                    <label> Your Email<span class="req">*</span> </label>
                    <input name="email" type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="on">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label> Password<span class="req">*</span> </label>
                    <input name="pass_word" type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="on">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="mrgn-30-top">
                    <button name="login" type="submit" class="btn btn-larger btn-block">
                    Log in
                    </button>
                    
                  </div>
                </form>
                <button class="btn btn-larger btn-block" >
                  <a href="/Admin.php">Switch to Admin</a> 
                </button>
              </button>
              <button class="btn btn-larger btn-block" >
                  <a href="/index.php">Back Home?</a> 
                </button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>


  </div>
  <!-- /.container --> 
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
