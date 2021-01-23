<?php
require_once"header.php";
session_start();
?>
<?php
	if(!isset($_SESSION['acctype']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "login.php";</script>';
}
   else{
         $acctype=$_SESSION['acctype'];
   }
if($acctype=="3"){
  ?>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="index.php">Home</a></li>
          <li><a href="adminview.php">Edit Properties</a></li>
       <li class="menu-active"><a href="deleteusers.php">Delete Users</a></li>
          <li><a href="admin_help.php">Edit Q & A</a></li>
          <li><a href="ContactUs_admin.php">Answer Q & A</a></li>
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
?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Delete Users</h3>
      </div>
  </section>
  <br><br>
<?php
include("connection.php");

$sql="SELECT username ,acctype FROM human where acctype != '3'";
if(mysqli_query($conn,$sql)){
$result=mysqli_query($conn,$sql);
 error_log("$sql..",3,"databaseoperations.log");
if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			?>
			<div class="containermessages">
			<?php
			$yyyy=$row['username'];
			if($row['acctype']==1)
			$yyy='Buyer';
			if($row['acctype']==2)
			$yyy='Seller';
			if($row['acctype']==3)
			$yyy='Admin';
echo "<p> username: " . $row['username']."</p> "."<p> Account type: ".$yyy."</p>" ;
			?>
             <form action='getdeleteuser.php' method='post' >
			 <input type='hidden' value=<?php echo $yyyy;?>  name='user'>
			  <input type='hidden' value=<?php echo $yyy;?>  name='type'>
			  <input class="btn" type='submit' name='submit' value='Delete User' >
			  </form>
             </div>
			<?php
			}
}}
else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn in deleteusers.php");}

		include('footer.php');
		mysqli_close($conn);
?>
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
