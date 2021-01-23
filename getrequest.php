<?php
session_start();
?>
<?php
include("connection.php");

if (isset($_POST['submit'])){
		$buyerID=$_POST['buyerID'];
		$propertyID=$_POST['propertyID'];
		$sql="UPDATE request
        SET accepted= 1
        WHERE propertyID='$propertyID' AND buyerID='$buyerID'";

        $sql2="UPDATE property
        SET availability= 0
        WHERE propertyID='$propertyID' ";
	if(mysqli_query($conn,$sql)){
				 error_log("$sql..",3,"databaseoperations.log");
		echo "<script>alert('request updated');</script>";
		// echo '<script>window.location.href= "responsetorequest.php";</script>';
		}
		else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn");}
	if(mysqli_query($conn,$sql2)){
				 error_log("$sql2..",3,"databaseoperations.log");
		echo "<script>alert('property updated as sold');</script>";
		 echo '<script>window.location.href= "responsetorequest.php";</script>';
		}
	else{$errorconn=mysqli_error($conn);
		trigger_error("$errorconn  in getrequest.php");}
}
mysqli_close($conn);
?>
