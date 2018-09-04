<?php
  session_start();
  if($_SESSION['type'] != "trainer") {
    header("Location: ../index.php");
    exit();
  }

  require('../includes/header.php');
  require('../includes/db.php');

  $status = $_GET['edit'];
?>

<?php if($status == "success") { ?>
  <div class="alert alert-success">
    <strong>Success!</strong> Information updated successfully
  </div>
<?php } elseif($status == "error") { ?>
  <div class="alert alert-danger">
    <strong>Error!</strong> Could not update details
  </div>
<?php } ?>

<?php
  $getDetails = "SELECT fname, lname, m.username, email, phone, joined, `password`, experience, `type`, salary, specialization, qualification
  from trainer t, members m
  WHERE m.username=? AND t.username = m.username";

  $stmt1 = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt1, $getDetails);
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['uid']);
  mysqli_stmt_execute($stmt1);

  mysqli_stmt_bind_result($stmt1, $fname, $lname, $username, $email, $phone, $joined, $password, $experience, $type, $salary, $specialization, $qualification);

  mysqli_stmt_fetch($stmt1);
  mysqli_stmt_close($stmt1);
?>

<link rel="stylesheet" href="/gym_management/assets/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/trainer.css"></link>


<form action="./includes/edit_detailsI.php" method="POST" style="max-width:500px;margin:auto">
  <h2>Update personal information</h2>

  <div class="input-container">
    <i class="fa fa-user-circle icon"></i>
    <input class="input-field" type="text" name="fname" value="<?php echo $fname; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-user-circle icon"></i>
    <input class="input-field" type="text" name="lname" value="<?php echo $lname; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" name="email" value="<?php echo $email; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" name="username" value="<?php echo $username; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-mobile icon"></i>
    <input class="input-field" type="text" maxlength="15" placeholder="Enter mobile number" name="phone" value="<?php echo $phone; ?>"
    required readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-file-text icon"></i>
    <select class="input-field" id="type" name="type" required>
      <option value="" disabled>Trainer type</option>
      <?php
        $TYPE = [
          "Personal Trainer(Hourly)",
          "Personal Trainer",
          "Group Trainer"
        ];
        foreach ($TYPE as $i => $t) {
          $selected = ($t == $type) ? " selected" : "";
          echo '<option value="' . $t . '"' . $selected . '>' . $t . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-inr icon"></i>
    <select class="input-field" id="salary" name="salary" required>
      <option value="" disabled>Choose Expected Salary</option>
      <?php
        $SALARIES = [
          "2000" => "Below Rs. 2000",
          "3000" => "Rs. 2000 - Rs. 3000",
          "4000" => "Rs. 3000 - Rs. 4000",
          "5000" => "Above Rs. 4000"
        ];
        foreach ($SALARIES as $key => $val) {
          $selected = ($key == $salary) ? " selected" : "";
          echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-certificate icon"></i>
    <select class="input-field" id="specialization" name="specialization" required>
      <option value="" disabled selected>Choose Specialization</option>
      <?php
        $SPECIALIZATION = [
          "Nutrition and Weight Management",
          "Clinical Disease",
          "Mind-Body Fitness",
          "Special Populations"
        ];
        foreach ($SPECIALIZATION as $i => $t) {
          $selected = ($t == $specialization) ? " selected" : "";
          echo '<option value="' . $t . '"' . $selected . '>' . $t . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <select class="input-field" id="qualification" name="qualification" required>
      <option value="" disabled selected>Choose Qualification</option>
      <?php
        $QUALIFICATION = [
          "12th pass",
          "Diploma",
          "Master's Degree",
          "Professioal Degree"
        ];
        foreach ($QUALIFICATION as $i => $t) {
          $selected = ($t == $qualification) ? " selected" : "";
          echo '<option value="' . $t . '"' . $selected . '>' . $t . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-black-tie icon"></i>
    <input class="input-field" type="number" placeholder="Enter experience" min="0" max="30" name="experience" value="<?php echo (int)$experience ?>"
      required>
  </div>

  <div class="input-container">
    <i class="fa fa-file-text icon"></i>
    <input class="input-field" type="text" name="joined" value="<?php echo $joined ?>" readonly disabled>
  </div>

  <br>

  <button type="submit" name="update" class="btn">Update Information</button>
</form>

<br>

<a href="change_password.php" style="max-width:500px; margin: 0 auto; display:block" class="btn">Change password</a>
