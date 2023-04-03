<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuAdmin.php'; ?>
</head>
  <body>

  <section class="h-100 h-custom" style="background-color: #8fc4b7;">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://utulsa.edu/wp-content/uploads/2022/07/samson-plaza-students-1200x455.jpg"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Course Registration</h3>

            <form id="login" class="input-group" action="registerProcessCourse.php" method="post" enctype="multipart/form-data">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name = "courseid" />
                    <label for="exampleDatepicker1" class="form-label">Course ID</label>
                  </div>

                </div>
                    <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name = "coursename" />
                    <label for="exampleDatepicker1" class="form-label">Course Name</label>
                  </div>

                </div>
                <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                    <select class="form-control" name="facultyname" onchange="updateFacultyId(this.value)">
                        <option value="">Select Faculty</option>
                        <?php
                       
                        include('db_connection.php');

                       
                        $sql = "SELECT userid, faculty_id, faculty_name  FROM faculty_tab";
                        $result = mysqli_query($connect, $sql);

                        
                        while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="'.$row['faculty_id'].'" data-userid="'.$row['userid'].'">'.$row['faculty_name'].'</option>';
                        }

                        // Close the database connection
                        mysqli_close($connect);
                        ?>
                    </select>
                    <label for="exampleDatepicker1" class="form-label">Faculty Name</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                    <input type="text" class="form-control" name="facultyid" id="facultyid" readonly />
                    <label for="exampleDatepicker1" class="form-label">Faculty ID</label>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                    <input type="text" class="form-control" name="userid" id="userid" readonly />
                    <label for="exampleDatepicker1" class="form-label">User ID</label>
                    </div>
                </div>
                </div>

                <!-- update the faculty ID field -->
                <script>
                function updateFacultyId(facultyId) {
                    var selectedOption = document.querySelector('option[value="'+facultyId+'"]');
                    var userid = selectedOption.getAttribute('data-userid');
                    document.getElementById("facultyid").value = facultyId;
                    document.getElementById("userid").value = userid;
                }
                </script>


  
              </div>
              <div class="row">
                 <div class="col-md-6 mb-4">

                  <select class="select" name = "offered">
                    <option value="1">Ofered in</option>
                    <option value="Fall Semester">Fall Semester</option>
                    <option value="Spring Semester">Spring Semester</option>
                  </select>

                </div>
                
                <div class="col-md-6 mb-4">

                  <select class="select" name = "year">
                    <option value="1">Year</option>
                    <option value="Freshman">Freshman</option>
                    <option value="Sophomore">Sophomore</option>
                    <option value="Junior">Junior</option>
                    <option value="Senior">Senior</option>
                  </select>

                </div>
                    <div class="col-md-6 mb-4">

                  <select class="select" name = "major">
                  <option value="Major">Major</option>
                      <option value="Computer Science">Computer Science</option>
                      <option value="Mechanical Engineering">Mechanical Engineering</option>
                      <option value="Electrical Engineering">Electrical Engineering</option>
                      <option value="Business">Business</option>
                      <option value="Data Analyst">Data Analyst</option>
                  </select>

                </div>
                

                </div>
                
                <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name = "credits" />
                    <label for="exampleDatepicker1" class="form-label">Credits</label>
                  </div>

                </div>
                    <div class="col-md-6 mb-4">

                  <div class="form-outline datepicker">
                    <input type="text" class="form-control" name = "pre" />
                    <label for="exampleDatepicker1" class="form-label">Pre-requisites</label>
                  </div>

                </div>
              <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </body>
</html>