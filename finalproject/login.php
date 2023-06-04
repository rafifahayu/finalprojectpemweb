<?php
require 'config.php';

if (!empty($_SESSION["username"])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["username"] = $row["username"];
      header("Location: records.php");
    //   exit();
    } else {
      echo "<script> alert('Incorrect Password!'); </script>";
    }
  } else {
    echo "<script> alert('User Unknown!'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>LOGIN FORM</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="login-util.css">
  <link rel="stylesheet" type="text/css" href="login-main.css">
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
          <span class="login100-form-title-1">Login</span>
        </div>
        <form class="login100-form validate-form" action="" method="post" autocomplete="off">
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input type="text" name="username" id="username" required value="" placeholder="Enter username" class="input100">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input type="password" name="password" id="password" required value="" placeholder="Enter password" class="input100">
            <span class="focus-input100"></span>
          </div>
          <div class="align-center">
            <a href="registration.php" class="txt1">Admin Registration</a>
            <span class="txt1">|</span>
            <a href="guest.php" class="txt1">Customer Site</a>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" name="submit" class="login100-form-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="login-main.js"></script>
</body>
</html>
