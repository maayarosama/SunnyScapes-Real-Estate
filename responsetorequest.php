<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
require_once"header.php";
session_start ();
?>

<?php
 include("connection.php");

  if(!empty($_SESSION['acctype'])) {
$acctype=$_SESSION['acctype'];

if($acctype=="2")
{
?>
<header id="header">
  <div class="container-fluid">

    <div id="logo" class="pull-left">
      <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="addprop.php">Add Properties</a></li>
        <li><a href="MyProperties.php">Edit My Properties</a></li>
        <li><a href="property.php">View all Properties</a></li>
        <li class="menu-active"><a href="responsetorequest.php">Requests</a></li>
        <li><a href="messages.php">Messages</a></li>
		<li><a href="feedback.php">Feedbacks</a></li>
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

echo "<script>alert('You are not allowed to visit this page please register as a seller to view it');</script>";
 echo '<script>window.location.href= "Signup.php";</script>';

}
}else {
	echo "<script>alert('You are not Logged in ');</script>";
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
        <h3>Requests</h3>
      </div>
  </section>
  <br><br>

<?php
if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
   else{
          $username=$_SESSION['username'];
       }
echo "<h2 class='WelcomeText'>Hello ".$username."</h2>  <h4 class='WelcomeText'>Your requests: </h4><br>";

$sql="SELECT property.sellerID , request.buyerID, property.propertyID, property.location,property.type
FROM request
JOIN property
ON property.propertyID=request.propertyID
WHERE property.sellerID= '$username' AND  request.accepted=0";

if(mysqli_query($conn,$sql)){
	      $result=mysqli_query($conn,$sql);
		  		 error_log("$sql..",3,"databaseoperations.log");

                 if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			?>
			<div class="containermessages">
			<?php
                        if($row['type']==1)
							$type="Villa";
							if($row['type']==2)
							$type="Apartment";
							if($row['type']==3)
							$type="Duplex";
							if($row['type']==4)
							$type="Studio";
							
echo "<p> Sender username: " . $row['buyerID'] . "<br>Property:  ". $type.' in '.$row['location'];
			?>
			<form action="getrequest.php" method='post'>
			<?php $_POST['propertyID']= $row['propertyID'];
			 $_POST['buyerID']= $row['buyerID'];?>
			 <input type='hidden' value=<?php echo $_POST['propertyID']; ?>  name='propertyID'>
			 <input type='hidden' value=<?php echo $_POST['buyerID']; ?>  name='buyerID'>
		  <input type='submit' name='submit' value='Accept Request' class="btn">
			</form>
			<form action="getreviews.php" method="post">
			<input type='hidden' value=<?php echo $row['buyerID']; ?>  name='buyerID'>
			 <input type='submit' name='review' value="<?php echo $_POST['buyerID']."'s review"; ?>"   class="btn">
			 </form>
			</div>
<?php
		}
  }else{echo "<p class='WelcomeText'>No New Request<p>";}
    }
	else{
     $errorconn= mysqli_error($conn);
	trigger_error("$errorconn  responsetorequest.php");
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
