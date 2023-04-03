<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuAdmin.php'; ?>
</head>
  <body>

  <section class="h-100 bg-dark">
  <form id="login" class="input-group" action="registerProcess.php" method="post">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://media.istockphoto.com/id/1002859060/photo/all-on-the-journey-of-a-better-future.jpg?s=612x612&w=0&k=20&c=ZwFbrJjPrkL9lmhDoGUCeWVc3ea5CnIQlcwNqaHKiJk="
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Student registration form</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="firstname" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name = "lastname" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1n">Last name</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="studentid" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m1">Student ID</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text"name = "userid" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1n1">User ID</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <select class="select" name ="selectmajor">
                      <option value="Major">Major</option>
                      <option value="Computer Science">Computer Science</option>
                      <option value="Mechanical Engineering">Mechanical Engineering</option>
                      <option value="Electrical Engineering">Electrical Engineering</option>
                      <option value="Business">Business</option>
                      <option value="Data Analyst">Data Analyst</option>

                    </select>

                  </div>
                  <div class="col-md-6 mb-4">
                    
                    <select class="select" name="selectdepartment">
                      <option value="Department">Department</option>
                      <?php
                      include('db_connection.php');
                      $sql = "SELECT department_name FROM department_tab";
                      $result = mysqli_query($connect, $sql);

                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['department_name'].'">'.$row['department_name'].'</option>';
                      }
                      mysqli_close($connect);
                      ?>
                    </select>


                  </div>
                  <div class="col-md-6 mb-4">

                <select class="select" name = "year">
                <option value="Year">Year</option>
                <option value="Freshman">Freshman</option>
                <option value="Sophomore">Sophomore</option>
                <option value="Junior">Junior</option>
                <option value="Senior">Senior</option>
                </select>

                </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name ="GPA" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example9">GPA</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name = "yearofenrollment" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example90">Year of Enrollment</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name = "expectedgraduationdate" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example99">Expected Year of Graduation</label>
                </div>
                <div class="input-group mb-3" >

                    <input type="file" class="form-control" name = "picture">
                </div>
                    Picture

                <div class="d-flex justify-content-end pt-3">
                  <button type="submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
 

  </body>
</html>