<?php
$Agenum=$_REQUEST["Age"];
if ( $Agenum < 20 || $Agenum > 150 ) {
	    echo "Invalid AGE <br>";
        }
		$email=$_REQUEST["email"];
		$PhoneNo=$_REQUEST["phone"];
		$phonelength=strlen("$PhoneNo");
		if ($PhoneNo < 0 || $phonelength < 11 || $phonelength > 11 ) {
	   echo "Invalid phone number<br>";
        }		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 echo "$email is a not valid email address<br>";
        }
?>