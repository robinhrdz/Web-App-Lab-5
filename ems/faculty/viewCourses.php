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
$query = "SELECT * FROM courses_tab WHERE userid ='$userid'"; 
$result = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuFaculty.php'; ?>

</head>


<body>
<?$row = mysqli_fetch_assoc($result);?>
<h1 align="center"> Courses Taught </h1> 
<div class="row row-cols-2 g-3">

  <?php
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
 
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Course Information</h5>
        <h5 class="card-title">Course ID:  <?php echo $row['course_id']; ?></h5>
        <h5 class="card-title">Course Name:  <?php echo $row['course_name']; ?></h5>
        <h5 class="card-title">Faculty Name: <?php echo $row['faculty_name']; ?></h5>
        <h5 class="card-title">Offered In: <?php echo $row['offered_in']; ?></h5>
        <h5 class="card-title">Credits: <?php echo ($row['credits']); ?></h5>
        <h5 class="card-title">Pre-requisites: <?php echo ($row['pre_req']); ?></h5>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
</div>


</body> 


</html>
