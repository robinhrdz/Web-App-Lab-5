<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $departmentid = $_POST['departmentid'];
  $departmentname = $_POST['departmentname'];
  $departmentchair = $_POST['departmentchair'];
  $departmentdean = $_POST['departmentdean'];
  $departmentbudget = $_POST['departmentbudget'];

  
  if(empty($departmentid) || empty($departmentname) || empty($departmentchair) || empty($departmentdean) || empty($departmentbudget) ) {
    echo 'Please fill all the required fields.';
    exit();
  }

  $sql = "INSERT INTO department_tab (sid, department_id, department_name, department_chair, department_dean, department_budget) 
  VALUES (NULL, '$departmentid', '$departmentname', '$departmentchair', '$departmentdean' , '$departmentbudget')";

  if(mysqli_query($connect, $sql)) {
    echo '<script>window.alert("Department data added successfully.")</script>';
    header("Location: addDepartment.php");
    exit();
  } 
  else {
    echo 'Error: '.mysqli_error($connect);
  }
  mysqli_close($connect);


  
}

?>