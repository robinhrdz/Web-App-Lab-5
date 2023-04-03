<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $courseid = $_POST['courseid'];
  $coursename = $_POST['coursename'];
  $facultyid = $_POST['facultyid'];
  
  $faculty_query = "SELECT faculty_name FROM faculty_tab WHERE faculty_id = '$facultyid'";
  $faculty_result = mysqli_query($connect, $faculty_query);
  if(mysqli_num_rows($faculty_result) == 0) {
    echo 'Invalid faculty ID.';
    exit();
  }
  $faculty_row = mysqli_fetch_assoc($faculty_result);
  $facultyname = $faculty_row['faculty_name'];
  
  $offered = $_POST['offered'];
  $credits = $_POST['credits'];
  $pre = $_POST['pre']; 
  $major = $_POST['major']; 
  $year = $_POST['year']; 
  
  if(empty($courseid) || empty($coursename) || empty($facultyid) || empty($facultyname) || empty($offered) ||
   empty($credits) || empty($pre)|| empty($credits)|| empty($pre)|| empty($major)|| empty($year)) {
    echo 'Please fill all the required fields.';
    exit();
  }

  $sql = "INSERT INTO courses_tab (sid, course_id, course_name, faculty_id, faculty_name, offered_in, credits, pre_req, course_major, course_year_student) 
  VALUES (NULL, '$courseid', '$coursename', '$facultyid', '$facultyname' , '$offered', '$credits', '$pre', '$major', '$year')";

  if(mysqli_query($connect, $sql)) {
    echo '<script>window.alert("Course data added successfully.")</script>';
    header("Location: addCourse.php");
    exit();
  } 
  else {
    echo 'Error: '.mysqli_error($connect);
  }
  mysqli_close($connect);  
}

?>