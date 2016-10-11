<html>
<head>
</head>
<body>
<img src="Images/galeria.jpg" />
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli($servername,$username,$password,$dbName);
	
if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}

	 $usernameName = $_POST["usernameName"];
	 $passwordName = $_POST["passwordName"];
	 
	 $sql = "select password from signup where username = '$usernameName'";
	
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);

	if($row["password"] == $passwordName)
	{
		session_start();
		$_SESSION['showUsername'] = $usernameName;
// http://localhost:8080/Projects/
		header('Location:slideshow.php');
	}	
	else
	    echo "Login Failure";
/*		
if (($conn->query($sql)) === TRUE) {
     if($result == $passwordName)
		echo "Login Successfull";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
$conn->close(); 
}
?>
<br>
<br>
<form action="index.php" method="post">
Username: <input name="usernameName" type="text"/>
Password: <input name="passwordName" type="password"/>
<input type="submit" value="Submit"/>
</form>
<a href="signup.php">Sign Up</a>
</body>
</html>
