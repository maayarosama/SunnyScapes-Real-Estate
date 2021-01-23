<?php
session_start();
?>
<html>
<?php
 include("connection.php");

if(isset($_POST['submit'])){
$filename=$_FILES['img']['name'];
$tempfilename=$_FILES['img']['tmp_name'];
$type=$_POST['type'];
$rooms=$_POST['rooms'];
$beds=$_POST['beds'];
$area=$_POST['area'];
$location=$_POST['location'];
$deal=$_POST['deal'];
$max=$_POST['max'];
$min=$_POST['min'];
$image=$filename[0];
if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
   else{
         $username=$_SESSION['username'];
       }

function checkarea($numm){
	if($numm < 0 ){
		throw new Exception("Invalid Area shouls be more than 0!");
	}
}
try
{checkarea($area);}
catch(Exception $e){
	         $emesg=$e->getMessage();
             trigger_error("");
			 echo "<script>alert('$emesg')</script>";
			 echo '<script>window.location.href= "editpropseller.php";</script>';
			die();
}

function checkminmax($maxn, $minn){
	if($maxn < $minn ){
		throw new Exception ("max price should be greater than min price");}
	else if($maxn < 0 || $minn < 0){
		throw new Exception("prices shouldn't be less than 0");
		}
}
try{ checkminmax($max , $min);}
catch(Exception $e){
	$emsg=$e->getMessage();
	trigger_error("");
	echo "<script>alert('$emesg')</script>";
	echo '<script>window.location.href= "editpropseller.php";</script>';
		die();
}
function checknums($beds , $rooms){
	if($beds > 100 || $beds < 0 ){
		throw new Exception("bed number should be between 100 and 0!");
	}
	else if($rooms <0 || $rooms >100){
		throw new Exception("room number should be between 100 and 0!");
	}

}
try{ checknums($beds , $rooms);}
catch(Exception $e){
	$emsg=$e->getMessage();
	echo "<script>alert('$emesg')</script>";
	trigger_error("");
	echo '<script>window.location.href= "editpropseller.php";</script>';
		die();
}
	$sql="INSERT INTO `property` ( `sellerID`, `type`, `roomnum`, `bednum`, `area`, `location`,
	`deal`,`maxprice`, `minprice`)
	VALUES (
	'".$_SESSION['username']."'
	,'".$_POST['type']."'
	,'".$_POST['rooms']."'
	,'".$_POST['beds']."'
	,'".$_POST['area']."'
	,'".$_POST['location']."'
	,'".$_POST['deal']."'
	,'".$_POST['max']."'
	,'".$_POST['min']."'
	)";
	if(mysqli_query($conn,$sql)){

    error_log("$sql..",3,"databaseoperations.log");
	 echo "<script>alert('Successfully added');</script>";

	$sqls="SELECT `propertyID`FROM`property` WHERE sellerID='$username' AND location='$location'
	AND type='$type'  AND area='$area'  AND roomnum='$rooms'  AND bednum='$beds'  AND maxprice='$max'  AND minprice='$min'AND deal='$deal'";

if(mysqli_query($conn,$sqls)){
	error_log("$sqls..",3,"databaseoperations.log");
   $res=mysqli_query($conn,$sqls);
	while($row=mysqli_fetch_assoc($res)){
		$id2=$row['propertyID'];

		}
		}else{    trigger_error("");      }

}
else{
       trigger_error("");
	}
	$numimages=count($filename);
	function checkimg($imgn){
		if($imgn < 2){
			throw new Exception("must include more than one pic for your property!");
		}
	}
	try{checkimg($numimages);}catch(Exception $e){
	$emsg=$e->getMessage();
	trigger_error("");
	echo "<script>alert('$emesg')</script>";
	echo '<script>window.location.href= "addprop.php";</script>';
	die();
	}

for($i=0; $i<=count($filename); $i++){
if(!empty($filename[$i])){
$name = $filename[$i];
$tempname = $tempfilename[$i];
$sqlp="INSERT INTO `pictures`(`picture`,`sellerID`,`propertyID`) VALUES('$name','".$_SESSION['username']."','$id2')";
move_uploaded_file($tempname,"img/".$name);
if(mysqli_query($conn,$sqlp)){
	error_log("$sqlp..",3,"databaseoperations.log");
	$ress=mysqli_query($conn,$sqlp);
}
else{ trigger_error("");
		}
}//////end of if sqlp
}///end of for
}////end of is set
?>
<html lang="en">
  <!--==========================
    Header
  ============================-->
  <?php include('header.php'); ?>

	<?php

	  if(!isset($_SESSION['acctype']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
   else{
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
          <li class="menu-active"><a href="addprop.php">Add Properties</a></li>
          <li><a href="MyProperties.php">Edit My Properties</a></li>
          <li><a href="property.php">View all Properties</a></li>
          <li><a href="responsetorequest.php">Requests</a></li>
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
		 echo '<script>window.location.href= "index.php";</script>';
	}
	}
	?>
  <section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Add Your Property</h3>
      </div>
  </section>
  <div class="container">

      <div class="col-md-3">

        <h1 class = "headersignup">Add Your Property</h1>
          <div class="card-body card-block">
      <form name="addprop" method = "POST" action ="" enctype='multipart/form-data'>

Location: <input type="text" name="location" class="form-control" required="required"/>
Area: <input type="number" name="area" class="form-control" required="required"/>
Type: <!---<input type="text" name="type" required="required"/>  -->
<select name='type' class="form-control">
<?php require_once "get_Proptype.php"; ?>
</select>
Number of toilet: <input type="number" name="rooms"  class="form-control" required="required"/>
Number of beds: <input type="number" name="beds" class="form-control" required="required"/>
DEAL:<select name='deal' class="form-control">
    <?php require_once "get_Dealtype.php"; ?>
</select>
Max price: <input type="number" name="max" class="form-control" required="required"/>
Min price: <input type="number" name="min" class="form-control" required="required"/>
Property image: <input type="file" name="img[]"  class="file-control" required="required" multiple="multiple" />
   <br>
   <div ><button class="submitaddprop" name='submit' type="submit">Submit</button></div>
</form>
    </div>
    </div>
    </div>
    </div>
  <?php
mysqli_close($conn);
  include('footer.php'); ?>
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
