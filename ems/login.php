<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="css/design.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    
</head>
  <body>
  <section class="vh-100" style="background-color: #336699;">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?w=2000"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form class="form" id="login-form" action="redirect.php" method="POST">


                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Log in</span>
                  </div>

            

                  <div class="form-outline mb-4" name = "userid">
                    <input type="text" name = "userid" class="form-control form-control-lg" required/>
                    <label class="form-label" for="form2Example17">User ID</label>
                  </div>

                  <div class="form-outline mb-4" name = "password">
                    <input type="password" name = "password" class="form-control form-control-lg"required />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>
        
                  <div> 
                    
                    <input type="text" id="captcha" name="captcha"  class="form-control form-control-lg"required />
                    <label class="form-label" for="form2Example27">Enter Captcha</label><br><br>
                    <img id="captcha-img" src="captcha.php" alt="Captcha Image">
                    <br></br>
                    <button type="button" class="btn btn-dark btn-lg btn-block" id="refresh">Refresh Captcha</button></div>
                    <script src = "js/cap.js"></script>
                <br></br>
                  <div class="pt-1 mb-4">
                  <input type="submit" id="form2Example27" class="btn btn-dark btn-lg btn-block" />
                  </div>
                  <div class="form-group">
 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </body>
</html>