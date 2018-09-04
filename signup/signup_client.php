<?php
    require_once('../includes/header.php');
    $status = $_GET['signup'];

    if($status == "mismatch") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> First and last name should be alphabetic
</div>

<?php
    }
    // Email already registered
    elseif($status == "er") {
?>
<div class="alert alert-danger">
  <strong>Error!</strong> Email id is already registered
</div>

<?php
    }
    // Username taken
    elseif($status == "ur") {
?>
      <div class="alert alert-danger">
        <strong>Error!</strong> Username already taken, Please enter different username
      </div>

<?php
    }
    elseif($signupStatus == "error") {
?>
      <div class="alert alert-danger">
        <strong>Error!</strong> Can't signup
      </div>
<?php
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/signup.css">


<form action = "./includes/signup_clientI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Join Fitness Freak and stay fit</h2>

  <div class = "input-container">
    <i class = "fa fa-user-circle icon"></i>
    <?php
      if(isset($_GET['fname'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "First name" name = "fname" required value = "'.$_GET['fname'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "First name" name = "fname" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-user-circle icon"></i>
    <?php
      if(isset($_GET['lname'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Last name" name = "lname" required value = "'.$_GET['lname'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "30" placeholder = "Last name" name = "lname" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-envelope icon"></i>
    <?php
      if(isset($_GET['email'])) {
        echo '
          <input class = "input-field" type = "email" maxlength = "40" placeholder = "Email id" name = "email" required value = "'.$_GET['email'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "email" maxlength = "40" placeholder = "Email id" name = "email" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "password" maxlength = "16" placeholder = "Password" name = "password" required>
  </div>

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
    <i class = "fa fa-mobile icon"></i>
    <?php
      if(isset($_GET['phone'])) {
        echo '
          <input class = "input-field" type = "text" maxlength = "15" placeholder = "Enter mobile number" name = "phone" required value = "'.$_GET['phone'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "text" maxlength = "15" placeholder = "Enter mobile number" name = "phone" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-file-text icon"></i>
    <select class = "input-field" id  =  "purpose" name = "purpose" required>
      <option value = "" disabled selected>Purpose of joining</option>
      <option value = "Weight gain">Weight Gain</option>
      <option value = "Weight loss">Weight loss</option>
      <option value = "Toning">Toning</option>
      <option value = "Stay fit">Stay fit</option>
    </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-inr icon"></i>
    <select class = "input-field" id = "fee"  name = "fee" required>
      <option value = "" disabled selected>Choose plan</option>
      <option value = "2000">Monthly Plan - Rs. 2000</option>
      <option value = "1800">Quaterly Plan - Rs. 5400 for 3 months</option>
      <option value = "1700">Special Package - Rs. 9600 for 6 months</option>
      <option value = "1500">Annual Package - Rs. 18000</option>
    </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-balance-scale icon"></i>
    <?php
      if(isset($_GET['weight'])) {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter weight" min = "30" max = "999" name = "weight"required value = "'.(int)$_GET['weight'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter weight" min = "30" max = "999" name = "weight"required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-child icon"></i>
    <?php
      if(isset($_GET['height'])) {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter Height in meters (upto 3 decimal places)" min = "0" max = "5" step = "0.001" name = "height" required value = "'.(float)$_GET['height'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter Height in meters (upto 3 decimal places)" min = "0" max = "5" step = "0.001" name = "height" required>
        ';
      }
    ?>
  </div>

  <div class = "input-container">
    <i class = "fa fa-user-md icon"></i>
      <?php
        if(isset($_GET['history'])) {
          echo '
            <input class = "input-field" type = "text" maxlength = "100" placeholder = "Any notable medical history" name = "history" name = "history" required value = "'.$_GET['history'].'">
          ';
        }
        else {
          echo '
            <input class = "input-field" type = "text" maxlength = "100" placeholder = "Any notable medical history" name = "history" name = "history" required>
          ';
        }
      ?>
    </div>
  </div>

  <button type = "submit" name = "submit" class = "btn">Join</button>
</form>
