<?php

  session_start();
  if($_SESSION['type'] != "admin") {
    header("Location: ../index.php");
    exit();
  }

  require('../includes/header.php');
  require('../includes/db.php');

  $status = $_GET['edit'];

  if($status == "success") {
?>

    <div class="alert alert-success">
      <strong>Success!</strong> Information updated successfully
    </div>
<?php

    }
  elseif($status == "error") {
?>

<div class="alert alert-danger">
  <strong>Error!</strong> Could not update details
</div>

<?php
  }

  $getDetails = "SELECT username from admin WHERE username=?";

  $stmt1 = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt1, $getDetails);
  mysqli_stmt_bind_param($stmt1, "s", $_SESSION['uid']);
  mysqli_stmt_execute($stmt1);

  mysqli_stmt_bind_result($stmt1, $username);

  mysqli_stmt_fetch($stmt1);
  mysqli_stmt_close($stmt1);
?>

<link rel = "stylesheet" href = "/gym_management/assets/css/font-awesome.min.css"></link>
<link rel = "stylesheet" type = "text/css" href = "/gym_management/assets/css/admin.css">


<form action = "./includes/edit_detailsI.php" method = "POST" style = "max-width:500px;margin:auto">
  <h2>Update personal information</h2>

  <div class = "input-container">
    <i class = "fa fa-user icon"></i>
    <?php
        echo '
          <input class = "input-field" type = "text" name = "username" value = "'.$username.'" readonly>
        ';
    ?>
  </div>
  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "password" maxlength = "16" placeholder = "Enter new password" name = "password" required >
  </div>

  <div class = "input-container">
    <i class = "fa fa-key icon"></i>
    <input class = "input-field" type = "password" maxlength = "16" placeholder = "Enter new key" name = "key" required >
  </div>
  <button type = "submit" name = "update" class = "btn">Update</button>

</form>
