<?php
require_once"header.php";
session_start ();
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
				<li><a href="index.php">Home</a></li>
				<li><a href="property.php">Properties</a></li>
				<li><a href="buyerrequests.php">Request Response</a></li>
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
  echo '<script>window.location.href= "Login.php";</script>';

}
}else{echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';}
?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Property's Details</h3>
      </div>
  </section>
  <br><br>
</div>
<?php

if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$username=$_SESSION['username'];
}
if(isset($_POST["details"])){
	$propid=$_POST['propID'];
	$sql="SELECT * FROM property WHERE propertyID='$propid'" ;
if(mysqli_query($conn,$sql)){
					 error_log("$sql..",3,"databaseoperations.log");
        $result=mysqli_query($conn,$sql);
      }
	  else{
		  $errorconn=mysqli_error($conn);
		trigger_error("$errorconn in moredetails.php");
	  }
	?>
<div class="MoreDetailsDiv">
<?php
	if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
      $propID= $row['propertyID'];
      $sql2="SELECT picture FROM pictures  WHERE propertyID = '$propid' ";
            if(mysqli_query($conn,$sql2)){
				error_log("$sql2..",3,"databaseoperations.log");
            $result2=mysqli_query($conn,$sql2);
          }
    else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn");}

      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
		 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn");}
      ?>
      <section id="portfolio"class="section-bg">
				<div class="row">
        <div class="col-lg-8 portfolio-item2 filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
              <figure>
                <?php
                while($row3=mysqli_fetch_assoc($result3)){
                    ?>
                <img src="img/<?php echo $row3['picture'];?>" class="img-fluid2" alt="">
                <?php
              }
              ?>
                <?php
                while($row2=mysqli_fetch_assoc($result2)){
                    
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
                    ?>
                    
                <a href="img/<?php echo $row2['picture'];?>" class="link-preview" data-lightbox="portfolio" data-title="<?php echo $type.' in '.$row['location'];?>" title="Preview"><i class="ion ion-eye"></i></a>
              <?php
          }
             ?>
                    <a href="property.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>
							<p>
							</p>
							<?php
							if($row['type']==1)
							$type="Villa";
							if($row['type']==2)
							$type="Apartment";
							if($row['type']==3)
							$type="Duplex";
							if($row['type']==4)
							$type="Studio";
							
							echo "<h1 class='moredetailsdata'>".'Type:'.$type."</h1>" ;
							echo "<h1 class='moredetailsdata'>".'Bed rooms number: '.$row['bednum']."</h1>" ;
							echo "<h1 class='moredetailsdata'>".'Bath rooms number: '.$row['roomnum']."</h1>" ;
							echo "<h1 class='moredetailsdata'>".'Area: '.$row['area'].' sqft'."</h1>" ;
							echo "<h1 class='moredetailsdata'>".'Location: '.$row['location']."</h1>" ;
							echo "<h1 class='moredetailsdata'>".'Price Range: '.$row['minprice'].'$'.'-'.$row['maxprice'].'$'."</h1>" ;
							if($row['deal']==1)
							$deal="Rent";
							if($row['deal']==2)
							$deal="Sale";
						
							echo "<h1 class='moredetailsdata'>".'For '.$deal."</h1>" ;
							if($row['availability']==1)
								$avl="Available";
							else $avl="Sold";
							echo "<h1 class='moredetailsdata'>".'Status: '.$avl."</h1>" ;
					?>
          </div>
        </div>
      </section>
<?php
		}
  }
?>
<div class="col-lg-2">
	<button class="open-button"  onclick="openForm()">Chat <i class="fa fa-commenting"></i></button>
</div>
	<div class="chat-popup" id="myForm" style='display: none;'>
		<form action="chat.php" class="form-container" method="post">
			<h1>Chat</h1>
			<label for="msg"><b>Message</b></label>
			<textarea placeholder="Type message.." name="msg" required></textarea>
<?php  $_POST['propertyID']=$propid ; ?>
<input type='hidden' name='propertyID' value=<?php echo $_POST['propertyID']; ?> >
			<input type="submit" name="msgbtn" class="btnmsg" value='Send'>  <!--Send</button>-->
<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		</form>
	</div>
	<div class="col-lg-2"><?php
	$proprow=$_POST['propID'];



	if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$usernameid=$_SESSION['username'];
}

	$sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
	if(mysqli_query($conn,$sql5)){
			error_log("$sql5..",3,"databaseoperations.log");
	$result5=mysqli_query($conn,$sql5);
				 if(mysqli_num_rows($result5)>0){
	?>
		<div class="requested">
		<i class="fa fa-gavel"> </i>
		<br>
	<label value='requested'>Requested</label>
	</div>
	</div>
	<?php }
	else {
	?>
	<form method='post' action=<?PHP echo $_SERVER['PHP_SELF']; ?> >
	<?php  $_POST['propertyID']=$row['propertyID'] ?>
	<input type='hidden' name='propertyID' value=<?php echo $_POST['propID']; ?> >
	<input type='submit'  name='request' value='Request' class='open-button2'>
	</form>
	</div>
	<?php
	}	}else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn in moredetails.php");}
	?>
</div>
			<script>
			function openForm() {
				document.getElementById("myForm").style.display = "block";
			}
			function closeForm() {
				document.getElementById("myForm").style.display = "none";
			}
			</script>
		</div>
<?php
 include('footer.php');
}
if(isset($_POST['request'])){
	$propertyID=$_POST['propertyID'];
	if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
$buyerID=$_SESSION["username"];
}


	$sql7="INSERT INTO request ( buyerID, propertyID)
    VALUES('$buyerID','$propertyID')";
	if(mysqli_query($conn,$sql7)){
		error_log("$sql7..",3,"databaseoperations.log");
		echo "<script>alert('request sent');</script>";
			 echo '<script>window.location.href= "property.php";</script>';
	}
	else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn in moredetails.php");}
}
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
