<?php
 session_start();
$loggedInUser = $_SESSION['showUsername'];

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli($servername,$username,$password,$dbName);

if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}
	 $sql = "INSERT INTO upload (name, size, type, content ) VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
	 
	 $que = "INSERT INTO UserFiles VALUES ('$loggedInUser','$fileName')";

if ($conn->query($sql) === TRUE && $conn->query($que) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



/* 
if ($conn->query($que) === TRUE ) {
    echo "New record created successfully";
} else {
    echo "Error: " . $que . "<br>" . $conn->error;
}
*/
$conn->close(); 

echo "<br>File $fileName uploaded<br>";
} 
?>