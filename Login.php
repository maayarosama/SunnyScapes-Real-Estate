<html lang="en">
<?php session_start() ?>
  <?php include('header.php'); ?>
  <header id="header">
      <div class="container-fluid">

        <div id="logo" class="pull-left">
          <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li ><a href="index.php">Home</a></li>
            <li><a href="About.php">Q & A</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="Signup.php">Signup</a></li>
            <li class="menu-active"><a href="Login.php">Login</a></li>

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
            <h3>Login</h3>
          </div>
      </section>
      <br><br>

  <div class="container">

      <div class="col-md-3">
          <h1 class = "headersignup">Login</h1>
              <div class="card-body card-block">
        <form method = "post" action = "">
            Username:<br>
            <input type="text" class="form-control" placeholder="Username" name ="username" required="required">
            Password:<br>
            <input type="password" class="form-control" placeholder="Password" name="Password" required="required">
            <br>
            <button type="submit" class="btn btn-success btn-sm" name = "submit">
            <i class="fa fa-dot-circle-o"></i> Submit
          </button>
          <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
          </button>
          <br>
          <br>
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
 
 if (isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['Password'];
$sql="SELECT * FROM human WHERE username='$username' AND password='$password'";
if($result = mysqli_query($conn, $sql)){
			  		 error_log("$sql..",3,"databaseoperations.log");
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
	echo "<script>alert('Logged in Successfully');</script>";
  $acctype = $row['acctype'];
	  $_SESSION['username']=$username;
	  $_SESSION['acctype']=$acctype;
	 echo '<script>window.location.href= "index.php";</script>';
 }
	}
	else
	{ trigger_error("......falid logging in.....");
		echo "<script>alert('Wrong username or password.');</script>";
	}
}else {$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");}
 }
?>
