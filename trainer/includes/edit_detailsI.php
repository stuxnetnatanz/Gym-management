<?php

  if(!isset($_POST['update'])) {
    header("Location: ../edit_details.php");
    exit();
  }

  session_start();
  $type = $_POST['type'];
  $salary = $_POST['salary'];
  $specialization = $_POST['specialization'];
  $qualification = $_POST['qualification'];
  $experience = $_POST['experience'];

  require('../../includes/db.php');

  $update = "UPDATE trainer SET type=?, salary=?, specialization=?, qualification=?, experience=? WHERE username=?;";

  $experience = (int)$experience;
  $salary = (int)$salary;

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $update);
  mysqli_stmt_bind_param($statement, "sissis", $type, $salary, $specialization, $qualification, $experience, $_SESSION['uid']);
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
