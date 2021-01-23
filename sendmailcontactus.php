<?php
 include("connection.php");
 
      if(isset($_POST['sendmessage'])){
	   $name=$_POST['name'];
	   $email=$_POST['email'];
	   $subject=$_POST['subject'];
	   $message=$_POST['message'];
	     $to = "info@mmcmiu.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: $from";
    $subject = "SunnyScapes Support";

    $fields = array();
    $fields{"name"}    = "Name";
    $fields{"email"}    = "Email";
    $fields{"subject"}    = "Subject";
    $fields{"message"}   = "Message";
    $body = "Here is the message you got:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

	   $sql="INSERT INTO `contact_us` ( `username`, `email`, `subject`, `message`)
	   VALUES ('$name', '$email', '$subject', '$message');";
	   if(mysqli_query($conn,$sql)){
				 error_log("$sql..",3,"databaseoperations.log");

     echo "<script>alert('Your message sent ');</script>";
           echo '<script>window.location.href= "contactus.php";</script>';
	 }else{ $errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
              echo '<script>window.location.href= "contactus.php";</script>';
	}
   }

mysqli_close($conn);
?>
