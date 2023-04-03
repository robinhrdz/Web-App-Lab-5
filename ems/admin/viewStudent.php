<?php
// Start a PHP session
session_start();

// Include database connection file
include_once "db_connection.php";

// Get department names from database
$department_query = "SELECT department_name FROM department_tab"; 
$department_result = mysqli_query($connect, $department_query);

// Get user information from database
$query = "SELECT * FROM student_tab"; 

if (isset($_POST['department'])) {
  $department = $_POST['department'];
  if ($department != "all") {
    $query .= " WHERE department = '$department'";
  }
}

$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

    <?php include 'topMenuAdmin.php'; ?>
  
</head>

  <body>
<br/>
<div>
  <table>
    <tr><td>
<form method="post" action="">
<select name="department" class="form-select form-select-sm" aria-label="Default select example" style="width: 300px;">
    <option value="all">Filter by Department</option>
    <?php while($dept_row = mysqli_fetch_assoc($department_result)): ?>
      <option value="<?php echo $dept_row['department_name']; ?>"><?php echo $dept_row['department_name']; ?></option>
    <?php endwhile; ?>
</select>
    </td><td>
<input type="submit" value="Filter" class="btn btn-primary"/>
    </td></tr>
    </table>
<div>
</form>
    <div class="container mt-5">
      <h1 class="text-center mb-5">Student Information</h1>

      <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <div class="col">
            <div class="card">
                <img src="<?php echo $row['img']; ?>" class="img-fluid rounded-start my-image" alt="" width="200" height="200">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['student_name']; ?></h5>
                <ul class="list-unstyled">
                  <li>Student ID: <?php echo $row['student_id']; ?></li>
                  <li>User ID: <?php echo $row['userid']; ?></li>
                  <li>Department: <?php echo $row['department']; ?></li>
                  <li>Year: <?php echo $row['student_year']; ?></li>
                  <li>Year of Enrollment: <?php echo $row['student_year_enrollment']; ?></li>
                  <li>Major: <?php echo $row['student_major']; ?></li>
                  <li>Expected Date of Graduation: <?php echo $row['student_year_graduation']; ?></li>
                </ul>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>


  </body> 
</html>
