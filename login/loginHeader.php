<?php

session_start();
if(isset($_SESSION['uid'])) {
  header("Location: ../index.php");
  exit();
}

?>
<link rel="stylesheet" type="text/css" href="/gym_management/assets/css/login.css">
