<?Php
$localhost = "localhost";
$name = "mmcmfheu_Zeyad";
$password ="zeyadwael123";
$dbname ="mmcmfheu_realestate";
$arr=array();
$conn = new mysqli($localhost,$name,$password,$dbname);



$arr=array();

if(!$conn){

	echo 'Not connected to server';
}

$sql = "SELECT `id`, `type` FROM `deal`;  ";


if ($result=mysqli_query($conn,$sql))
{

 while($row=mysqli_fetch_array($result)) {

      array_push($arr,$row);

   }
   foreach($arr as $rows){

       echo '<option value="'.$rows[0].'">'.$rows[1].$rows[2].'</option>';

   }
    print_r($arr);
  }
	else
	{

		echo 'cannot retrieve data';

	}


	?>
