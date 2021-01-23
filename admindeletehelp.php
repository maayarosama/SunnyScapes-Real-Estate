<?php
session_start();?>

<?php
 include("connection.php");
 
	$id=$_GET['id'];
	echo"".$id."";

$dsql="delete from help where id = '".$id."' ";
if($result=mysqli_query($conn,$dsql)){
	error_log("$dsql..",3,"databaseoperations.log");
header("Location: admin_help.php");
}
else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
}
mysql_close($conn);
?>
