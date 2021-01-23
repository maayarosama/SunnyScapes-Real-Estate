<?php
session_start ();
$localhost = "localhost";
$name = "root";
$password ="";
$dbname ="real estate";
function customError($errno, $errstr) {
		 error_log("[$errno] $errstr",3,"errors.log");
   }
   set_error_handler("customError");
function checkcon($con){
			if(!$con)
			throw new Exception ("connection failed!");
			}
$conn=mysqli_connect($localhost,$name,$password,$dbname);
try{
     checkcon($conn);
}
catch(Exception $e){
	        $emesg=	$e->getMessage();
             trigger_error("error in connecting has been triggered ");
			echo "<script>alert('$emesg')</script>";
			 echo '<script>window.location.href= "index.php";</script>';
}
if(!isset($_SESSION['username']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
   else{
         $username=$_SESSION['username'];
       }
	   
	   
	   if(!isset($_SESSION['acctype']))
	{ echo "<script>alert('you're not logged in');</script>";
		 echo '<script>window.location.href= "Login.php";</script>';
}
   else{
         $acctype=$_SESSION['acctype'];
       }
$sql = "Select prop_type.type, deal.type, property.*
from property
join prop_type
on prop_type.id = property.type
join deal 
on property.deal = deal.id
";
// Escape user inputs for security
$term =  $_POST['term'];
if(!empty($term)){

    // Attempt select query execution
   $sql = $sql." WHERE property.propertyID LIKE '%" . $term . "%' 
	or property.roomnum LIKE '%" . $term . "%'
	or deal.type LIKE '%" . $term . "%'
	or property.location LIKE '%" . $term . "%'
	or property.bednum LIKE '%" . $term . "%'
	or property.minprice LIKE '%" . $term . "%'
    or property.maxprice LIKE '%" . $term . "%'
	or prop_type.type LIKE '%" . $term . "%' ";
}
    if($result = mysqli_query($conn, $sql)){
		 error_log("$sql..",3,"databaseoperations.log");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
              $propID=$row['propertyID'];
              $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
              if(mysqli_query($conn,$sql3)){
				   error_log("$sql3..",3,"databaseoperations.log");
                    $result3=mysqli_query($conn,$sql3);
                  }
              else{
$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql3 backendsearchprop.php");
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
              ?>

                  <i class="fa fa-gavel"> </i>
                  <br>
              <label value='requested'>Requested</label>

              <?php }
              }
			  else{$errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql5 backendendsearch.php");
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
            echo"<table border=50 BORDERCOLOR=#000000 width=100%>
              <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>End of search</th></tr>";

        } else{

            echo"<table border=50 BORDERCOLOR=#000000 width=100%>
              <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>No Matches Found</th></tr>";
              echo"<table border=50 BORDERCOLOR=#000000 width=100%>
              <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>End of search</th></tr>";
        }
    } else{
        $errorconn= mysqli_error($conn);
	trigger_error("$errorconn sql backendsearchprop.php");

    }

 echo"</table>";
// close connection
mysqli_close($conn);
?>
