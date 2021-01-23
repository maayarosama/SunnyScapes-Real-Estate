<?php
session_start();
include("connection.php");

if(isset($_POST['submit'])){
$id= $_POST['id'];
	$sql = "SELECT *FROM contact_us WHERE `id`='".$id."' ";
	$result= mysqli_query($conn, $sql);

if($result){
	 error_log("$sql..",3,"databaseoperations.log");
	//echo"mayar";
while($res = mysqli_fetch_array($result))
{
	//$id= $_POST['id'];
$answer=$_POST['answer'];
$message=$res['message'];
echo"".$message."";
	$sqli="UPDATE `contact_us` SET
 `answer`='".$answer."' WHERE `id`='".$id."'";
	$result1 =mysqli_query($conn,$sqli);

	if($result1)
	{
		 error_log("$sqli..",3,"databaseoperations.log");
if($message != '' && $answer != '' ){
	$sqlii= "INSERT INTO `help` ( `question`, `answer` ) VALUES ('".$message."','".$answer."')";
	 error_log("$sqlii..",3,"databaseoperations.log");
	$resulti= mysqli_query($conn, $sqlii);
	if($resulti){
		header("Location: admin_help.php");
	}else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
		}
	}
}
else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
}}
}else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
}
}

mysqli_close($conn);
?>
