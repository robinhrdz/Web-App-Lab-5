<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $studentid = $_POST['studentid'];
  $userid = $_POST['userid'];
  $selectmajor = $_POST['selectmajor'];
  $selectdepartment = $_POST['selectdepartment'];
  $year = $_POST['year'];
  $enrollment = $_POST['yearofenrollment']; 
  $graduation = $_POST['expectedgraduationdate'];
  $GPA = $_POST['GPA'];

  
  if(empty($firstname) || empty($lastname) || empty($studentid) || empty($userid) || empty($selectmajor) || empty($selectdepartment) || empty($year)) {
    echo 'Please fill all the required fields.';
    exit();
  }


  $fullname = mysqli_real_escape_string($connect, $_POST['firstname']) . ' ' . mysqli_real_escape_string($connect, $_POST['lastname']);

  

  // Move the uploaded image file to the destination folder
    // Insert form data into the database
    $sql = "INSERT INTO student_tab (sid, userid, student_id, student_name, student_year_enrollment, student_major, student_year, department, student_GPA, student_year_graduation) 
    VALUES (NULL, '$userid', '$studentid', '$fullname', '$enrollment' , '$selectmajor', '$year', '$selectdepartment', '$GPA', '$graduation')";
  
    if(mysqli_query($connect, $sql)) {
        echo '<script>window.alert("Student data added successfully.")</script>';
        header("Location: addStudent.php");
        exit();
        
    } 
    else {
      echo 'Error: '.mysqli_error($connect);
    }
  

  mysqli_close($connect);
}

?>