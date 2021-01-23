<?php
session_start();
?>
<?php
include("connection.php");

if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$username=$_SESSION['username'];
}
if(isset($_POST['submit'])){
	$buyerid=$_POST['buyerID'];
	$feedtext=$_POST['feedback'];
	$sql="INSERT INTO feedback (sellerid , buyerid , feedback) VALUES ('$username','$buyerid','$feedtext')";
	error_log("$sql..",3,"databaseoperations.log");
	if(mysqli_query($conn,$sql)){
	echo "<script>alert('Feedback sent successfully');</script>";
   echo "<script>window.location.href= 'feedback.php';</script>";
	}
	else{ $errorconn=mysqli_error($conn);
		trigger_error("$errorconn  in getfeedback.php"); }
}
mysqli_close($conn);
?>
