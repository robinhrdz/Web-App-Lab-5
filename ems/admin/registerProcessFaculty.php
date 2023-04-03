<?php
include 'db_connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastName'];
  $facultyid = $_POST['facultyid'];
  $userid = $_POST['userid'];
  $dateJoin = $_POST['dateofjoin'];
  $qualification = $_POST['qualification'];
  $department = $_POST['department']; 
  $picture = $_FILES['picture']['tmp_name']; // Get the temporary path of the uploaded image file
  
  if(empty($firstname) || empty($lastname) || empty($facultyid) || empty($userid) || empty($dateJoin) || empty($qualification) || empty($department)|| empty($picture)) {
    echo 'Please fill all the required fields.';
    exit();
  }


  $fullname = mysqli_real_escape_string($connect, $_POST['firstname']) . ' ' . mysqli_real_escape_string($connect, $_POST['lastName']);

  // Set the destination folder and filename for the uploaded image
  $filename = $_FILES['picture']['name']; 
  $destination = $_SERVER['DOCUMENT_ROOT'] . '/ems/faculty/img/' . $filename;

  // Move the uploaded image file to the destination folder
  if(move_uploaded_file($picture, $destination)) {
    // Insert form data into the database
    $sql = "INSERT INTO faculty_tab (sid, userid, faculty_id, faculty_name, faculty_date_join, faculty_qualification, department, img) 
    VALUES (NULL, '$userid', '$facultyid', '$fullname', '$dateJoin' , '$qualification', '$department', '/ems/faculty/img/$filename')";

    if(mysqli_query($connect, $sql)) {
        echo '<script>window.alert("Faculty data added successfully.")</script>';
        header("Location: addFaculty.php");
        exit();
        
    } 
    else {
      echo 'Error: '.mysqli_error($connect);
    }
  }
  else {
    echo 'Error uploading image file.';
  }

  mysqli_close($connect);
}

?>