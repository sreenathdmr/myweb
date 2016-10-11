<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli($servername,$username,$password,$dbName);

if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}

$query = "SELECT id, name FROM upload";

$result = $conn->query($query) or die('Error, query failed');

if(mysqli_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysqli_fetch_array($result))
{
?>
<a href="download.php?id=<?php=$id;?>"><?php=$name;?>Download</a> <br>
<?php 
}
}
$conn->close(); 
?>
</body>
</html>