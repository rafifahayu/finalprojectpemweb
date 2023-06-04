<?php
require 'config.php';
if(!empty($_SESSION["username"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  // $emailadd = $_POST["EmailAddress"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username has been taken!'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO user VALUES('$username','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful!'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match!'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REGISTRATION FORM</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <!-- <label for="EmailAddress">Email : </label>
      <input type="email" name="EmailAddress" id = "EmailAddress" required value=""> <br> -->
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
  </body>
</html>