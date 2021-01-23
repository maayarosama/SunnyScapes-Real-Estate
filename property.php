<?php
require_once"header.php";
session_start ();
?>
<?php
 include("connection.php");

if(!empty($_SESSION['username'])){
	$username=$_SESSION['username'];
}
else{ echo "<script>alert('you're not logged in!')</script>";
	echo '<script>window.location.href= "Login.php";</script>';
}


  if(!empty($_SESSION['acctype'])) {
$acctype=$_SESSION['acctype'];
if($acctype=="1")
{
?>
<header id="header">
  <div class="container-fluid">
    <div id="logo" class="pull-left">
      <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="index.php">Home</a></li>
        <li class="menu-active"><a href="property.php">Properties</a></li>
        <li><a href="buyerrequests.php">Request Response</a></li>
        <li><a href="messages.php">Messages</a></li>
        <li><a href="searchQA.php">Q & A</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="editprofile.php">Edit Profile</a></li>
              <li><a href="Logout.php">Log Out</a></li>
    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->
<?php
}
?>
<?php
 if($acctype=="2")
{
?>
<header id="header">
  <div class="container-fluid">
    <div id="logo" class="pull-left">
      <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
    </div>
    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="addprop.php">Add Properties</a></li>
        <li><a href="MyProperties.php">Edit My Properties</a></li>
        <li class="menu-active"><a href="property.php">View all Properties</a></li>
        <li><a href="responsetorequest.php">Requests</a></li>
        <li><a href="messages.php">Messages</a></li>
        <li><a href="feedback.php">Feedbacks</a></li>
        <li><a href="searchQA.php">Q & A</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
          <li><a href="editprofile.php">Edit Profile</a></li>
        <li><a href="Logout.php">Log Out</a></li>
    </nav><!-- #nav-menu-container -->
  </div>
</header><!-- #header -->
<?php
}
 if($acctype=="3"){
  ?>
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Home</a></li>
          <li class="menu-active"><a href="adminview.php">Edit Properties</a></li>
       <li><a href="deleteusers.php">Delete Users</a></li>
          <li><a href="admin_help.php">Edit Q & A</a></li>
          <li><a href="ContactUs_admin.php">Answer Q & A</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="Logout.php">Log Out</a></li>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php
}
}
else {
  echo "<script>alert('You are not logged in );</script>";
  echo '<script>window.location.href= "Login.php";</script>';
}
?>
<br>
<br>
<br>
<br>
<div class="adminhelp">
<section id="aboutus" class="wow fadeIn">
    <div class="container text-center">
        <h3>View Properties</h3>
      </div>
  </section>
  <br><br>

  <script>

    function getResult()
    {
      jQuery.ajax(
      {
        url: "backend-searchprop.php",
        data:'term='+$("#term").val(),
        type: "POST",
        success:function(data2)
        {
          $("#result").html(data2);
        }
      });
    }
    function showDiv() {
   document.getElementById('term').style.display = "block";
}
  </script>
        <div class="row">
          <div class="col-lg-12">
		  <form id="ButtonsForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="submit" class="filterbtn" value="All" name ="allbtn" id="allbtn"  >
			<input type="submit" class="filterbtn2" value="Apartements" name ="appbtn" id="appbtn" >
            <input type="submit"  class="filterbtn3" value="Villa" name ="villabtn" id="villabtn" >
			<input type="submit" class="filterbtn4" value="Duplex" name ="dupbtn" id="dupbtn" >
			<input type="submit" class="filterbtn5" value="Studio" name ="studiobtn" id="studiobtn" >
			<input type="submit" class="rent" value="Rent" name ="rentbtn" id="rentbtn" onClick="rentfunction()" >
			<input type="submit" class="sale" value="Sale" name ="salebtn" id="salebtn" onClick="salefunction()">
      <input style="display: none;" name="searchtext" type="text" id="term" onkeyup="getResult()" placeholder="Search Term..." />
      <input type="button" class="filterbtn5" value="Search" name ="searchbtn" id="searchbtn" onClick="showDiv()" >
      <div id="result"></div>
			</form>
			</div>
        </div>
