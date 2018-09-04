<?php
  require('./loginHeader.php');
  require('../includes/header.php');
  $status = $_GET['login'];
  if($status == "wd") {
    ?>
    <div class="alert alert-danger">
      <strong>Error!</strong> Invalid admin details
    </div>
  <?php
  }
?>


<form action = "./includes/admin_loginI.php" method = "POST">
  <div align = "center">
    <img src = "/gym_management/assets/images/logo.png">
  </div>

  <div class = "container">
    <label for = "uname"><b>Username</b></label>
      <?php
        $name = $_GET['name'];
        if(isset($name)) {
          echo '<input type = "text" name = "name"
          placeholder = "Enter Username or email" value = "'.$name.'">';
        }
        else {
          echo '<input type = "text" placeholder = "Enter Username or email" name = "name" required>';
        }
      ?>

    <label for = "psw"><b>Password</b></label>
    <input type = "password" placeholder = "Enter key" name = "password" required>

    <label for = "adminKey"><b>AdminKey</b></label>
    <input type = "password" placeholder = "Enter key" name = "adminKey" required>

    <button type = "submit" name = "submit">Login</button>
  </div>

</form>
