<?php
session_start();
?>
<?php
 include("connection.php");
 
	if (isset($_POST['submit'])){
		$text=$_POST['sendmsg'];
		$replyid=$_POST['replyid'];
		$propertyid=$_POST['propertyID'];
		if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
    }
   else{
          $username=$_SESSION['username'];
       }
		$sql="INSERT INTO message
		( senderid, receiverid,propertyid,text)
    VALUES('$username','$replyid','$propertyid','$text')";
	if(mysqli_query($conn,$sql)){
				 error_log("$sql..",3,"databaseoperations.log");
		echo "<script>alert('message sent');</script>";
		 echo '<script>window.location.href= "messages.php";</script>';
		}
	else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn");
	}
}
mysqli_close($conn);
?>
