<?php

  if(!isset($_POST['update'])) {
    header("Location: ../edit_details.php");
    exit();
  }

  session_start();
  $purpose = $_POST['purpose'];
  $fee = $_POST['fee'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $history = $_POST['history'];

  require('../../includes/db.php');

  $update = "UPDATE client SET purpose=?, fee=?, weight=?, height=?, history=? WHERE username=?;";

  $weight = (int)$weight;
  $height = (float)$height;
  $fee = (int)$fee;

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $update);
  mysqli_stmt_bind_param($statement, "siidss", $purpose, $fee, $weight, $height, $history, $_SESSION['uid']);
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
