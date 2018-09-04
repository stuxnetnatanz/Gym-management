<?php

  session_start();
  if($_SESSION['type'] != "trainer") {
    header("Location: ../index.php");
    exit();
  }

  require('../includes/header.php');
  require('../includes/db.php');

  $status = $_GET['changed'];

  if($status == "error") {

    echo'
    <div class="alert alert-danger">
      <strong>Error!</strong> Couldn\'t change password
    </div>
    ';
  }
  else if($status == "success") {
    echo'
    <div class="alert alert-success">
    <strong>Success!</strong> Password changed successfully
    </div>
    ';
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/trainer.css"></link>

<form action = "./includes/change_passwordI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Change password</h2>

  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "password" maxlength = "16" placeholder = "Enter new password Password" name = "password" required >
  </div>

  <button type = "submit" name = "updatePassword" class = "btn">Update</button>
</form>
