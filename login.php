<?php
include('header.php');
ini_set('display_errors', 1);
// error_reporting(E_ALL);
error_reporting(E_ALL ^ E_WARNING);

if($_SERVER['REQUEST_METHOD']=="POST"){
$username=$_POST['email'];
$password=$_POST['password'];
$con=mysqli_connect("localhost","newuser","test@123","apex_global");
$query="SELECT * FROM users where email='$username' and password='$password'"; echo $query;
$res=mysqli_query($con,$query);
$rows = mysqli_num_rows($res);
session_start();
 if($rows==1){
 	header('location:index.php');
 	$_SESSION['email']=$username;
 }
else{
	echo "INVALID EMAIL AND PASSWORD";
}
}
?> 

  <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>

                <form method="POST" action="login.php">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" name="email" placeholder="Enter your Email" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" name="password" placeholder="Enter your password" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>
 

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>&nbsp;
                    <button  type="submit" class="btn btn-outline-danger"><a href="add.php">Create new</a></button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 
<?php 
include('footer.php'); ?>

