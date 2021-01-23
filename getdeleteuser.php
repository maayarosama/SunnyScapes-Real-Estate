
<?php
session_start();
?>
<?php
include("connection.php");

if(isset($_POST['submit'])){
	$user=$_POST['user'];
	$type=$_POST['type'];
	$sql2="DELETE FROM human WHERE username='$user' AND acctype='$type'";
	if(mysqli_query($conn,$sql2)){
	       error_log("$sql2..",3,"databaseoperations.log");
	       echo "<script>alert('user deleted successfully');</script>";
		   echo '<script>window.location.href= "deleteusers.php";</script>';
	}else{
		$errorconn=mysqli_error($conn);
		trigger_error("$errorconn  getdeleteuser.php");
	}
}
mysqli_close($conn);
?>
