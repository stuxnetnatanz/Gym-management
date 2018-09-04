<?php
  session_start();
  if($_SESSION['type'] != "trainer") {
    header("Location: ../index.php");
    exit();
  }

  require('../includes/header.php');
  require('../includes/db.php');

  $status = $_GET['update'];
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

<link rel="stylesheet" href="/gym_management/assets/css/font-awesome.min.css"></link>
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/trainer.css"></link>


<form action="./includes/update_chartI.php" method="POST" enctype="multipart/form-data" style="max-width:500px;margin:auto">
  <h2>Update client's diet chart</h2>

  <div class="input-container">
    <i class="fa fa-user-circle icon"></i>
    <input class="input-field" type="text" name="username" placeholder="Enter client username" value="<?php echo $username; ?>">
  </div>

  <div class="input-container">
    <i class="fa fa-file icon"></i>
    <input class="input-field" type="file" name="file">
  </div>

  <br>

  <button type="submit" name="update" class="btn">Update chart</button>
</form>
