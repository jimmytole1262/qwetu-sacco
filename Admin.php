<?php
require('connect.php');

if (isset($_POST['login'])) {
    if ($conn) {
        $email = $_POST['email'];
        $password = $_POST['pass_word'];

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT id, email, pass_word FROM admins WHERE email=?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            // Check if any results are returned
            if ($res && mysqli_num_rows($res) > 0) {
                $result = mysqli_fetch_assoc($res);
                $db_pwd = $result['pass_word'];

                // Verify the password
                if (($password===$db_pwd)) {
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $result['id'];
                    header("Location: admindashboard.php");
                    exit(); // Make sure to exit after header redirect
                } else {
                    echo 'Wrong Password';
                }
            } else {
                echo 'Email not found';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 'Statement preparation failed';
        }
    } else {
        echo 'Error connecting to db';
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Signin</title>
  <link rel="stylesheet" href="./style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
  <div class="admin">
    <div id="form">
      <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
          <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li><a href="#login" role="tab" data-toggle="tab">Log in</a></li>
            </ul>

            <div class="tab-pane fade in" id="login">
              <h2 class="text-uppercase text-center">ADMIN Log in</h2>
              <form id="loginForm" action="Admin.php" method="POST">
                <div class="form-group">
                  <label>Your Email<span class="req">*</span> </label>
                  <input name="email" type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="on">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <label>Password<span class="req">*</span> </label>
                  <input name="pass_word"type="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="on">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="mrgn-30-top">
                  <button name="login" type="submit" class="btn btn-larger btn-block">
                    Log in
                  </button>
                </div>
              </form>
              <button class="btn btn-larger btn-block">
                <a href="/Userlog.php">Switch to USER Login?</a>
              </button>
              <button class="btn btn-larger btn-block">
                <a href="/index.php">Back Home?</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /.container -->
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="./script.js"></script>
</body>

</html>
