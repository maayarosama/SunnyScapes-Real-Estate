<?php session_start()?>

<html>
<head>

	<style>
		.username-ok{color:#2FC332;}
		.username-taken{color:#D60202;}
	</style>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>

		function getResult()
		{
			jQuery.ajax(
			{
				url: "backend-searchQA.php",
				data:'term='+$("#term").val(),
				type: "POST",
				success:function(data2)
				{
					$("#result").html(data2);
				}
			});
		}
	</script>
</head>

<html lang="en">

  <?php include('header.php');

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
				<li><a href="buyerrequests.php">Request Response</a></li>
				<li><a href="messages.php">Messages</a></li>
				<li class="menu-active"><a href="searchQA.php">Q & A</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				  <li><a href="editprofile.php">Edit Profile</a></li>
							<li><a href="Logout.php">Log Out</a></li>
		</nav><!-- #nav-menu-container -->
	</div>
</header><!-- #header -->
<?php
}
?>

<?php
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
				<li><a href="responsetorequest.php">Requests</a></li>
				<li><a href="messages.php">Messages</a></li>
				<li><a href="feedback.php">Feedbacks</a></li>
				<li class="menu-active"><a href="searchQA.php">Q & A</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
				  <li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="Logout.php">Log Out</a></li>

		</nav><!-- #nav-menu-container -->
	</div>
</header><!-- #header -->
<?php
}
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
          <li><a href="admin_help.php">Edit Q & A</a></li>
          <li><a href="ContactUs_admin.php">Answer Q & A</a></li>
					  <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="Logout.php">Log Out</a></li>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php
}
}
else {
?>
<header id="header">
		<div class="container-fluid">
			<div id="logo" class="pull-left">
				<a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li><a href="index.php">Home</a></li>
					<li class="menu-active"><a href="searchQA.php">Q & A</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="Signup.php">Signup</a></li>
					<li><a href="Login.php">Login</a></li>
			</nav><!-- #nav-menu-container -->
		</div>
	</header><!-- #header -->

<?php
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
<input name="term" type="text" id="term" class="form-control" onkeyup="getResult()" placeholder="Search Questions or answers" />
<div id="result"></div>
<br/>
  <h1 class = "headeradminhelp">Q & A</h1>
<?php
$sql = "SELECT *FROM help";
if( mysqli_query($conn, $sql)){
	$result= mysqli_query($conn, $sql);
 error_log("$sql..",3,"databaseoperations.log");
if(mysqli_num_rows($result)>0){
while($res = mysqli_fetch_array($result))
{ ?>
  <div class="containerQA">
  <div class="col-md-12">
  <?php

	echo"Question: ".$res["question"]."<br>";
	echo"Answer: ".$res["answer"]."<br>";
	?>
	</div>
	</div>
	<?php
}
}
else{
			echo"<table border=50 BORDERCOLOR=#000000 width=100%>";
            echo "<tr><td colspan=4>No matches found</td></tr></table>";
}
}else{
      $errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
	}
?>

</div>
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
