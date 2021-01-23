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
          <li class="menu-active"><a href="admin_help.php">Edit Q & A</a></li>
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
}else{
  echo "<script>alert('You are not Logged in');</script>";
 echo '<script>window.location.href= "Login.php";</script>';
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
          <h3>Q & A</h3>
        </div>
    </section>
    <br><br>

  </section>
          <h1 class = "headeradminhelp">Q & A</h1>

<?php
 include("connection.php");
 
$sql = "SELECT *FROM help";
if($result= mysqli_query($conn, $sql)){
	error_log("$sql..",3,"databaseoperations.log");
$count=mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
while($res = mysqli_fetch_array($result))
{
  ?>
  <div class="containerQA">
  <?php
  $id=$res['id'];
  $answer=$res['answer'];
  ?>
  <div class="col-md-12">
    <?php
  	echo "Question: ".$res["question"]."<br>";
  	echo"Answer: ".$res["answer"];
    ?>
  </div>
  <?php
  	echo"<a class='btnadminhelp btn-success btn-sm' href=\"editanswer.php?id=$id\" > Update </a> ";
  	echo"<a class='btnadminhelp btn-danger btn-sm' href=\"admindeletehelp.php?id=$id\"> Delete </a> ";
?>
  </div>
<?php
}
}
}else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
		}
mysqli_close($conn);
?>
</div>
</div>
</div>
<br/>
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
