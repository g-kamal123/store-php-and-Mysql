<?php session_start();
if(isset($_COOKIE['email_user']))
$_SESSION['email_user'] = $_COOKIE['email_user'];
if(isset($_COOKIE['admin_user']))
$_SESSION['admin_user'] = $_COOKIE['admin_user'];
if(isset($_SESSION['email_user']))
header('location:frontpage.php');
if(isset($_SESSION['admin_user']))
header('location:admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="storesignin.css">
    <link rel="stylesheet" href="modal.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
  <div id="overlay"></div>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://media.istockphoto.com/vectors/vegetables-in-circle-vector-id669021974?b=1&k=20&m=669021974&s=612x612&w=0&h=rJ3XhY_aNnF423GZ9OnuZrvrCD5EsTCsCbx2g9oFsBk="
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3"><h2>Sign In</h2></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"  value= "<?php if(isset($_COOKIE['email_user'])){echo $_COOKIE['email_user'];} ?>"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address <span id="email_check"></span></label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg" value= "<?php if(isset($_COOKIE['pass_user'])){echo $_COOKIE['pass_user'];} ?>"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password <span id="check_password"></span></label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <button class="text-body open-modal" id="open-modal">Forgot password?</button>
            <!-- <div class="my-modal" id="my-modal">
              <div class="modal-header">
                <div class="title">create new password</div>
                <button id="close-modal">&times</button>
              </div>
              <div class="modal-body">
                <p>jhgbfgjrugrrriuurhr
                  juhghughughghfgfgg
                  fdhuidhdiughuhughugh
                  dhduihghgghgghggghg
                  djhduhdguhudhuhgugh
                </p>
              </div>
            
            </div> -->
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="storesignup.php"
                class="link-danger">Register</a></p>
          </div>

      </div>
    </div>
  </div>
</section>
<!-- <div class="d-flex justify-content-between align-items-center"> -->
<div class="my-modal" id="my-modal">
              <div class="modal-header">

                <div class="title"><h3>create new password</h3></div>
                <button id="close-modal">&times</button>
              </div>

              <div class="modal-body">

              <div class="form-outline mb-4">
            <input type="text" id="currentemail" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" >Email address <span id="emailcheck"></span></label>
          </div>
              <div class="form-outline mb-3">
            <input type="text" id="newpass" class="form-control form-control-lg"
              placeholder="Enter password 8 char" />
            <label class="form-label" >Enter new password<span id="passstrength"></span></label>
          </div>
          <div class="form-outline mb-3">
            <input type="text" id="cnfpass" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4d">Confirm new password<span id="passsspan"></span></label>
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="button" value="Update" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">
              </div>
            
            </div>
</div>
<script src="loginserver.js"></script>
<script src="modal.js"></script>
<script src="forgotpassword.js"></script>
</body>
</html>