<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../remove_member.php");
    exit();
  }

  $type = $_POST['btn'];
  $username = $_POST['username'];

  require('../../includes/db.php');

  if($type == "trainer") {

    $trainerUsername = "DELETE from trainer WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $trainerUsername);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  else {

    $clientUsername = "DELETE from client WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $clientUsername);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  if($result) {

    $memberUsername = "DELETE from members WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $memberUsername);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $newResult = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if($newResult) {
      header("Location: ../remove_member.php?remove=success");
      exit();
    }
    else {
      header("Location: ../remove_member.php?remove=error?username=$username");
      exit();
    }
  }
  else {
    header("Location: ../remove_member.php?remove=error?username=$username");
    exit();
  }
?>


