<?php
session_start();?>

<?php
include("connection.php");



	if(isset($_POST['delete'])){
$propid=$_POST['propertyID'];
$dsql="delete from property where  propertyID='$propid'";
if(mysqli_query($conn,$dsql)){
$result=mysqli_query($conn,$dsql);
echo "<script>alert('Item Deleted successfully')</script>";
error_log("$dsql..",3,"databaseoperations.log");
 if(!empty($_SESSION['acctype'])) {
$acctype=$_SESSION['acctype'];
if($acctype=="3")
{
echo '<script>window.location.href= "adminview.php";</script>';
}
if($acctype=="2"){
echo '<script>window.location.href= "MyProperties.php";</script>';
}
}else{
	 echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
}
else
{ $errorconn=mysqli_error($conn);
		trigger_error("$errorconn in deleteprop.php");
}
	}
	mysqli_close($conn);
?>
