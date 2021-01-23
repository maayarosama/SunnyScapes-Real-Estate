<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
require_once"header.php";
session_start ();
?>

<?php
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

		if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
    }
   else{
          $username=$_SESSION['username'];
       }
echo "<h2 class='WelcomeText'>Hello ".$username."</h2>  <h4 class='WelcomeText'>Your messsages: </h4><br>";
$sql="SELECT senderid ,propertyid, text FROM `message` WHERE receiverid='$username'";
if(mysqli_query($conn,$sql)){
	      $result=mysqli_query($conn,$sql);
		 error_log("$sql..",3,"databaseoperations.log");
		  if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			?>
			<div class="containermessages">
			<?php
			$yyyy=$row['senderid'];
      $propid=$row['propertyid'];
      $sql2="SELECT * FROM property WHERE propertyID='$propid'";
      $result2=mysqli_query($conn,$sql2);
	  error_log("$sql2..",3,"databaseoperations.log");
      $row2 = mysqli_fetch_assoc($result2);
 if($row2['type']==1){
  					$type="Villa";
                }
  				else if($row2['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row2['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                
          
echo "<p> Sender username: " . $row['senderid'] . "<br>Property:  ". $type.' in '.$row2['location'] ." <br> Message: ". $row['text'];
			?>
			<form action="getoldmessages.php" method="post">
			<input type='hidden' value=<?php echo $row['propertyid']; ?>  name='propertyID'>
			<input type='hidden' value=<?php echo $row['senderid']; ?>  name='receiver'>
			 <input type='submit' name='oldmessages' value="<?php echo "Message you sent to ".$row['senderid']; ?>"   class="btn">
			 </form>
			</div>
			<div class="containermessages darker">

             <form action='getmessages.php' method='post' >
			 <?php $_POST['replyid']= $row['senderid'];
			 $_POST['propertyID']= $row['propertyid'];?>
			 <input type='hidden' value=<?php echo $_POST['propertyID']; ?>  name='propertyID'>
			 <input type='hidden' value=<?php echo $_POST['replyid']; ?>  name='replyid'>
			  <textarea  placeholder="Type message.." name="sendmsg" ></textarea>
			  <input type='submit' name='submit' value='Send' class="sendmessages">
			  </form>
             </div>
			<?php
			}
        } else{
            echo "<p class='WelcomeText'>No new messages<p>";
        }
    }
	else{
       $errorconn=mysqli_error($conn);
		trigger_error("$errorconn");
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
