<?php
session_start();
?>
<?php
include("connection.php");




if(isset($_POST['submit'])){
$filename=$_FILES['img']['name'];
$tempfilename=$_FILES['img']['tmp_name'];
//$imgs=$_POST['img'];
$id= $_POST['propid'];
$area=$_POST['area'];
$type=$_POST['type'];
$location=$_POST['location'];
$nroom=$_POST['rooms'];
$nbed=$_POST['beds'];
$max=$_POST['max'];
$min=$_POST['min'];
$deal=$_POST['deal'];

function checkarea($numm){
	if($numm < 0 ){
		throw new Exception("Invalid Area shouls be more than 0!");
	}
}
try
{checkarea($area);}
catch(Exception $e){
	         $emesg=$e->getMessage();
             trigger_error("Invalid Area shouls be more than 0! ");
			 echo "<script>alert('$emesg')</script>";
			 echo '<script>window.location.href= "adminview.php";</script>';
				die();
}

function checkminmax($maxn, $minn){
	if($maxn < $minn ){
		throw new Exception ("max price should be greater than min price");}
	else if($maxn < 0 || $minn < 0){
		throw new Exception("prices shouldn't be less than 0");
		}
}
try{ checkminmax($max , $min);}
catch(Exception $e){
	$emsg=$e->getMessage();
	trigger_error("");
	echo "<script>alert('$emsg')</script>";
	echo '<script>window.location.href= "adminview.php";</script>';
		die();
}
function checknums($beds , $rooms){
	if($beds > 100 || $beds < 0 ){
		throw new Exception("bed number should be between 100 and 0!");
	}
	else if($rooms <0 || $rooms >100){
		throw new Exception("room number should be between 100 and 0!");
	}

}
try{ checknums($nbed , $nroom);}
catch(Exception $e){
	$emsg=$e->getMessage();
	echo "<script>alert('$emsg')</script>";
	trigger_error("");
	echo '<script>window.location.href= "adminview.php";</script>';
		die();
}

if (isset($_POST['availability'])){

$ava=1;

}
else
	$ava=0;

  $numimages=count($filename);
  function checkimg($imgn){
    if($imgn < 2){
      throw new Exception("must include more than one pic for your property!");
    }
  }
  try{checkimg($numimages);}catch(Exception $e){
  $emsg=$e->getMessage();
  trigger_error("");
  echo "<script>alert('$emsg')</script>";
 echo '<script>window.location.href= "adminview.php";</script>';
  die();
  }


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
 WHERE  propertyID='$id'";
 $dsql="DELETE FROM `pictures` WHERE propertyID=$id";
 if(mysqli_query($conn,$usql)){
	 				 error_log("$usql..",3,"databaseoperations.log");
					 $result=mysqli_query($conn,$usql);
	 }
 else{
	 	$errorconn=mysqli_error($conn);
 trigger_error("$errorconn  usql line 113 updatepropadmin.php");
	 }

if(mysqli_query($conn,$dsql)){
                $dres=mysqli_query($conn,$dsql);
 				 error_log("$dsql..",3,"databaseoperations.log");
} else{
$errorconn=mysqli_error($conn);
 trigger_error("$errorconn dsql line 121 updatepropadmin.php");
}



for($i=0;$i<count($filename);$i++){
	if(!empty($filename[$i])){
	$pic=$filename[$i];
	$tempname = $tempfilename[$i];
	$sqlsel="SELECT sellerID FROM property WHERE propertyID='$id'";

if(mysqli_query($conn,$sqlsel)){
	error_log("$sqlsel..",3,"databaseoperations.log");
    $ressellerID=mysqli_query($conn,$sqlsel);
	if(mysqli_num_rows($ressellerID)>0){
		while($row=mysqli_fetch_assoc($ressellerID)){
			$sellerID=$row['sellerID'];
		}
	}
}else{
$errorconn=mysqli_error($conn);
 trigger_error("$errorconn  sqlsel line 142 updatepropadmin.php");
}
$psql="INSERT INTO `pictures`(`picture`, `sellerID`, `propertyID`) VALUES ('$pic','$sellerID','$id')";
move_uploaded_file($tempname,"img/".$pic);
if(mysqli_query($conn,$psql)){
	error_log("$psql..",3,"databaseoperations.log");
    $res=mysqli_query($conn,$psql);
	echo "<script>alert('Sucessfully updated');</script>";
	echo '<script>window.location.href= "adminview.php";</script>';
}else{
$errorconn=mysqli_error($conn);
 trigger_error("$errorconn  psql line 153 updatepropadmin.php");
}
}
}}
if (isset($_POST['cancel'])){
		echo '<script>window.location.href= "adminview.php";</script>';
}
mysqli_close($conn);
?>
