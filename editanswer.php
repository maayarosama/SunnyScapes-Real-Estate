<html lang="en">
<?php
session_start();
include('header.php');
?>
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
            <li class="menu-active"><a href="index.php">Home</a></li>
            <li><a href="adminview.php">Edit Properties</a></li>
         <li><a href="deleteusers.php">Delete Users</a></li>
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
}else{
    echo "<script>alert('You are not logged in please log in');</script>";
   echo '<script>window.location.href= "logout.php";</script>';
  }

  ?>
<body>
<div class="editanswer">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Q & A</h3>
      </div>
  </section>
  <div class="container">
      <div class="col-md-3">
        <h1 class = "headersignup">Q & A</h1>
          <div class="card-body card-block">
<?php
 include("connection.php");
$id= $_GET['id'];
$sql="select * from help where id = '".$id."'";
if($result= mysqli_query($conn,$sql)){
	error_log("$sql..",3,"databaseoperations.log");
while($res= mysqli_fetch_array($result)){
	$question=$res['question'];
	$answer=$res['answer'];
	$id=$res['id'];
}
}else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");}
?>
<div class="adminhelp">
<form name='update' action="updatehelp.php" method="post" >
Question: <input type="text" class="form-control" name="question" value="<?php echo $question;?>" required="required"/>
Answer: <input type="text" class="form-control" name="answer" value= "<?php echo $answer;?>" required="required"/>
 <input type="hidden" name="id" value= "<?php echo $id;?>" >
 <br/>
<button type="submit" class="btn btn-success btn-sm" name = "submit">
<i class="fa fa-dot-circle-o"></i> Submit
</button>
</form>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php');
mysqli_close($conn); ?>
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
