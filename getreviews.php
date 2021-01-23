<?php
require_once"header.php";
session_start();
?>
<?php
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
          <li ><a href="addprop.php">Add Properties</a></li>
          <li><a href="MyProperties.php">Edit My Properties</a></li>
          <li><a href="property.php">View all Properties</a></li>
          <li class="menu-active">><a href="responsetorequest.php">Requests</a></li>
          <li><a href="messages.php">Messages</a></li>
					<li><a href="feedback.php">Feedbacks</a></li>
          <li><a href="searchQA.php">Q & A</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="Logout.php">Log Out</a></li>

      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <?php
}
else{
  echo "<script>alert('You are not allowed to visit this page only pleaase register as a seller to view');</script>";
 echo '<script>window.location.href= "Login.php";</script>';
}
}
?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Reviews</h3>
      </div>
  </section>
  <br><br>


<?php
include("connection.php");

if(isset($_POST['review'])){
	$buyerID=$_POST['buyerID'];
	$sql2="SELECT feedback ,sellerid FROM feedback WHERE buyerid='$buyerID'";
	if(mysqli_query($conn,$sql2)){
				 error_log("$sql2..",3,"databaseoperations.log");
	      $result2=mysqli_query($conn,$sql2);
                 if(mysqli_num_rows($result2)>0){
	while($row2 = mysqli_fetch_assoc($result2)){
		   	?>
			<div class="containermessages">
			<?php
   echo "<p> Requester Username: ".$buyerID."<br>
           Seller Username : ".$row2['sellerid']."<br>
		   Review : ".$row2['feedback']."</p>";
			?>
			</div>
		   <?php
	}
	}
	else{echo "<p class='WelcomeText'>No Reviews<p>";}
    }
	else{
        $errorconn=mysqli_error($conn);
		trigger_error("$errorconn  in getreviews.php");
	}
	}
   include('footer.php');
mysqli_close($conn);
?>
