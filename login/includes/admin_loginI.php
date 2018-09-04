<?php

  if(!isset($_POST['submit'])){
    header("Location: ../login_admin.php");
    exit();
  }

  $name_user = $_POST['name'];
  $password_user = $_POST['password'];
  $adminKey_user = $_POST['adminKey'];

  require('../../includes/db.php');

  // Search admin
  $getAdmin = "SELECT username, password, adminKey from admin
  WHERE username = ?";

  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getAdmin);
  mysqli_stmt_bind_param($stmt, "s", $name_user);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_array($result);
  $num = count($row);

  mysqli_stmt_close($stmt);
  if($num > 0 ) {
    $encryptPwd = $row[1];
    $encryptKey = $row[2];
    $pwdOk = password_verify($password_user, $encryptPwd);
    $keyOk = password_verify($adminKey_user, $encryptKey);
    if($pwdOk != true or $keyOk != true) {
      header("Location: ../login_admin.php?login=wd&name=$name_user");
      exit();
    }
    session_start();
    $uid = $row[0];
    $type = "admin";
    $_SESSION['uid'] = $uid;
    $_SESSION['type'] = $type;

    header("Location: /gym_management/index.php?login=success&type=admin");
  }
  else {
    header("Location: ../login_admin.php?login=wd&name=$name_user");
    exit();
  }
?>
