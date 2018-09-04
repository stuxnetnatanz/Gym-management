<?php
  session_start();
  if($_SESSION['type'] != "client") {
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
  $getDetails = "SELECT fname, lname, m.username, email, phone, joined,
  password, weight, height, fee, purpose, history, trainer, chart
  from client c, members m
  WHERE m.username=? AND c.username = m.username";

  $stmt1 = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt1, $getDetails);
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['uid']);
  mysqli_stmt_execute($stmt1);

  mysqli_stmt_bind_result($stmt1, $fname, $lname, $username, $email, $phone, $joined,
  $password, $weight, $height, $fee, $purpose, $history, $trainer, $chart);

  mysqli_stmt_fetch($stmt1);
  mysqli_stmt_close($stmt1);
?>

<link rel="stylesheet" href="/gym_management/assets/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/client.css"></link>


<form action = "./includes/edit_detailsI.php" method = "POST" style = "max-width:500px;margin:auto">
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
    <select class="input-field" id="purpose" name="purpose" required>
      <option value="" disabled>Purpose of joining</option>
      <?php
        $PURPOSE = [
          "Weight gain",
          "Weight loss",
          "Toning",
          "Stay fit",
        ];
        foreach ($PURPOSE as $i => $t) {
          $selected = ($t == $purpose) ? " selected" : "";
          echo '<option value="' . $t . '"' . $selected . '>' . $t . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-inr icon"></i>
    <select class="input-field" id="fee" name="fee" required>
      <option value="" disabled>Choose plany</option>
      <?php
        $FEE = [
          "2000" => "Monthly Plan - Rs. 2000",
          "1800" => "Quarterly Plan - Rs. 5400 for 3 months",
          "1700" => "Special Package - Rs. 9600 for 6 months",
          "1500" => "Annual Package - Rs. 18000"
        ];
        foreach ($FEE as $key => $val) {
          $selected = ($key == $fee) ? " selected" : "";
          echo '<option value="' . $key . '"' . $selected . '>' . $val . '</option>';
        }
      ?>
    </select>
  </div>

  <div class="input-container">
    <i class="fa fa-balance-scale icon"></i>
    <input class="input-field" type="number" placeholder="Enter weight" min="30" max="999" name="weight" value="<?php echo (int)$weight; ?>"
      required>
  </div>

  <div class="input-container">
    <i class="fa fa-child icon"></i>
    <input class="input-field" type="number" placeholder="Enter Height in meters (upto 3 decimal places)" min="0" max="5" step="0.001"
      name="height" value="<?php echo (float)$height; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user-md icon"></i>
    <input class="input-field" type="text" maxlength="100" placeholder="Any notable medical history" name="history" name="history"
      required value="<?php echo $history; ?>">
  </div>

  <div class="input-container">
    <i class="fa fa-file-text icon"></i>
    <input class="input-field" type="text" name="joined" value="<?php echo $joined; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-male icon"></i>
    <input class="input-field" type="text" placeholder="No trainer assigned yet" name="trainer" value="<?php echo $trainer; ?>" readonly disabled>
  </div>

  <div class="input-container">
    <i class="fa fa-male icon"></i>
    <input class="input-field" type="text" placeholder="No trainer assigned yet" name="trainer" value="<?php echo $trainer; ?>" readonly disabled>
  </div>

  <div class = "boxx-container">
    <h3><br><br><br>Diet chart</h3>
    <hr>
    <div class = "boxx">
      <p><?php echo $chart; ?></p>
    </div>
  </div>

  <br>

  <button type = "submit" name = "update" class = "btn">Update Information</button>
</form>
<br>

<a href="change_password.php" style="max-width:500px; margin: 0 auto; display:block" class="btn">Change password</a>
