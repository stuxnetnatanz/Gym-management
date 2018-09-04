<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../create_admin.php");
    exit();
  }

  $trainer = $_POST['trainer_username'];
  $client = $_POST['client_username'];

  require('../../includes/db.php');

  $trainerUsername = "SELECT username from trainer WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $trainerUsername);
  mysqli_stmt_bind_param($stmt, "s", $trainer);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  // If username doesn't exist.
  if(!$num) {
    header("Location: ../assign_trainer.php?assign=wd&trainer_username=$trainer&client_username=$client");
    exit();
  }
  
  $clientUsername = "SELECT username, trainer from client WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $clientUsername);
  mysqli_stmt_bind_param($stmt, "s", $client);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  // If username doesn't exist.
  if(!$num) {
    header("Location: ../assign_trainer.php?assign=wd&trainer_username=$trainer&client_username=$client");
    exit();
  }

  //Keep track of current trainer assigned to the client so that we can decrement it's client number by 1.
  $current_trainer = $row[1];
  $update = "UPDATE client SET trainer = ? WHERE username=?;";

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $update);
  mysqli_stmt_bind_param($statement, "ss", $trainer, $client);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if(!$executed) {
    header("Location: ../assign_trainer.php?assign=error");
    exit();
  }
  else {

    // Previous trainer : Decrement client number by 1.
    $update = "UPDATE trainer SET clients = clients - 1 WHERE username=?;";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $update);
    mysqli_stmt_bind_param($statement, "s", $current_trainer);
    $executed = mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    //New assigned trainer : Increment clients by 1.
    $update = "UPDATE trainer SET clients = clients + 1 WHERE username=?;";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $update);
    mysqli_stmt_bind_param($statement, "s", $trainer);
    $executed = mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("Location: ../assign_trainer.php?assign=success");
  }
?>