</div>
<?php

if(isset($_POST['rentbtn'])){
   	$sql="SELECT * FROM property WHERE deal='1' ";
if(mysqli_query($conn,$sql)){
	      $result=mysqli_query($conn,$sql);
		  		 error_log("$sql..",3,"databaseoperations.log");


?>
<?php
include('checkcss.php');
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{
    $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 property.php");
    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">
                <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>

                 <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
                  $avl="Available";
                else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
  <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
				 error_log("$sql5..",3,"databaseoperations.log");
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{
	  $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 property.php");
    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div><!--chat form-->
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }////end of while rows
  }////end of num rows
  ?>
  </div>
  <?php
}/////end of if sql
else{  $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql property.php");
	}

  include('footer.php');
  }
else if(isset($_POST['salebtn'])){
		$sql="SELECT * FROM property WHERE deal='2' ";
if(mysqli_query($conn,$sql)){
		 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);


include('checkcss.php');
?>
<?php
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 salebtn property.php");
	}
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">

                  <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                   <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
  								$avl="Available";
  							else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
				 error_log("$sql5..",3,"databaseoperations.log");
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql salebtn property.php");
    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div>
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }
}
}
else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql salebtn property.php");
	}
?>
</div>
<?php
 include('footer.php'); }
if(isset($_POST["allbtn"])){
  $sql="SELECT * FROM property ";
if(mysqli_query($conn,$sql)){
			 error_log("$sql..",3,"databaseoperations.log");
        $result=mysqli_query($conn,$sql);


include('checkcss.php');
?>
<?php
  if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{
   $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 allbtn property.php");
    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">

                  <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                 <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
  								$avl="Available";
  							else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
				  		 error_log("$sql5..",3,"databaseoperations.log");
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{
   $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 allbtn property.php");
    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div><!--chat form-->
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }
}////num rows
?>
</div>
<?php
 include('footer.php');
}////if conn sql
else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql allbtn property.php");}
}/////btn
else if(isset($_POST["appbtn"])){
    $sql="SELECT * FROM property WHERE type='2' ";
if(mysqli_query($conn,$sql)){
			  		 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);

include('checkcss.php');
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
			error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{
    $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 appbtn property.php");
    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">

                 <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
              <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
                  $avl="Available";
                else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
				   error_log("$sql5..",3,"databaseoperations.log");
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 appbtn property.php");    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div><!--chat form-->
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }
}
?>
</div>
<?php
 include('footer.php');
}////sql end of if
else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql appbtn property.php");}
}////app btn end
else if(isset($_POST["villabtn"])){
$sql="SELECT * FROM property WHERE type='1' ";
if(mysqli_query($conn,$sql)){
			  		 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);

include('checkcss.php');
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				  		 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
else{
    $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 villabtn property.php");
    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">
              <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
  								$avl="Available";
  							else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
				  		 error_log("$sql5..",3,"databaseoperations.log");
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>

     <?php }
  }else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 villabtn property.php");    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div>
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }///end of sql while
}////end of if result
?>
</div>
<?php
 include('footer.php');
}///end of if conn sql
else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql villabtn property.php");}
}////end of villa btn
else if(isset($_POST["dupbtn"])){
$sql="SELECT * FROM property WHERE type='3' ";
if(mysqli_query($conn,$sql)){
			  		 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);

include('checkcss.php');
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				  		 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
   else{
          $errorconn= mysqli_error($conn);
	      trigger_error("$errorconn sql3 dupbtn property.php");    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
             ?>
            </figure>
            <div class="portfolio-info">

                 <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                   <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
  								$avl="Available";
  							else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
      $result5=mysqli_query($conn,$sql5);
	  		  		 error_log("$sql5..",3,"databaseoperations.log");
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 dupbtn property.php");
    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div><!--chat form-->
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }
}
?>
</div>
<?php
 include('footer.php');
}//end of if conn sql
else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql dupbtn property.php");}
}//end of dupbtn
else if(isset($_POST["studiobtn"])){
$sql="SELECT * FROM property WHERE type='4' ";
if(mysqli_query($conn,$sql)){
			  		 error_log("$sql..",3,"databaseoperations.log");
	      $result=mysqli_query($conn,$sql);

include('checkcss.php');
?>
<?php
	if(mysqli_num_rows($result) > 0){
		while($row=mysqli_fetch_assoc($result)){
      $propID=$row['propertyID'];
      $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
    if(mysqli_query($conn,$sql3)){
				  		 error_log("$sql3..",3,"databaseoperations.log");
            $result3=mysqli_query($conn,$sql3);
          }
    else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 stduebtn property.php");    }
      ?>
      <section id="portfolio"class="section-bg">
        <div class="col-lg-4 portfolio-item filter-app wow fadeInUp">
          <div class=" portfolio-wrap">
            <figure>
              <?php
              while($row3=mysqli_fetch_assoc($result3))
              {
                  ?>
              <img src="img/<?php echo $row3['picture'];?>" class="img-fluid" alt="">
              <?php
            }
            ?>
            </figure>
            <div class="portfolio-info">

                <?php
                if($row['type']==1){
  					$type="Villa";
                }
  				else if($row['type']==2){
  				    $type="Apartment";
  				}
  				 else if($row['type']==3){
  						$type="Duplex";
  				 }
                  else{
  						$type="Studio";
                  }
                ?>
              <h4> <?php echo $type.' in '.$row['location'];?></h4>
              <div class="row">
                <div class="col-lg-2 box">
                <i class="fa fa-bed"> </i>
                <br>
                <?php echo $row['bednum'];?>
              </div>
              <div class="col-lg-2 box">
                <i class="fa fa-s15"></i>
                <br>
                 <?php echo $row['roomnum'];?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-institution"></i>
                <br>
                 <?php echo $row['area'].' sqft';?>
          </div>
              <div class="col-lg-2 box">
              <i class="fa fa-money"></i>
                <br>
                         <?php echo $row['minprice'].'$'.'<br>'.'-'.'<br>'.$row['maxprice'].'$';?>
          </div>
              <div class="col-lg-2 box">
                <i class="glyphicon glyphicon-screenshot"></i>
                <br>
                   <?php
                    if($row['deal']==1)
  								$deal="Rent";
  							else $deal="Sale";

                 echo $deal;
                 ?>
          </div>
              <div class="col-lg-2 box">
                <i class="fa fa-lock"></i>
                <i class="fa fa-unlock"></i>
                <br>
                <?php
                if($row['availability']==1)
                  $avl="Available";
                else $avl="Sold";
                ?>
                 <?php echo $avl;?>
          </div>
          </div>
          <div class="row">
            <?php
            if($_SESSION['acctype']=="1")
            {
              ?>
            <div class="col-lg-6 box">
 <?php
    $proprow=$row['propertyID'];
    $usernameid=$_SESSION['username'];
    $sql5="SELECT propertyID , buyerID FROM request WHERE propertyID='$proprow' AND buyerID='$usernameid' ";
    if(mysqli_query($conn,$sql5)){
				  		 error_log("$sql5..",3,"databaseoperations.log");
      $result5=mysqli_query($conn,$sql5);
               if(mysqli_num_rows($result5)>0){
    ?>
          <i class="fa fa-gavel"> </i>
          <br>
      <label value='requested'>Requested</label>
     <?php }
  }else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 stduebtn property.php");    }
       ?>
          </div>
          <div class="col-lg-6 box">
    <i class="fa fa-eye"></i>
    <form action="moredetails.php" method='post'  >
  <input type='hidden' name='propID' value=<?php echo $row['propertyID'] ?>  >
  <input type='submit'  value='See More'  name='details' class="seemore">
    </form>
        </div>
        <?php
      } ?>
        </div>
        </div>
          </div>
        </div>
      </section>
      <?php
    }
}
?>
</div>
<?php
 include('footer.php');
}//if con sql
else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql stdubtn property.php");}
}///enf of btn
mysqli_close($conn);
?>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>
<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
