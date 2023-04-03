<?php 
session_start();

include ("db_connection.php");

$uid=($_POST['userid']);
$pwd=($_POST['password']);
$captcha = $_POST['captcha'];

//Verify Captcha
if ($captcha != $_SESSION["vercode"]) {
  echo '<script> alert("Incorrect Captcha"); window.location.href = "/ems/login.php"; </script>'; 
  exit();
}


$sql="SELECT * FROM users_tab WHERE userid='$uid' AND password='$pwd'";
$result=$connect->query($sql);
$row = $result->fetch_assoc(); 

if($row) {
  // Retrieve department from student_tab
  $sql_dept="SELECT department FROM student_tab WHERE userid='$uid'";
  $result_dept=$connect->query($sql_dept);
  $row_dept = $result_dept->fetch_assoc(); 

  //Retrieve Major from student_tab
  $sql_major = "SELECT student_major FROM student_tab WHERE userid = '$uid'"; 
  $result_major = $connect->query($sql_major);
  $row_major = $result_major->fetch_assoc(); 

  if($row['role']==='student')  //Students
  {
    // Add department to session
    $_SESSION['userid']=$uid;
    $_SESSION['password']=$pwd;
    $_SESSION['role'] = "student";
    $_SESSION['department'] = $row_dept ? $row_dept['department'] : null;
    $_SESSION['student_major'] = $row_major ? $row_major['student_major'] : null; 
    header('location: /ems/students/index.php');  
  }
  elseif($row['role']==='faculty')  //Faculty
  {
    $_SESSION['userid']=$uid;
    $_SESSION['password']=$pwd;
    $_SESSION['role'] = "faculty";
    header('location: /ems/faculty/index.php');
  }
  elseif($row['role']==='admin')  //Admin
  {
    $_SESSION['userid']=$uid;
    $_SESSION['password']=$pwd;
    $_SESSION['role'] = "admin";
    header('location: /ems/admin/index.php');
  }
  else
  {
    echo '<script> alert("User or Password not correct"); window.location.href = "/ems/login.php"; </script>'; 
  }
} else {
  echo '<script> alert("User or Password not correct"); window.location.href = "/ems/login.php"; </script>'; 
}

?> 
