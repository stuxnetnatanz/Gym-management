<?php
    require_once('../includes/header.php');
    $status = $_GET['change'];

    if($status == "wd") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Invalid username
</div>
<?php
  }
  elseif($status == "error") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Error in changing type
</div>
<?php
  }
  elseif($status == "success") {
?>
<div class="alert alert-success">
  <strong>Success!</strong> Trainer type changed
</div>
<?php
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css">
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/admin.css">

<form action = "./includes/change_trainer_typeI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2><br>Change Trainer Type</h2><br>
  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
      <?php
        if(isset($_GET['trainer_username'])) {
          echo '
            <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter trainer name" name = "username" required value = "'.$_GET['username'].'">
          ';
        }
        else {
          echo '
            <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter trainer name" name = "username" required>
          ';
        }
      ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <select class = "input-field" id = "type" name = "type" required>
      <option value = "" disabled selected>Trainer type</option>
      <option value = "Personal Trainer(Hourly)">Personal Trainer(Contingent-Hourly)</option>
      <option value = "Personal Trainer">Personal Trainer</option>
      <option value = "Group Trainer">Group Trainer</option>
    </select>
  </div>

  <button type = "submit" name = "submit" class = "btn">Change</button>
</form>
