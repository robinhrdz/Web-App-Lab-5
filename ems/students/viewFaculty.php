<?php
// Start a PHP session
session_start();

// Include database connection file
include_once "db_connection.php";

// Check if user is logged in
if(!isset($_SESSION['department'])){
    // Redirect user to login page
    header("Location: /ems/login.php");
    exit();
}

// Get user information from database
$department = $_SESSION['department'];
$query = "SELECT * FROM faculty_tab WHERE department ='$department'"; 
$result = mysqli_query($connect, $query);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <?php include 'topMenuStudents.php'; ?>
  </head>
  <body>
  <?php $count = 0; ?>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <?php if($count % 4 == 0) { ?>
            <center><h1 class="card-title">Department: <?php echo $row['department']; ?></h1></center>
            <br></br> 

  <div class="container">

            <div class="row">
        <?php } ?>
        <div class="col-sm-4">
            <div class="card" style="width: 20rem;">
                <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Name:  <?php echo $row['faculty_name']; ?></h5>
                    <h5 class="card-title">Faculty ID:  <?php echo $row['faculty_id']; ?></h5>
                    <h5 class="card-title">User ID:  <?php echo $row['userid']; ?></h5>
                    <h5 class="card-title">Department: <?php echo $row['department']; ?></h5>
                </div>
            </div>
        </div>
        <?php $count++; ?>
        <?php if($count % 4 == 0) { ?>
            </div>
        <?php } ?>
    <?php } ?>
    <?php if($count % 4 != 0) { ?>
        </div>
    <?php } ?>
</div>

 

   

  </body>
</html>
