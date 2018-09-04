<?php

  if(!isset($_POST['update'])) {
    header("Location: ../edit_details.php");
    exit();
  }

  session_start();
  $password = $_POST['password'];
  $key = $_POST['key'];

  require('../../includes/db.php');

  $update = "UPDATE admin SET password = ?, adminKey = ? WHERE username=?;";

  $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
  $hashedKey = password_hash($key, PASSWORD_BCRYPT);
  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $update);
  mysqli_stmt_bind_param($statement, "sss", $hashedPwd, $hashedKey, $_SESSION['uid']);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if($executed) {
    header("Location: ../edit_details.php?edit=success");
    exit();
  }
  else {
    header("Location: ../edit_details.php?edit=error");
    exit();
  }
?>
