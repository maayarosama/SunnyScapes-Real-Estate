 <html lang="en">

  <?php
   include('header.php');
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
         <li ><a href="index.php">Home</a></li>
         <li><a href="property.php">Properties</a></li>
         <li><a href="buyerrequests.php">Request Response</a></li>
         <li><a href="messages.php">Messages</a></li>
         <li><a href="searchQA.php">Q & A</a></li>
         <li><a href="contactus.php">Contact Us</a></li>
         <li class="menu-active"><a href="editprofile.php">Edit Profile</a></li>
               <li><a href="Logout.php">Log Out</a></li>
     </nav><!-- #nav-menu-container -->
   </div>
 </header><!-- #header -->
 <?php
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
       <li ><a href="MyProperties.php">Edit My Properties</a></li>
       <li><a href="property.php">View all Properties</a></li>
       <li><a href="responsetorequest.php">Requests</a></li>
       <li><a href="messages.php">Messages</a></li>
   <li><a href="feedback.php">Feedbacks</a></li>
       <li><a href="searchQA.php">Q & A</a></li>
       <li><a href="contactus.php">Contact Us</a></li>
       <li class="menu-active"><a href="editprofile.php">Edit Profile</a></li>
       <li><a href="Logout.php">Log Out</a></li>

   </nav><!-- #nav-menu-container -->
 </div>
</header><!-- #header -->
<?php
}
?>

<?php
if($acctype=="3"){
 ?>
 <header id="header">
   <div class="container-fluid">

     <div id="logo" class="pull-left">
       <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
     </div>

     <nav id="nav-menu-container">
       <ul class="nav-menu">
         <li ><a href="index.php">Home</a></li>
         <li><a href="adminview.php">Edit Properties</a></li>
      <li><a href="deleteusers.php">Delete Users</a></li>
         <li><a href="admin_help.php">Edit Q & A</a></li>
         <li><a href="ContactUs_admin.php">Answer Q & A</a></li>
         <li class="menu-active"><a href="editprofile.php">Edit Profile</a></li>
               <li><a href="Logout.php">Log Out</a></li>
     </nav><!-- #nav-menu-container -->
   </div>
 </header><!-- #header -->

 <?php
}

}
else {
 echo "<script>alert('you're not allowed to visit this page ');</script>";
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
        <h3>Edit Profile</h3>
      </div>
  </section>
  <br><br>
 <?php
  include("connection.php");
  
if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$username=$_SESSION['username'];
}
$sql="SELECT * FROM human WHERE username='$username'";
  if($result=mysqli_query($conn,$sql)){
	       error_log("$sql..",3,"databaseoperations.log");
		   if(mysqli_num_rows($result)>0){
			   while($row=mysqli_fetch_assoc($result)){
				   $password=$row['password'];
				   $email=$row['email'];
				   $last=$row['lastname'];
				   $first=$row['firstname'];
				   $mobile=$row['mobile'];
				   $age=$row['age'];

			   }
		   }
  }else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
		}
mysqli_close($conn);
?>
  <div class="container">

      <div class="col-md-3">

        <h1 class = "headersignup">Edit Profile</h1>
          <div class="card-body card-block">
	<form name="edit" method = "POST" action ="geteditprofile.php" >
        First Name:<br>
          <input type="text" class="form-control" value=<?php echo $first; ?>  name="FName" required="required">
          Last Name:<br>
            <input type="text" class="form-control" value=<?php echo $last; ?> name="LName" required="required">
          Email:<br>
          <input type="email" class="form-control" id="email"value=<?php echo $email; ?> onkeyup="showHint2()" name ="Email" required="required">

          Phone Number:<br>
          <input type="number" class="form-control" id="phone" value=<?php echo $mobile; ?> onkeyup="showHint2()" name ="Phone" required="required">
          Age:<br>
<input type="number" class="form-control" id="age" value=<?php echo $age; ?> name ="Age"onkeyup="showHint2()" required="required">
		  <p > <span id="txtHint2" style="color:white;"></span></p>
		  <div style="display: none;"  id='passdiv'>
         Old Password:<br>
            <input type="password" class="form-control" onkeyup="checkpassword()" name="oldPassword" id="oldpassword">
			<input type="hidden"  value=<?php echo $password; ?> name="oldpass" id="inputpassword" >
			<p > <span id="txtpassword" style="color:white;"></span></p>
            New Password:<br>
            <input type="password" class="form-control" id="txt1" placeholder="New Password" name="NewPassword" >
			Confirm Password:<br>
<input type="password"class="form-control" name="conpass" id="txt2" placeholder="Confirm Password"onkeyup="showHint()">
      <p > <span id="txtHint" style="color:white;"></span></p>

          </div>
		  <br>
          <div class="form-group">
<button type="submit" class="btnadminhelp  btn-success btn-sm" name = "submit">
<i class="fa fa-dot-circle-o"></i> Submit
</button>
        <button type="button" class="btnadminhelp btn-danger btn-sm" name="changepassword" id='changeid' >
      <i class="fa fa-dot-circle-o"></i> Change Password
        </button>
        <br>
      </form>
    </div>
    </div>
    </div>
    </div>
	<script>

		$(document).ready(function(){
         $("#changeid").click(function(){
		 $("#passdiv").show();
  });
});
	function showHint() {
	if( document.getElementById("txt1").value == document.getElementById("txt2").value){
      document.getElementById("txtHint").innerHTML = "Matching" ;
    }else{document.getElementById("txtHint").innerHTML = "Not Matching" ;}

	}



	function checkpassword(){

		if( document.getElementById("oldpassword").value == document.getElementById("inputpassword").value){
      document.getElementById("txtpassword").innerHTML = "Correct password" ;
    }else{document.getElementById("txtpassword").innerHTML = "Not correct password" ;}

	}

function showHint2() {
	var age= document.getElementById("age").value ;
	var email= document.getElementById("email").value ;
	var phone= document.getElementById("phone").value ;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "editprofileval.php?Age="+age+"&phone="+phone+"&email="+email , true);
        xmlhttp.send();
}

</script>
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
