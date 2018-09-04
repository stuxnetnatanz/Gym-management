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
    if($signupStatus == "error") {
?>
      <div class="alert alert-danger">
        <strong>Error!</strong> Can't signup
      </div>
<?php
  }
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/signup.css">

<form action = "./includes/signup_trainerI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Join Us As A Trainer</h2>

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
  <select class = "input-field" id  =  "type" name = "type" required>
    <option value = "" disabled selected>Trainer type</option>
    <option value = "Personal Trainer(Hourly)">Personal Trainer(Contingent-Hourly)</option>
    <option value = "Personal Trainer">Personal Trainer</option>
    <option value = "Group Trainer">Group Trainer</option>
  </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-inr icon"></i>
    <select class = "input-field" id = "salary"  name = "salary" required>
      <option value = "" disabled selected>Choose Expected Salary</option>
      <option value = "2000">Below Rs. 2000</option>
      <option value = "3000">Rs. 2000 - Rs. 3000</option>
      <option value = "4000">Rs. 3000 - Rs. 4000</option>
      <option value = "5000">Above Rs. 4000</option>
    </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-certificate icon"></i>
    <select class = "input-field" id = "specialization"  name = "specialization" required>
      <option value = "" disabled selected>Choose Specialization</option>
      <option value = "Nutrition and Weight Management">Nutrition and Weight Management</option>
      <option value = "Clinical Disease">Clinical Disease</option>
      <option value = "Mind-Body Fitness">Mind-Body Fitness</option>
      <option value = "Special Populations">Special Populations</option>
    </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-book icon"></i>
    <select class = "input-field" id = "qualification"  name = "qualification" required>
      <option value = "" disabled selected>Choose Qualification</option>
      <option value = "12th pass">12th Pass</option>
      <option value = "Diploma">Diploma</option>
      <option value = "Master's Degree">Master's Degree</option>
      <option value = "Professioal Degree">Professioal Degree</option>
    </select>
  </div>

  <div class = "input-container">
    <i class = "fa fa-black-tie icon"></i>
    <?php
      if(isset($_GET['experience'])) {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter experience" min = "0" max = "30" name = "experience"required value = "'.(int)$_GET['experience'].'">
        ';
      }
      else {
        echo '
          <input class = "input-field" type = "number" placeholder = "Enter experience" min = "0" max = "30" name = "experience"required>
        ';
      }
    ?>
  </div>

  <button type = "submit" name = "submit" class = "btn">Join</button>
</form>
