<html lang="en">

  <?php include('header.php'); ?>
  <header id="header">
        <div class="container-fluid">
          <div id="logo" class="pull-left">
            <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li><a href="index.php">Home</a></li>
              <li><a href="About.php">Q & A</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
              <li class="menu-active"><a href="Signup.php">Signup</a></li>
              <li><a href="Login.php">Login</a></li>
          </nav><!-- #nav-menu-container -->
        </div>
      </header><!-- #header -->
      <br>
      <br>
      <br>
      <br>
      <div class="adminhelp">
      <section id="aboutus" class="wow fadeIn">
          <div class="container text-center">
              <h3>Sign Up</h3>
            </div>
        </section>
        <br><br>
  <div class="container">
      <div class="col-md-3">
        <h1 class = "headersignup">SignUp</h1>
          <div class="card-body card-block">
      <form name="signup" method = "POST" action ="" >
        First Name:<br>
          <input type="text" class="form-control" placeholder="First Name" name="FName" required="required">
          Last Name:<br>
            <input type="text" class="form-control" placeholder="Last Name" name="LName" required="required">
          Email:<br>
          <input type="email" class="form-control" placeholder="Email" name ="Email" required="required">
          Phone Number:<br>
          <input type="number" class="form-control" placeholder="Phone Number" name ="Phone" required="required">
          Age:<br>
          <input type="number" class="form-control" placeholder="Age" name ="Age" required="required">
          Username:<br>
          <input type="text" class="form-control" placeholder="Username" name ="Username" required="required">
          Password:<br>
          <input type="password" class="form-control" placeholder="Password" name="Password" required="required">
          <div class="form-group">
          <label>Account Type: </label>
          <select name="AccTypeID" id="AccTypeID" class="form-control" required="required">
          <?php require_once "get_acctype.php"; ?>
          </select>
<p>
</p>
<button type="submit" class="btn btn-success btn-sm" name = "submit">
<i class="fa fa-dot-circle-o"></i> Submit
</button>
        <button type="reset" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Reset
        </button>
        <br>  <br>
        </form>
    </div>
    </div>
    </div>
    </div>
  <?php include('footer.php'); ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>
<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<?php
include("connection.php");

$Fname=$_POST['FName'];
$Lname=$_POST['LName'];
$email=$_POST['Email'];
$username=$_POST['Username'];
$PhoneNo=$_POST['Phone'];
$Agenum=$_POST['Age'];
$password=$_POST['Password'];
$accID=$_POST['AccTypeID'];
   function checkphone($number , $length){
			if($number < 0 || $length !== 11)
			throw new Exception ("phone number not valid");
			}
  function checkage($num){
			if($num < 20 || $num > 150 )
			throw new Exception ("age must be 21 at least");
			}

if (isset($_POST['submit'])){

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('$email is a not valid email address');</script>";
		trigger_error("A custom error in email address has been triggered ");
		 die("Invalid");
        }

		$phonelength=strlen("$PhoneNo");
		try{
             checkphone($PhoneNo,$phonelength);
			 }
			catch(Exception $e){
            $emesg=	$e->getMessage();
			echo "<script>alert('$emesg')</script>";
			die();
			}
		try{
             checkage($Agenum);
			 }
			catch(Exception $e){
            $mesg=	$e->getMessage();
			echo "<script>alert('$mesg')</script>";
			die();
			}

$checkemail=" SELECT email FROM human WHERE email='$email' ";
$checkusername=" SELECT username FROM human WHERE username='$username' ";
$sql = "INSERT INTO human (username, password,firstname,lastname,mobile,age,acctype,email)
VALUES ('$username','$password','$Fname','$Lname','$PhoneNo' ,'$Agenum','$accID','$email')";

if(mysqli_query($conn,$checkemail)|| (mysqli_query($conn,$checkusername)))
{    error_log("$sql",3,"databaseoperations.log");
     error_log("$checkusername",3,"databaseoperations.log");
      error_log("$checkemail",3,"databaseoperations.log");

	if(mysqli_num_rows(mysqli_query($conn,$checkemail))>0)
	{
	     echo "<script>alert('$email already taken try another one');</script>";
		 die();
	}
	if(mysqli_num_rows(mysqli_query($conn,$checkusername))>0)
	{
		echo "<script>alert('$username already taken try another one');</script>";
	}

	else if (mysqli_query($conn,$sql))
     {
      echo "<script>alert('Signed up successfully');</script>";
		echo '<script>window.location.href= "Login.php";</script>';
     }  else{
		 $errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
		 }

}
else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");}
}
mysqli_close($conn);
?>
