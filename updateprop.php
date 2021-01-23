<?php
session_start();
?>
<?php

$localhost = "localhost";
$name = "root";
$password ="";
$dbname ="real estate";

$sellerid=$_SESSION['username'];
$conn=mysqli_connect($localhost,$name,$password,$dbname);
if(isset($_POST['submit'])){

	$img=$_POST['img'];
$username=$_SESSION['username'];
	$id= $_POST['propid'];
$area=$_POST['area'];
$type=$_POST['type'];
$location=$_POST['location'];
$nroom=$_POST['rooms'];
$nbed=$_POST['beds'];
$max=$_POST['max'];
$min=$_POST['min'];
$deal=$_POST['deal'];
$ava=$_POST['availability'];

echo"$location";
$usql=" UPDATE `property`

 SET `type`='$type',
 `roomnum`='$nroom',
 `bednum`='$nbed',
 `area`='$area',
 `location`='$location',
 `deal`='$deal',
 `maxprice`='$max',
 `minprice`='$min',
 `availability`='$ava'
 WHERE sellerID='$username AND propertyID='$id'";

 $dsql="DELETE FROM `pictures` WHERE propertyID=$id";
 if(mysqli_query($conn,$usql)){
	 echo "<script>alert('Query update done');</script>";
	 }
 else{echo"Query update festek ".mysqli_error($conn);}



 $result=mysqli_query($conn,$usql);

 $dres=mysqli_query($conn,$dsql);

for($i=0;$i<count($img);$i++){
	$pic=$img[$i];
$psql="INSERT INTO `pictures`(`picture`, `sellerID`, `propertyID`) VALUES ('$pic','$sellerid','$id')";
echo $img[$i];


$res=mysqli_query($conn,$psql);}

if($result){

	echo 'success';
}
else{
	echo mysqli_error($conn);
}}
?>
