<?php

  if(!isset($_POST['update'])) {
    header("Location: ../update_chart.php");
    exit();
  }

  session_start();
  $username = $_POST['username'];
  $file = $_FILES['file']['tmp_name'];

  require('../../includes/db.php');

  $insert = "UPDATE client SET chart=? WHERE username=?";

  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $insert);
  $null = NULL;
  mysqli_stmt_bind_param($stmt, "bs", $null, $username);

  $isSent = mysqli_stmt_send_long_data ($stmt , 0 , file_get_contents($file));

  if($isSent) {
      $executed = mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      if($executed) {
        header("Location: ../update_chart.php?update=success");
      }
      else {
        header("Location: ../update_chart.php?update=error");
      }
  }
  else {
    header("Location: ../update_chart.php?update=error");
  }
?>
