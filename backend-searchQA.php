
<html>
<body>
<?php
 include("connection.php");

$sql = "SELECT *FROM help";
// Escape user inputs for security
$term =  $_POST['term'];
?>
<div class="containerQA2">
 <div class="col-md-12">
   <?php
if(!empty($term)){
	?>
	 <?php
    // Attempt select query execution
    $sql = $sql." WHERE question LIKE '%" . $term . "%' or answer LIKE '%" . $term . "%'";
}
    if($result = mysqli_query($conn, $sql)){
		error_log("$sql..",3,"databaseoperations.log");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
				 ?>
  <?php
                echo "Question: " . $row['question'] . "<br/>Answer: ". $row['answer'] ."<br>";
                echo "<br>";
            }

?>
</div>
</div>
<?php
echo"<table border=50 BORDERCOLOR=#000000 width=100%>
  <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>End of search</th></tr>";
        }

		else{
            echo "<tr><td colspan=4>No matches found</td></tr>";
        }
    }
	else{
      $errorconn=mysqli_error($conn);
		trigger_error("$errorconn ");
	}

// close connection
mysqli_close($conn);
?>
</body>
</html>
