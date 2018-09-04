<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../signup_client.php");
    exit();
  }

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $purpose = $_POST['purpose'];
  $fee = $_POST['fee'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $history = $_POST['history'];

  // Validate first name
  if(!preg_match("/^[a-zA-Z]*$/", $fname)){
    header("Location: ../signup_client.php?signup=mismatch&lname=$lname&email=$email&username=$username&phone=$phone&weight=$weight&height=$height&history=$history");
    exit();
  }
  // Validate Last name
  if(!preg_match("/^[a-zA-Z]*$/", $lname)){
    header("Location: ../signup_client.php?signup=mismatch&fname=$fname&email=$email&username=$username&phone=$phone&weight=$weight&height=$height&history=$history");
    exit();
  }

  require('../../includes/db.php');

  // if registered email
  $getEmails = "SELECT email from members WHERE email=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getEmails);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  if($num) {
    header("Location: ../signup_client.php?signup=er&fname=$fname&lname=$lname&email=$email&username=$username&phone=$phone&weight=$weight&height=$height&history=$history");
    exit();
  }

  // if username taken
  $getUsername = "SELECT username from members WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getUsername);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  if($num) {
    header("Location: ../signup_client.php?signup=ur&fname=$fname&lname=$lname&email=$email&username=$username&phone=$phone&weight=$weight&height=$height&history=$history");
    exit();
  }

  // Add in table members

  $date = date("Y:m:d H:i:s");
  $template = "INSERT INTO members (username, fname, lname, email, phone, joined) VALUES(?, ?, ?, ?, ?, ?);";

  $statement=mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ssssss", $username, $fname, $lname, $email, $phone, $date);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if(!$executed) {
    header("Location: ../signup_client.php?signup=error");
    exit();
  }

  // Add in table client

  $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
  $weight = (int)$weight;
  $height = (float)$height;
  $fee = (int)$fee;
  $template = "INSERT INTO client (username, password, weight, height, fee, purpose, history) VALUES(?, ?, ?, ?, ?, ?, ?);";

  $statement=mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ssidiss", $username, $hashedPwd, $weight, $height, $fee, $purpose, $history);
  $executed1 = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);
  if($executed1) {
    header("Location: ../../login/login.php?signup=success");
    exit();
  }
  else {
    header("Location: ../signup_client.php?signup=error");
  }
?>
