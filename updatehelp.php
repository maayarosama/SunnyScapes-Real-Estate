<?php
session_start();
?>
<?php
 include("connection.php");
 
if(isset($_POST['submit'])){
	$id= $_POST['id'];
echo $id;
echo"<br/>";
$question=$_POST['question'];
$answer=$_POST['answer'];
//$location=$_POST['location'];
$usql=" UPDATE `help` SET
 `answer`='".$answer."'
 ,`question`='".$question."'
 WHERE `id`='".$id."'";
$result=mysqli_query($conn,$usql);
if($result){
	error_log("$usql..",3,"databaseoperations.log");
	header("Location: admin_help.php");
}
else{
	$errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
}
}
mysqli_close($conn);
?>
