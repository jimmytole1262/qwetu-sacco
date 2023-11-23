<?php

require ('connect.php');
if ($conn){
  if (isset( $_POST['submitbutton'] )){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass_word =  $_POST['pass_word'];

    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `pass_word`)
    VALUES 
    ('$first_name', '$last_name', '$email',$phone, '$pass_word');";
    if(mysqli_query($conn,$sql)){
      // echo ('Succesful');
      header ('Location:userlog.php');
    } else {
      echo ('Not succesful');
    };
  }
    
} else {
  echo ('Error connecting:' . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up </title>
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
<div class="user">
  <div id="form">
    <div class="container">
      <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
        <div id="userform">
          <h2 class="text-uppercase text-center">  QWETU SACCO</h2>
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="#signup"  role="tab" data-toggle="tab">Sign up</a></li>
            <!-- <li><a href="#login"  role="tab" data-toggle="tab">Log in</a></li> -->
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="signup">
              <form id="signup" method="POST" action="user.php">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label>First Name<span class="req">*</span> </label>
                      <input name="first_name" type="text" class="form-control" id="first_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label> Last Name<span class="req">*</span> </label>
                      <input name="last_name" type="text" class="form-control" id="last_name" required data-validation-required-message="Please enter your name." autocomplete="off">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label> Your Email<span class="req">*</span> </label>
                  <input name="email" type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <label> Your Phone<span class="req">*</span> </label>
                  <input name="phone" type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <label> Password<span class="req">*</span> </label>
                  <input name="pass_word" type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="mrgn-30-top">
                  <button name="submitbutton" type="submit" class="btn btn-larger btn-block"/>
                  Sign up
                  </button>
                </button>
                <button class="btn btn-larger btn-block"/ >
                    <a href="/index.php">Back Home?</a> 
                  </button>
                </div>
              </form>
            </div>
            <!-- <div class="tab-pane fade in" id="login"> -->
              <!-- <h2 class="text-uppercase text-center">USER Log in</h2> -->
              <!-- <form id="login">
                <div class="form-group">
                  <label> Your Email<span class="req">*</span> </label>
                  <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <label> Password<span class="req">*</span> </label>
                  <input type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="mrgn-30-top">
                  <button type="submit" class="btn btn-larger btn-block"/> -->
                  <!-- Log in -->
                  <!-- </button> -->
                  <!-- <button type="submit" class="btn btn-larger btn-block"/> -->
                  <!-- <a href="/Admin.html">Switch to ADMIN login</a> -->
                  <!-- </button> -->
                </div>
              </form>
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
