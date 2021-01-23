<?php
require_once"header.php";
session_start ();
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
          <li ><a href="index.php">Home</a></li>
          <li><a href="property.php">Properties</a></li>
          <li><a href="buyerrequests.php">Request Response</a></li>
          <li><a href="messages.php">Messages</a></li>
          <li><a href="searchQA.php">Q & A</a></li>
          <li class="menu-active"><a href="contactus.php">Contact Us</a></li>
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
          <li><a href="property.php">View all Properties</a></li>
          <li><a href="responsetorequest.php">Requests</a></li>
          <li><a href="messages.php">Messages</a></li>
		      <li><a href="feedback.php">Feedbacks</a></li>
          <li><a href="searchQA.php">Q & A</a></li>
          <li class="menu-active"><a href="contactus.php">Contact Us</a></li>
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
          <li><a href="adminview.php">Edit Properties</a></li>
       <li><a href="deleteusers.php">Delete Users</a></li>
          <li><a href="admin_help.php">Edit Q & A</a></li>
          <li class="menu-active"><a href="ContactUs_admin.php">Answer Q & A</a></li>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="searchQA.php">Q & A</a></li>
            <li class="menu-active"><a href="contactus.php" >Contact Us</a></li>
            <li><a href="Signup.php">Signup</a></li>
            <li><a href="Login.php">Login</a></li>
        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->
  <?php
  }
  ?>
  <br>
  <br>
  <br>
  <br>
  <div class="adminhelp">
  <section id="aboutus" class="wow fadeIn">
      <div class="container text-center">
          <h3>Contact Us</h3>
        </div>
    </section>
    <br><br>
  <section id="contact" class="section-bg wow fadeInUp">
       <div class="container">
         <div class="section-header">
           <h3>Contact Us</h3>
           <p>Send us any inquiry 24/7 Support</p>
         </div>
         <div class="row contact-info">
           <div class="col-md-4">
             <div class="contact-address">
               <i class="ion-ios-location-outline"></i>
               <h3>Address</h3>
                <p>S.C.O 214 1st floor sector 36D Cairo 160036</p>
             </div>
           </div>
           <div class="col-md-4">
             <div class="contact-phone">
               <i class="ion-ios-telephone-outline"></i>
               <h3>Phone Number</h3>
               <p><a href="tel:+201067191933">+201067191933</a></p>
             </div>
           </div>
           <div class="col-md-4">
             <div class="contact-email">
               <i class="ion-ios-email-outline"></i>
               <h3>Email</h3>
               <p><a href="mailto:info@sunnyscapes.com">info@sunnyscapes.com</a></p>
             </div>
           </div>
         </div>
         <div class="form">
           <div id="sendmessage">Your message has been sent. Thank you!</div>
           <div id="errormessage"></div>
           <form action="sendmailcontactus.php" method="post"  class="contactForm">
             <div class="form-row">
               <div class="form-group col-md-6">
                 <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                 <div class="validation"></div>
               </div>
               <div class="form-group col-md-6">
                 <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" />
                 <div class="validation"></div>
               </div>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  />
               <div class="validation"></div>
             </div>
             <div class="form-group">
               <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
               <div class="validation"></div>
             </div>
             <div class="text-center"><button type="submit" name='sendmessage'>Send Message</button></div>
           </form>
         </div>
       </div>
     </section><!-- #contact -->
     </body>
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
<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
