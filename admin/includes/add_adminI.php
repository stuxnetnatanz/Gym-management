<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../create_admin.php");
    exit();
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $key = $_POST['key'];

  require('../../includes/db.php');

  $getUsername = "SELECT username from admin WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getUsername);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  // If username exist.
  if($num) {
    header("Location: ../add_admin.php?add=taken&username=$username");
    exit();
  }

  $template = "INSERT INTO admin (username, password, adminKey, joined) VALUES(?, ?, ?, ?);";

  $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
  $hashedKey = password_hash($key, PASSWORD_BCRYPT);
  $date = date("Y:m:d H:i:s");

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ssss", $username, $hashedPwd, $hashedKey, $date);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if(!$executed) {
    header("Location: ../add_admin.php?add=error");
    exit();
  }
  else {
   header("Location: ../add_admin.php?add=success");
  }
?>
