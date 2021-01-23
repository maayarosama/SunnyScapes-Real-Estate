<?php
 include('header.php');
session_start();
?>

<html>
<?php
$nameErr = "";
?>
<html lang="en">
<?php
if(!empty($_SESSION['acctype'])) {
$acctype=$_SESSION['acctype'];
if($acctype=="3"){
  ?>
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="adminview.php">Edit Properties</a></li>
       <li><a href="deleteusers.php">Delete Users</a></li>
          <li ><a href="admin_help.php">Edit Q & A</a></li>
          <li class="menu-active"><a href="ContactUs_admin.php">Answer Q & A</a></li>
              <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="Logout.php">Log Out</a></li>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php
}
else{
  echo "<script>alert('You are not allowed to visit this page only admins can view');</script>";
 echo '<script>window.location.href= "index.php";</script>';
}
}

?>




<body>
  <br>
  <br>
  <br>
  <br>
  <div class="adminhelp">
  <section id="aboutus" class="wow fadeIn">
      <div class="container text-center">
          <h3>Contact Us</h3>
        </div>
    </section>
    <br><br>

  </section>
  <div class="container">

      <div class="col-md-3">

        <h1 class = "headersignup">ContactUs</h1>
          <div class="card-body card-block">





<br/>

<?php
 include("connection.php");
 


$sql = "SELECT *FROM contact_us";
$result= mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);

if(mysqli_num_rows($result)>0){
	//echo"sjhs";
while($res = mysqli_fetch_array($result))
{
	$id=$res['id'];
	?>

  <div class="containerQA">

	<form action="ContactUs_help.php" method="post" name="q&aform.<?php $id?>.">
	<?php
$username=$res['username'];
$message=$res['message'];
?>
 <div class="col-md-12">
<?php


	echo"Username: ".$res["username"]."<br/>";
	echo"Question: ".$res["message"]."<br/>";
	$answer=$res['answer'];
	echo"Answer: <input type='text' class='form-control' name='answer' value='$answer'><br/>";
	echo"<input type='hidden' name='id' value= '$id' >";
    echo"<input class='btnadminhelp btn-success btn-sm' type='submit' name='submit' value='Add To Q & A'><br/>";

?>
</form>
</div>
</div>
<?php

}
}
?>



</div>
</div>

</div>

</body>
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
</html>
