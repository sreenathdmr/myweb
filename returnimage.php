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

//$username=$_GET["pdata"];
//echo $username;
$result = $conn->query("select filename from UserFiles where username='sree'");

 while($row = $result->fetch_assoc()) {
        echo $row["filename"]. "<br>";
		$result1 = $conn->query("select content from upload where name='$row[filename]'");
		
		$row1 = mysqli_fetch_assoc($result1);
		echo '<img src="data:image/jpeg;base64,'.base64_encode($row1["content"]).'"/>';
    }
//$imagebytes = $row["content"];
//$result1 = $conn->query("select content from upload where name='row[filename]'");
//header("Content-type:image/jpeg");
//echo '<img src="data:image/jpeg;base64,'.base64_encode($imagebytes).'"/>';
//echo 'data:image/jpeg;base64,'.base64_encode($imagebytes).'';
?>