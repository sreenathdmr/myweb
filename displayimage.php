<?php
echo 'none';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli($servername,$username,$password,$dbName);

if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}
else
echo 'success';

$result = $conn->query("select * from upload where id=10");
$row = mysqli_fetch_assoc($result);
$imagebytes = $row["content"];
//header("Content-type:image/jpeg");
echo "nothing";
echo '<img src="data:image/jpeg;base64,'.base64_encode($imagebytes).'"/>';
?>
