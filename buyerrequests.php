
<?php
require_once"header.php";
session_start();
?>

<?php
 include("connection.php");

	 if(!empty($_SESSION['acctype'])) {
$acctype=$_SESSION['acctype'];

if($acctype=="1")
{
?>
<header id="header">
	<div class="container-fluid">
		<div id="logo" class="pull-left">
			<a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
		</div>
		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<li ><a href="index.php">Home</a></li>
				<li><a href="property.php">Properties</a></li>
				<li class="menu-active"><a href="buyerrequests.php">Request Response</a></li>
				<li><a href="messages.php">Messages</a></li>
				<li><a href="searchQA.php">Q & A</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
							<li><a href="Logout.php">Log Out</a></li>
		</nav><!-- #nav-menu-container -->
	</div>
</header><!-- #header -->
<?php
}
else {
echo "<script>alert('You are not allowed to visit this page please register as a buyer to view it');</script>";
 echo '<script>window.location.href= "Signup.php";</script>';
}
}
else {
echo "<script>alert('You are not Logged in please log in');</script>";
 echo '<script>window.location.href= "Login.php";</script>';
}
?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Request Response</h3>
      </div>
  </section>
  <br><br>

<?php
if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$username=$_SESSION['username'];
}
echo "<h2 class='WelcomeText'>Hello ".$username."</h2>  <h4 class='WelcomeText'>Your requests: </h4><br>";

$sql="SELECT  request.accepted, property.propertyID , property.sellerID,property.type, property.location
FROM request
JOIN property
ON property.propertyID=request.propertyID
WHERE request.buyerID= '$username' ";
if(mysqli_query($conn,$sql)){
	 error_log("$sql..",3,"databaseoperations.log");

	      $result=mysqli_query($conn,$sql);
                 if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			?>
			<div class="containermessages">
			<?php
if($row['accepted']==1)
				$acc="accepted";
			else $acc="On Hold";
			        if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
			echo "Property: ".$type.' in '.$row['location']."<br>property owner: ".$row['sellerID']."<br> Status:".$acc;
			if($row['accepted']==0){
			?>
			<form action="deletebuyerrequest.php" method='post'>
			<input type='hidden' value=<?php echo $row['propertyID']; ?>  name='propertyID'>
			<label value="deletereq">Delete Request</label>
			<input type="submit" value="Delete" name="deleterequest" class="deleterequest">
			</form><?php } ?>
			</div>
			<?php
		}
  }else{echo "<p class='WelcomeText'>No new Requests<p>";}
    }
	else{
        $errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
	}
  ?>

  <?php
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
