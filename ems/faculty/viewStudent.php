<?php
session_start();

include_once "db_connection.php";


if(!isset($_SESSION['userid'])){
 
    header("Location: /ems/login.php");
    exit();
}


$userid = $_SESSION['userid'];

$filter = '';
if (isset($_POST['course'])) {
    $course = $_POST['course'];
    if ($course != 'all') {
        $filter = "AND courses_tab.course_name = '$course'";
    }
}

$query = "SELECT registration_tab.student_name, registration_tab.student_id, registration_tab.year, registration_tab.course_id, 
courses_tab.course_name, student_tab.img FROM registration_tab INNER JOIN courses_tab ON registration_tab.course_id = courses_tab.course_id 
INNER JOIN student_tab ON registration_tab.student_id = student_tab.student_id WHERE registration_tab.userid ='$userid' $filter"; 
$result = mysqli_query($connect, $query);

//The data comes from different tables in the database
$query_courses = "SELECT DISTINCT courses_tab.course_name FROM registration_tab INNER JOIN courses_tab ON 
registration_tab.course_id = courses_tab.course_id WHERE registration_tab.userid ='$userid'"; 

$result_courses = mysqli_query($connect, $query_courses);

// Filtering
$options = "";
$options .= '<option value="all">Filter by Course</option>';
while($row_course = mysqli_fetch_assoc($result_courses)) {
    $selected = '';
    if (isset($_POST['course']) && $_POST['course'] == $row_course['course_name']) {
        $selected = 'selected';
    }
    $options .= '<option value="' . $row_course['course_name'] . '" ' . $selected . '>' . $row_course['course_name'] . '</option>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuFaculty.php'; ?>

</head>

<body>

<br/> 
<h1 align="center"> List of Students </h1> 
<table><tr><td>
<form method="post" action="">
<select name="course" class="form-select form-select-sm" aria-label="Default select example" style="width: 300px;">
    <?php echo $options; ?>
</select>
</td><td>
<input type="submit" value="Filter" class="btn btn-primary"/>
</form>
</td></tr></table>

<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th></th>
      <th>Name</th>
      <th>Student ID</th>
      <th>Year</th>
      <th>Course ID</th>
      <th>Course Name</th>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><img src="<?php echo $row['img']; ?>" height="150px"></td>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['course_id']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
        </tr>
        <?php } ?>

</body> 
</html> 

