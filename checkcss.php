<?php
if(mysqli_num_rows($result) <=3 && mysqli_num_rows($result) > 0){
  ?>
  <div class="PropertyDiv3Items">
    <?php
  }
	if(mysqli_num_rows($result) <=6 && mysqli_num_rows($result) > 3){
 ?>
<div class="PropertyDiv6Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=9 && mysqli_num_rows($result) > 6){
 ?>
<div class="PropertyDiv9Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=12 && mysqli_num_rows($result) > 9){
 ?>
<div class="PropertyDiv12Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=15 && mysqli_num_rows($result) > 12){
 ?>
<div class="PropertyDiv15Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=18 && mysqli_num_rows($result) > 15){
 ?>
<div class="PropertyDiv18Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=21 && mysqli_num_rows($result) > 18){
 ?>
<div class="PropertyDiv21Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=24 && mysqli_num_rows($result) > 21){
 ?>
<div class="PropertyDiv24Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=27 && mysqli_num_rows($result) > 24){
 ?>
<div class="PropertyDiv27Items">
  <?php
}
else 	if(mysqli_num_rows($result) <=30 && mysqli_num_rows($result) > 27){
 ?>
<div class="PropertyDiv30Items">
  <?php
}
