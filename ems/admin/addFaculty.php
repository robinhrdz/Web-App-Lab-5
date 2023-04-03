<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


    <?php include 'topMenuAdmin.php'; ?>
</head>
  <body>
  <section class="vh-100 gradient-custom">
  <form id="login" class="input-group" action="registerProcessFaculty.php" method="post" enctype="multipart/form-data">

  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Faculty Registration Form</h3>
            <form>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="firstname" class="form-control form-control-lg" />
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text"name="lastName" class="form-control form-control-lg" />
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" name = "userid" />
                    <label for="birthdayDate" class="form-label">User ID</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 d-flex align-items-center">

                <div class="form-outline datepicker w-100">
                <input type="text" class="form-control form-control-lg" name = "facultyid" />
                <label for="birthdayDate" class="form-label">Faculty ID</label>
                </div>

                </div>
               
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="date" name = "dateofjoin" class="form-control form-control-lg" />
                    <label class="form-label" for="emailAddress">Date of Join</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" name = "qualification" class="form-control form-control-lg" />
                    <label class="form-label" for="phoneNumber">Faculty Qualification</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-12">
                <select class="select" name="department">
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

              </div>

              <br/> 
             
              <div class="input-group mb-3" >
                    
                <input type="file" class="form-control" name = "picture">
                </div>
                Picture
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>
              

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>

  </body>
</html>