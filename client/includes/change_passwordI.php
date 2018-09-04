<?php

  if(!isset($_POST['updatePassword'])) {
    header("Location: ../change_password.php");
    exit();
  }

  session_start();
  require('../../includes/db.php');
  $password = $_POST['password'];
  $hashedPwd = password_hash($password, PASSWORD_BCRYPT);

  $template = "UPDATE client SET password=? WHERE username=?;";

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ss", $hashedPwd, $_SESSION['uid']);
  $executed = mysqli_stmt_execute($statement);

  mysqli_stmt_close($statement);
  if($executed) {
    header("Location: ../change_password.php?changed=success");
    exit();
  }
  else {
    header("Location: ../change_password.php?changed=error");
    exit();
  }
?>
