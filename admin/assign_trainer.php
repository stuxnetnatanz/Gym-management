<?php
    require_once('../includes/header.php');
    $status = $_GET['assign'];

    if($status == "wd") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Invalid Details
</div>
<?php
  }
  elseif($status == "error") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Error in adding new admin.
</div>
<?php
  }
  elseif($status == "success") {
?>
<div class="alert alert-success">
  <strong>Success!</strong> Trainer assigned successfully
</div>
<?php
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css">
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/admin.css">


<form action = "./includes/assign_trainerI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Assign trainer to client</h2>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <?php
      if(isset($_GET['trainer_username'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter trainer username" name = "trainer_username" required value = "'.$_GET['trainer_username'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter trainer username" name = "trainer_username" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <?php
      if(isset($_GET['client_username'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter client username" name = "client_username" required value = "'.$_GET['client_username'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter client username" name = "client_username" required>
        ';
      }
    ?>
  </div>

  <button type = "submit" name = "submit" class = "btn">Assign</button>
</form>
