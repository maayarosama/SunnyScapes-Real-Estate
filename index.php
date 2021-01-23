<?php
 session_start();
require_once"header.php";
  ?>

  <?php
  include("connection.php");

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
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="property.php">Properties</a></li>
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
        <li class="menu-active"><a href="index.php">Home</a></li>
        <li><a href="addprop.php">Add Properties</a></li>
        <li ><a href="MyProperties.php">Edit My Properties</a></li>
        <li><a href="property.php">View all Properties</a></li>
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
?>

<?php
if($acctype=="3"){
  ?>
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="adminview.php">Edit Properties</a></li>
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
  ?>
  <header id="header">
      <div class="container-fluid">

        <div id="logo" class="pull-left">
          <a href="index.php"><img src="img/Logo.png" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="index.php">Home</a></li>
            <li><a href="searchQA.php">Q & A</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="Signup.php">Signup</a></li>
            <li><a href="Login.php">Login</a></li>

        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->

<?php
}
?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/photo-1464316325666-63beaf639dbb.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="carousel-text">The Easiest Way to Find a Property</h2>
                <p class="carousel-text">Look at the sunny side of everything.</p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/photo-1459767129954-1b1c1f9b9ace.jpg" alt=""></div>

          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="img/photo-1475855581690-80accde3ae2b.jpg" alt=""></div>

          </div>





        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">

        <div class="row">

          <div class="col-lg-4 box box-bg">
            <div class="iconpiggy">
              <i class="glyphicon glyphicon-piggy-bank"></i>
          </div>
            <h4 class="title"><a href="">No Downpayment</a></h4>
          </div>
                <div class="col-lg-4 box box-bg">
                  <div class="iconwallet">
            <i class="material-icons">account_balance_wallet</i>
          </div>
            <h4 class="title"><a href="">All Cash Offer</a></h4>
          </div>

          <div class="col-lg-4 box box-bg">
            <div class="iconhandshake">
            <i class="fa fa-handshake-o"></i>
          </div>
            <h4 class="title"><a href="">Locked in Pricing</a></h4>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->



        <!--==========================
      Services Section
    ============================-->
        <section id="services">
          <div class="container">

            <header class="section-header wow fadeInUp">


              <div class="padoffers">
                <div class="row">

                  <div class=" col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
                    <div class="icon"><i class="fa fa-key"></i></div>
                    <h4 class="title"><a href="property.php">Apartments</a></h4>
                    <p class="description">Premium apartments that ensures everyday comfort,that offers its residents space efficiency, and responds to
                        their needs seamlessly.</p>
                    <p>
                    </p>
                    <div class="icon"><i class="fa fa-key"></i></div>
                    <h4 class="title"><a href="property.php">Villas</a></h4>
                    <p class="description">Exclusive villas designed by international architects and engineers it offers smart living solutions without compromising your comfortable lifestyle.</p>
                  </div>

                  <div class="col-md-4 box wow bounceInUp" data-wow-duration="1.4s">
                    <img src="img/1-1-1024x449.jpg" width="450" height="250" alt="" align="middle ">
                    <img src="img/2-1-1024x449.jpg" width="450" height="250" alt="" align="middle ">
                  </div>

                  <div class="col-md-4 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="icon"><i class="fa fa-key"></i></div>
                    <h4 class="title"><a href="property.php">Studios</a></h4>
                    <p class="description">Comfortable studios that satisfies all your needs.</p>

                    <div class="icon"><i class="fa fa-key"></i></div>
                    <h4 class="title"><a href="property.php">Duplex</a></h4>
                    <p class="description" style="color:white;">Our duplex apartments promise you the space and luxury to spoil our residents with private entrances and gardens or rooftops based on their preferences.</p>
                  </div>


                </div>

              </div>
          </div>
        </section><!-- #services -->

        <?php

	$sql="SELECT * FROM property WHERE propertyID='1' OR propertyID='2' OR propertyID='3' ";
  if(mysqli_query($conn,$sql)){
  	      $result=mysqli_query($conn,$sql);
  		  }
  else{
    $errorconn=mysqli_error($conn);
    trigger_error("$errorconn  sql line 220 index.php");
  }
  	if(mysqli_num_rows($result)>0){
  		while($row = mysqli_fetch_assoc($result)){
  		      $propID=$row['propertyID'];
        $sql3="SELECT picture FROM pictures  WHERE propertyID = '$propID' LIMIT 1";
      if(mysqli_query($conn,$sql3)){
           error_log("$sql3..",3,"databaseoperations.log");
              $result3=mysqli_query($conn,$sql3);
            }
      else{
        $errorconn=mysqli_error($conn);
        trigger_error("$errorconn  sql3 line 232 index.php");
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
              <a href="property.php" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
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

                  echo $avl;?>
      </div>
      </div>
    </div>
      </div>
    </div>
  </section>
        <?php
}
}
?>

        <!--==========================
      Team Section
    ============================-->


    <div class="container">
      <div class="row">

        <div class="col-md-6 howitworkscontainer">
          <div class="container text-center">
<br>
<br>

            <h2>HOW THIS WORKS</h2>
          </div>
          <div class="howitworks">
          <div class="anchorcolour"><i class="fa fa-anchor anchorcolour"></i></div>
          <p class="texthowitworks"> Evaluate Property </p>
          <div class="anchorcolour"><i class="fa fa-anchor anchorcolour"></i></div>
        <p class="texthowitworks">Meet Your Agent &nbsp;&nbsp;&nbsp;&nbsp;</p>
          <div class="anchorcolour"><i class="fa fa-anchor anchorcolour"></i></div>
          <p class="texthowitworks"> Close the Deal </p>
          <div class="anchorcolour"><i class="fa fa-anchor anchorcolour"></i></div>
        <p class="texthowitworks"> Get your Property </p>
        </div>
        </div>
        <div class="col-md-6 PicHowItWorks">

      </div>
    </div>
</div>



        <!--==========================
      Contact Section
    ============================-->



  </main>

  <!--==========================
    Footer
  ============================-->
  <?php
   include('footer.php');


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

</body>

</html>
