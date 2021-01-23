<?php
require_once"header.php";
session_start ();
?>
<?php
 include("connection.php");
////session validation
if(!isset($_SESSION['acctype']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
 else {
      $acctype=$_SESSION['acctype'];
 }


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
        <li class="menu-active"><a href="MyProperties.php">Edit My Properties</a></li>
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
  echo '<script>window.location.href= "Signup.php";</script>';

}

?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Edit Your Properties</h3>
      </div>
  </section>
  <br><br>

        <div class="row">
          <div class="col-lg-12">
		  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <input type="submit" class="filterbtn" value="Your Properties" name ="allbtn" id="allbtn"  >

			</form>
			</div>
        </div>
</div>


<?php
if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
 else {
    $username=$_SESSION['username'];
 }
if(isset($_POST["allbtn"])){
  $sql="SELECT * FROM property  WHERE sellerID='$username' ";


if(mysqli_query($conn,$sql)){
        $result=mysqli_query($conn,$sql);
        error_log("$sql..",3,"databaseoperations.log");
 include('checkcss.php');
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){

             $propID=$row['propertyID'];
			 $sql2="SELECT picture FROM pictures  WHERE propertyID = '$propID' ";
    if(mysqli_query($conn,$sql2)){
		    error_log("$sql2..",3,"databaseoperations.log");
            $result2=mysqli_query($conn,$sql2);

      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
            $result3=mysqli_query($conn,$sql3);
            error_log("$sql3..",3,"databaseoperations.log");
          }
    else{  trigger_error("");
        } ///else conn of sql3
      ?>
      <section id="portfolio"class="section-bg">

        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
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
          }  //// sql2 while loop end
	} ///end of sql2
	 else{    trigger_error("");        } ///sql2 if not conn
		  ?>
            </figure>

            <div class="portfolio-info">
                <?php
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
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>

              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                    <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                  <?php
                if($row['availability']==1)
                  $avl="Available";
                else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
		  <div class="col-lg-2 box">

                <br>  <form action='editpropseller.php' method='post' >
                     <?php $_POST['propertyID']= $row['propertyID'];?>
			 <input type='hidden' value=<?php echo $_POST['propertyID']; ?>  name='propertyID'>
			 <input class='btn2 btn-danger' type='submit' name='edit' value='Edit'>
			  </form></div>
		  <div class="col-lg-2 box">

                <br>   <form action='deleteprop.php' method='post' >
                     <?php $_POST['propertyID']= $row['propertyID'];?>
			 <input type='hidden' value=<?php echo $_POST['propertyID']; ?>  name='propertyID'>
			 <input class='btn2 btn-danger' type='submit' name='delete' value='Delete'>
			  </form> </div>
          </div>

        </div>
          </div>
        </div>
      </section>


      <?php
		}////end of while loop sql1
	}////end od num rows of sql1
}/////if sql1 connected
 else{      trigger_error("");  }////if not conn sql1
?>
</div>
<?php
 include('footer.php');
}/////end of all button

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
