<?php

  if(!isset($_POST['submit'])){
    header("Location: ../login.php");
    exit();
  }

  $name = $_POST['name'];
  $password = $_POST['password'];
  // echo "name is: ".$name." password is: ".$password."<br>";

  require('../../includes/db.php');

  // Search in clients
  $getEmails1 = "SELECT c.username, password from client as c, members as m WHERE c.username=m.username and (m.email=? OR c.username=?)";

  $stmt1 = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt1, $getEmails1);
  mysqli_stmt_bind_param($stmt1, "ss", $name, $name);
  mysqli_stmt_execute($stmt1);

  $result1 = mysqli_stmt_get_result($stmt1);
  $row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
  $num1 = count($row1);

  mysqli_stmt_close($stmt1);

  // If not found in table 'client', search in table 'trainer'
  if($num1 == 0) {

    $getEmails2 = "SELECT t.username, password from trainer as t, members as m WHERE t.username=m.username and (m.email=? OR t.username=?)";

    $stmt2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt2, $getEmails2);
    mysqli_stmt_bind_param($stmt2, "ss", $name, $name);
    mysqli_stmt_execute($stmt2);

    $result2 = mysqli_stmt_get_result($stmt2);
    $row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
    $num2 = count($row2);

    mysqli_stmt_close($stmt2);

    // If not found in table 'trainer' also
    if($num2 == 0) {
      header("Location: ../login.php?login=nr&name=$name");
      exit();
    }
    // If user is a trainer
    else {

      $userPassword = $row2[1];
      // print_r($row);
      $pwdOk = password_verify($password, $userPassword);

      if($pwdOk == false) {
        header("Location: ../login.php?login=wp&name=$name");
        exit();
      }

      elseif($pwdOk == true) {

        session_start();

        $uid = $row2[0];
        $type = "trainer";
        $_SESSION['uid'] = $uid;
        $_SESSION['type'] = $type;

        header("Location: /gym_management/index.php?login=success&type=trainer");
        exit();
      }
    }
  }
  // User is a client
  else {
    $userPassword = $row1[1];
    // print_r($row);
    $pwdOk = password_verify($password, $userPassword);

    if($pwdOk == false) {
      header("Location: ../login.php?login=wp&name=$name");
      exit();
    }

    elseif($pwdOk == true) {

      session_start();

      $uid = $row1[0];
      $type = "client";
      $_SESSION['uid'] = $uid;
      $_SESSION['type'] = $type;

      header("Location: /gym_management/index.php?login=success&type=client");
      exit();
    }
  }
?>

