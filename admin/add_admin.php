<?php
    require_once('../includes/header.php');
    $status = $_GET['add'];

    if($status == "taken") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Admin already exists.
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
  <strong>Success!</strong> New admin added successfully.
</div>
<?php
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css">
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/admin.css">


<form action = "./includes/add_adminI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>New Admin</h2>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <?php
      if(isset($_GET['username'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Username" name = "username" required value = "'.$_GET['username'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Username" name = "username" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "password" maxlength = "16" placeholder = "Password" name = "password" required>
  </div>

  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "Password" maxlength = "16" placeholder = "Key" name = "key" required>
  </div>

  <button type = "submit" name = "submit" class = "btn">Add</button>
</form>
