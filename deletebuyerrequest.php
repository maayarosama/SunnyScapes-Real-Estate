<?php session_start();

 include("connection.php");

if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$username=$_SESSION['username'];
}
if(isset($_POST['deleterequest'])){
	$propid=$_POST['propertyID'];
	echo "property id: ".$propid."<br>username: ".$username ;
	$sql= "DELETE FROM request WHERE  propertyID='$propid' AND buyerID='$username'";
					 error_log("$sql..",3,"databaseoperations.log");
	if(mysqli_query($conn,$sql)){
		echo "<script>alert('REQUEST DELETED ');</script>";
		 echo '<script>window.location.href= "buyerrequests.php";</script>';
		}else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");}
}
mysqli_close($conn);

?>
