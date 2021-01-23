<?php
require_once"header.php";
session_start();
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
        <li><a href="index.php">Home</a></li>
        <li><a href="property.php">Properties</a></li>
        <li><a href="buyerrequests.php">Request Response</a></li>
        <li class="menu-active"><a href="messages.php">Messages</a></li>
        <li><a href="searchQA.php">Q & A</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="editprofile.php">Edit Profile</a></li>
              <li><a href="Logout.php">Log Out</a></li>
    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->
<?php
}
else if($acctype=="2")
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
        <li ><a href="addprop.php">Add Properties</a></li>
        <li><a href="MyProperties.php">Edit My Properties</a></li>
        <li><a href="property.php">View all Properties</a></li>
        <li><a href="responsetorequest.php">Requests</a></li>
        <li class="menu-active"><a href="messages.php">Messages</a></li>
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
}
else {

		echo "<script>alert('You are not allowed to visit this page please login to view it');</script>";
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
        <h3>Messages</h3>
      </div>
  </section>
  <br><br>
</div>
<?php
include("connection.php");

if (isset($_POST['oldmessages'])){
		$receiver=$_POST['receiver'];
		$propertyid=$_POST['propertyID'];

		if(!isset($_SESSION['username']))
		{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
			die();
		}
		else{
          $username=$_SESSION['username'];
		}
		echo "<h2 class='WelcomeText'>Hello ".$username."</h2>  <h4 class='WelcomeText'>Your sent messsages: </h4><br>";
		$sql="SELECT receiverid ,propertyid, text FROM `message` WHERE senderid='$username' AND propertyid='$propertyid'";

	if(mysqli_query($conn,$sql)){
				 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);
                 if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		   	?>
			<div class="containermessages">
			<?php

   echo "<p> Receiver Username: ".$row['receiverid']."<br>
           Property ID:  ". $row['propertyid']."<br>
		   Message: ". $row['text']."</p>";
			?>
			</div>
		   <?php
	}
	}
	else{echo "<p class='WelcomeText'>No Old Messages<p>";}
    }
	else{
        $errorconn=mysqli_error($conn);
		trigger_error("$errorconn");
	}
	}
   include('footer.php');
mysqli_close($conn);
?>
