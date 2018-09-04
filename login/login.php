<?php


    require('./loginHeader.php');
    require('../includes/header.php');

    $status = $_GET['login'];
    $signupStatus = $_GET['signup'];

    // Wrong password
    if($status == "wp") {
?>

      <div class="alert alert-danger">
        <strong>Error!</strong> Username or password doesn't match
      </div>
<?php
    }
    // Not registered
    elseif($status == "nr") {
?>
      <div class="alert alert-danger">
        <strong>Error!</strong> Email id not registered
      </div>
<?php
    }
    // Successful signup
    if($signupStatus == "success") {
?>
    <div class="alert alert-success">
        <strong>Success!</strong> Signup successful
    </div>

<?php
  }
?>

<form action = "./includes/loginI.php" method = "POST">
  <div align="center">
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
    <input type = "password" placeholder = "Enter Password" name = "password" required>

    <button type = "submit" name = "submit">Login</button>
  </div>
</form>
