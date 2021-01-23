<?php
//require_once"header.php";
session_start ();
?>

<?php
 include("connection.php");
 
 $_GLOBAL['message']="";
if(isset($_POST["msgbtn"])){
 $message=$_POST["msg"];

 if(!isset($_SESSION['username'])){
	echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
		 die();
}else{
	$senderid= $_SESSION['username'];
}
$propID=$_POST['propertyID'];
$getreceiverid="SELECT sellerID FROM property WHERE propertyID='$propID'";
$resid=mysqli_query($conn,$getreceiverid);
		  		 error_log("$getreceiverid..",3,"databaseoperations.log");
if(mysqli_num_rows($resid)>0){
	while($row=mysqli_fetch_assoc($resid)){
		$receiverid=$row['sellerID'];
	}
}
$sql="INSERT INTO message ( senderid, receiverid,propertyid,text)
    VALUES('$senderid','$receiverid','$propID','$message')";
	if(mysqli_query($conn,$sql)){
	 error_log("$sql..",3,"databaseoperations.log");
		echo "<script>alert('message sent');</script>";
    			 echo '<script>window.location.href= "property.php";</script>';
		}
	else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");}
	$message="";
}
mysqli_close($conn);
?>
