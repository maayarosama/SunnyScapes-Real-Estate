<?php
$localhost = "localhost";
$name = "root";
$password ="";
$dbname ="reale state";
$conn=mysqli_connect($localhost,$name,$password,$dbname);
function customError($errno, $errstr) {

		 error_log("[$errno] $errstr",3,"errors.log");
   }
   set_error_handler("customError");
function checkcon($con){
			if(!$con)
			throw new Exception ("connection failed!");
			}

try{
     checkcon($conn);
}
catch(Exception $e){
	        $emesg=	$e->getMessage();
             trigger_error("error in connecting has been triggered ");
			echo "<script>alert('$emesg')</script>";
		 echo '<script>window.location.href= "index.php";</script>';
}
?>
