<?php
// Start a PHP session
session_start();

// Include database connection file
include_once "db_connection.php";

// Check if user is logged in
if(!isset($_SESSION['userid'])){
    // Redirect user to login page
    header("Location: /ems/login.php");
    exit();
}

// Get user information from database
$userid = $_SESSION['userid'];
$query = "SELECT * FROM student_tab WHERE userid ='$userid'"; 
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuStudents.php'; ?>

</head>


<body>
    <center> 
        <h1> Student Information </h1> 
        <br> </br> 
    <div class="card mb-3" style="max-width: 550px;">
    <div class="row g-0">

        <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title" align="justify">Student Information</h5>
            <h5 class="card-title" align="justify">Name:  <?php echo $row['student_name']; ?></h5>
            <h5 class="card-title" align="justify">Year: <?php echo ($row['student_year']); ?></h5>
            <h5 class="card-title" align="justify">Student ID:  <?php echo $row['student_id']; ?></h5>
            <h5 class="card-title" align="justify">User ID:  <?php echo $row['userid']; ?></h5>
            <h5 class="card-title" align="justify">Year of Enrollment: <?php echo $row['student_year_enrollment']; ?></h5>
            <h5 class="card-title" align="justify">Major: <?php echo ($row['student_major']); ?></h5>
            <h5 class="card-title" align="justify">Expected Date of Graduation: <?php echo ($row['student_year_graduation']); ?></h5>
        </div>
        </div>
        <div class="col-md-4">
        <img src=" <?php echo $row['img']; ?>"  height="315px"alt="">
        </div>
    </div>
    </div>
</center> 

</body> 


</html> 