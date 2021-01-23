<?php
session_start();
?>
<?php
 include("connection.php");
if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
 else {
    $username=$_SESSION['username'];
 }

if(isset($_POST['submit'])){
	if(empty($_POST['NewPassword'])){
	$password=$_POST['oldpass'];
	}
	else{
		function checkpassword($old , $new){
			if($old !== $new)
			throw new Exception ("Wrong confirm password!");

			}
	   $password=$_POST['NewPassword'];
	   $conpass=$_POST['conpass'];
	   try{
             checkpassword($conpass,$password);
			 }
			catch(Exception $e){
            $emesg=	$e->getMessage();
			echo "<script>alert('$emesg')</script>";
		    echo '<script>window.location.href= "editprofile.php";</script>';
			die();
			}
	}
				   $email=$_POST['Email'];
				   $last=$_POST['LName'];
				   $first=$_POST['FName'];
				   $mobile=$_POST['Phone'];
				   $Agenum=$_POST['Age'];

/////validation
            ////email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('$email is a not valid email address , can't update profile');</script>";
		trigger_error("A custom error in email address has been triggered ");
	    echo '<script>window.location.href= "editprofile.php";</script>';
		 die();
        }

  function checkphone($number , $length){
			if($number < 0 || $length !== 11)
			throw new Exception ("phone number not valid");
			}
  function checkage($num){
			if($num < 20 || $num > 150 )
			throw new Exception ("age must be 21 at least");
			}
			///phone
			$phonelength=strlen("$mobile");
		try{
             checkphone($mobile,$phonelength);
			 }
			catch(Exception $e){
            $emesg=	$e->getMessage();
			echo "<script>alert('$emesg can t update profile')</script>";
		    echo '<script>window.location.href= "editprofile.php";</script>';
			die();
			}
			////age
			try{
             checkage($Agenum);
			 }
			catch(Exception $e){
            $mesg=	$e->getMessage();
			echo "<script>alert('$mesg cant update profile')</script>";
		    echo '<script>window.location.href= "editprofile.php";</script>';
			die();
			}

$sql = "UPDATE human SET  password='$password', firstname='$first' ,lastname='$last' ,
mobile='$mobile',age='$Agenum',email='$email'
WHERE username='$username'";

if( $result=mysqli_query($conn,$sql)){
	 				 error_log("$sql..",3,"databaseoperations.log");
                     echo "<script>alert('Profile update done');</script>";
					 echo '<script>window.location.href= "editprofile.php";</script>';
	 }
 else{
	 	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
	 }
}
mysqli_close($conn);
?>
