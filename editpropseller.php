<?php
session_start();
include('header.php');
?>
<?php
 include("connection.php");

if(isset($_POST['edit'])){

$id =$_POST['propertyID'];
$sql="select * from property where propertyID = '".$id."'";
$result= mysqli_query($conn,$sql);
				 error_log("$sql..",3,"databaseoperations.log");
if($result){
	while($row =mysqli_fetch_array($result)){

$area=$row['area'];
$location=$row['location'];
$nroom=$row['roomnum'];
$nbed=$row['bednum'];
$max=$row['maxprice'];
$min=$row['minprice'];
		$type=$row['type'];
		$deal=$row['deal'];
		$availability=$row['availability'];
		$checked=$row['availability'];
	}
}else{
	$errorconn=mysqli_error($conn);
  trigger_error("$errorconn  sql line 30 editpropseller.php");
}
	 $dtsql="Select type from deal where id='$deal'";
$tsql="Select type from prop_type where id='$type'";
if($ress=mysqli_query($conn,$dtsql)){
while($row =mysqli_fetch_array($ress)){
$ddeal=$row['type'];
}
}
else{
  $errorconn=mysqli_error($conn);
    trigger_error("$errorconn  dtsql line 40 editpropseller.php");
}
if($resss=mysqli_query($conn,$tsql)){
while($row =mysqli_fetch_array($resss)){
$ttype=$row['type'];
}
}
else{
  $errorconn=mysqli_error($conn);
    trigger_error("$errorconn  tsql line 48 editpropseller.php");
}

}
mysqli_close($conn);
?>
<html>
<?php
if(!isset($_SESSION['acctype']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';

}
else{
$acctype=$_SESSION['acctype'];
if($acctype=="2"){
  ?>
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="index.php">Home</a></li>
          <li><a href="addprop.php">Add Properties</a></li>
          <li class="menu-active" ><a href="MyProperties.php">Edit My Properties</a></li>
          <li><a href="property.php">View all Properties</a></li>
          <li><a href="responsetorequest.php">Requests</a></li>
          <li><a href="messages.php">Messages</a></li>
  		<li><a href="feedback.php">Feedbacks</a></li>
          <li><a href="searchQA.php">Q & A</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
              <li > <a href="editprofile.php">Edit Profile</a></li>
          <li><a href="Logout.php">Log Out</a></li>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php
}
else{
  echo "<script>alert('You are not allowed to visit this page only sellers can view');</script>";
 echo '<script>window.location.href= "index.php";</script>';
}
}
?>
  <section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>Edit Properties</h3>
      </div>
  </section>

  <div class="container">

      <div class="col-md-3">

        <h1 class = "headersignup">Edit Proprties:</h1>
          <div class="card-body card-block">

<form name='update' action="updatepropseller.php" method="post"  enctype='multipart/form-data'>
property image:<br> <input type="file" class="file-control" name="img[]" id ="image" multiple="multiple"/><br>
location:<br> <input type="text" class="form-control" name="location"value= <?php echo $location;?> required="required"/><br>
area: <br><input type="number" class="form-control" name="area" value= <?php echo $area; ?> required="required"/><br>
deal: <br><select name='deal' class="form-control" value= <?php echo $ddeal; ?> >
    <?php require_once "get_Dealtype.php"; ?>
</select><br>
 type:<br><select name='type' class="form-control" placeholder= <?php echo $ttype; ?> >
<?php require_once "get_Proptype.php"; ?>
</select><br>
number of rooms: <br><input type="number" class="form-control" name="rooms"value= <?php echo $nroom;?> required="required"/><br>
number of beds: <br><input type="number" class="form-control" name="beds"value= <?php echo $nbed;?> required="required"/><br>
max price:<br> <input type="number" class="form-control" name="max"value= <?php echo $max;?> required="required"/><br>
min price:<br> <input type="number" class="form-control" name="min"value= <?php echo $min;?> required="required"/><br>
<?php
if($checked==1)
{
	?>
Available: <input class="CheckBox" type='checkbox'  name='availability' value='1'  checked /><br><br>
<?php
}
else{
 ?>
 Available: <input class="CheckBox" type="checkbox"  name="availability" value="1"/><br><br>
 <?php
}
?>
 <input type="hidden" name="propid" value= <?php echo $id ;?> >
  <button class="submitaddprop" name='submit' type="submit">Submit</button>
<button class="canceladdprop" name='cancel' type="submit">Cancel</button>

</form>
 </div>
    </div>
    </div>
    </div>
  <?php include('footer.php'); ?>
</html>
