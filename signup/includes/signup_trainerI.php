<?php

  if(!isset($_POST['submit'])) {
    header("Location: ../signup_trainer.php");
    exit();
  }

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];
  $phone = $_POST['phone'];
  $type = $_POST['type'];
  $salary = $_POST['salary'];
  $specialization = $_POST['specialization'];
  $qualification = $_POST['qualification'];
  $experience = $_POST['experience'];

  // Validate first name
  if(!preg_match("/^[a-zA-Z]*$/", $fname)){
    header("Location: ../signup_trainer.php?signup=mismatch&lname=$lname&email=$email&username=$username&phone=$phone&type=$type&salary=$salary&specialization=$specialization&qualification=$qualification&experience=$experience");
    exit();
  }
  // Validate Last name
  if(!preg_match("/^[a-zA-Z]*$/", $lname)){
    header("Location: ../signup_trainer.php?signup=mismatch&fname=$fname&email=$email&username=$username&phone=$phone&type=$type&salary=$salary&specialization=$specialization&qualification=$qualification&experience=$experience");
    exit();
  }

  require('../../includes/db.php');

  // if registered email
  $getEmails = "SELECT email from members WHERE email=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getEmails);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  if($num) {
    header("Location: ../signup_trainer.php?signup=er&fname=$fname&lname=$lname&email=$email&username=$username&phone=$phone&type=$type&salary=$salary&specialization=$specialization&qualification=$qualification&experience=$experience");
    exit();
  }

  // if username taken
  $getUsername = "SELECT username from members WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $getUsername);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);

  $num = count($row);

  mysqli_stmt_close($stmt);

  if($num) {
    header("Location: ../signup_trainer.php?signup=ur&fname=$fname&lname=$lname&email=$email&username=$username&phone=$phone&type=$type&salary=$salary&specialization=$specialization&qualification=$qualification&experience=$experience");
    exit();
  }

  // Add in table members

  $date = date("Y:m:d H:i:s");
  $template = "INSERT INTO members (username, fname, lname, email, phone, joined) VALUES(?, ?, ?, ?, ?, ?);";

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ssssss", $username, $fname, $lname, $email, $phone, $date);
  $executed = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);

  if(!$executed) {
    header("Location: ../signup_trainer.php?signup=error");
    exit();
  }

  // Add in table trainer

  $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
  $experience = (int)$experience;
  $salary = (int)$salary;
  $template = "INSERT INTO trainer (username, password, specialization, qualification, experience, salary, type) VALUES(?, ?, ?, ?, ?, ?, ?);";

  $statement = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($statement, $template);
  mysqli_stmt_bind_param($statement, "ssssiis", $username, $hashedPwd, $specialization, $qualification, $experience, $salary, $type);
  $executed1 = mysqli_stmt_execute($statement);
  mysqli_stmt_close($statement);
  if($executed1) {
    header("Location: ../../login/login.php?signup=success");
    exit();
  }
  else {
   header("Location: ../signup_trainer.php?signup=error");
  }
?>
