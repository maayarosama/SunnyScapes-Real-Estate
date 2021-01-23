<?Php
$localhost = "localhost";
$name = "mmcmfheu_Zeyad";
$password ="zeyadwael123";
$dbname ="mmcmfheu_realestate";
$arr=array();
$conn = new mysqli($localhost,$name,$password,$dbname);

if(!$conn){

	echo 'Not connected to server';
}

$sql = "SELECT `id`, `name` FROM `account_type` WHERE id !=3; ";

if ($result=mysqli_query($conn,$sql))
{

 while($row=mysqli_fetch_array($result)) {

      array_push($arr,$row);

   }
   foreach($arr as $rows){

       echo '<option value="'.$rows[0].'">'.$rows[1].'</option>';

   }
    print_r($arr);
  }
	else
	{

		echo 'cannot retrieve data';

	}


	?>
