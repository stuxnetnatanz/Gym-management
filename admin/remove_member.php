<?php
    require_once('../includes/header.php');
    $status = $_GET['remove'];

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
  <strong>Error!</strong> Can't remove member
</div>
<?php
  }
  elseif($status == "success") {
?>
<div class="alert alert-success">
  <strong>Success!</strong> Member removed
</div>
<?php
  }
?>


<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css"></link>
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/admin.css">


<form action = "./includes/remove_memberI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Remove Member</h2>

  <div class="radioo">
    <input type = "radio" name = "btn" value = "client">Remove Client<br>
    <input type = "radio" name = "btn" value = "trainer">Remove Trainer<br><br>
  </div>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <?php
      if(isset($_GET['username'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter username" name = "sername" required value = "'.$_GET['username'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Enter username" name = "username" required>
        ';
      }
    ?>
  </div>

  <button type = "submit" name = "submit" class = "btn">Remove</button>
</form>
