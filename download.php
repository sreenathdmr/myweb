<?php
if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli($servername,$username,$password,$dbName);

if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}

$id    = $_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = $conn->query($query) or die('Error, query failed');
list($name, $type, $size, $content) = mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

$conn->close(); 
exit;
}

?>