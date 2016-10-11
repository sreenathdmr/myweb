<html>
<head>
</head>
<body>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "sample";

	$conn = new mysqli(null,$username,$password,$dbName,'/cloudsql/zinc-arc-122822:us-central1:mysql91');

if($conn->connect_error)
{
   die("connection failed:" . $conn->connect_error);
}


	 $fname = $_POST["fname"];
	 $lname = $_POST["lname"];
	 $dob = $_POST["dob"]; 
	 $usernameName = $_POST["username"];
	 $passwordName = $_POST["password"];
	 
	 $sql = "INSERT INTO signup(fname, lname, dob, username, password) values('$fname', '$lname', '$dob', '$usernameName', '$passwordName')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 
}

?>

<form action="signup.php" method="post">
First Name: <input name="fname" type="text"/></br></br>
Last Name:  <input name="lname" type="text"/></br></br>
Data of Birth: <input name="dob" type="date"/></br></br>
Username: <input name="username" type="text"/></br></br>
Password:  <input name="password" type="password"/></br></br>
Re-enter Password: <input type="password"/></br></br>
<input type="submit" value="Submit"/>
<a href="index.php">Sign In</a>
<!--<input type="submit" value="Sign Up"/></br>-->
</form>

</body>
</html>
