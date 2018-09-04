<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../change_trainer_type.php");
    exit();
  }

  $username = $_POST['username'];
  $type = $_POST['type'];

  require('../../includes/db.php');
  $clientUsername = "SELECT username from trainer WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $clientUsername);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  // If username doesn't exist.
  if(!$num) {
    header("Location: ../change_trainer_type.php?change=wd&username=$username");
    exit();
  }

  $update = "UPDATE trainer SET type =? WHERE username=?;";

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $update);
  mysqli_stmt_bind_param($statement, "ss", $type, $username);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if(!$executed) {
    header("Location: ../change_trainer_type.php?change=error");
    exit();
  }
  else {
   header("Location: ../change_trainer_type.php?change=success");
  }

?>
