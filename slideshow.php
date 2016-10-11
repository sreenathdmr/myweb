<html>
<head>
</head>
<body onload="preDetermine()">
<?php session_start(); $showUser=$_SESSION['showUsername'];?>
<br>
<br>
<div align="right" id="loginMsg">Welcome <?php echo $showUser; ?> <a href="index.php">Sign Out</a></div>
<div id="imgArea" align="center" width="800" height="800">
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
$result = $conn->query("select filename from UserFiles where username='$showUser'");

 while($row = $result->fetch_assoc()) {
//        echo $row["filename"]. "<br>";
		$result1 = $conn->query("select content from upload where name='$row[filename]'");
		
		$row1 = mysqli_fetch_assoc($result1);
		echo '<img  class="img" src="data:image/jpeg;base64,'.base64_encode($row1["content"]).'"/>';
    }
//$imagebytes = $row["content"];
//$result1 = $conn->query("select content from upload where name='row[filename]'");
//header("Content-type:image/jpeg");
//echo '<img style="display:none" src="data:image/jpeg;base64,'.base64_encode($imagebytes).'"/>';
//echo 'data:image/jpeg;base64,'.base64_encode($imagebytes).'';
?> 
<!-- 
<img class="img" style="display:block" src="Images/convertWeather.jpg"> <!--style="height:800px width=800px"
<img class="img" style="display:none" src="Images\galeria.jpg">
<img class="img" style="display:none" src="Images\My_Image.jpg">
<img class="img" style="display:none" src="Images\download.jpg">
<img class="img" style="display:none" src="Images\nature-images-6.jpg">
--> 
</div></br> 
<div align="center">
<input id="img1" type="button" value="1" onclick="changeImage(this.id)">
<input id="img2" type="button" value="2" onclick="changeImage(this.id)">
<input id="img3" type="button" value="3" onclick="changeImage(this.id)" >
<input id="img4" type="button" value="4" onclick="changeImage(this.id)">
<input id="img5" type="button" value="5" onclick="changeImage(this.id)">
</div>
<!-- The data encoding type, enctype, MUST be specified as below -->
<br>
<form method="post"  action="upload.php" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>
<input type="button" value="click" onclick="createImage('<?php echo $showUser;?>')">
<input type="button" value="preDetermine" onclick="preDetermine()">

<script>
function preDetermine()
{

   var imagesByClass1 = document.getElementsByClassName("img");
	
	for(x=0; x<imagesByClass1.length; x++)
	{
		imagesByClass1[x].style.display = "none";
	}	
	
	imagesByClass1[0].style.display = "block";
}
		
	
function changeImage(clicked_id)
{
	var imageNum = document.getElementById(clicked_id).value;
	
	var imagesByClass2 = document.getElementsByClassName("img");
	
	for(x=0; x<imagesByClass2.length; x++)
	{
		imagesByClass2[x].style.display = "none";
	}	
	
	imagesByClass2[imageNum-1].style.display = "block"; 
}

function createImage(userinfo)
{
document.getElementById("imgArea").innerHTML=str;
/*			alert(userinfo);
		
			var getImgInfo;
			
			var imgInfo;
				
	        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		 
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("txtHint").innerHTML = this.responseText;
			  
			   getImgInfo = this.responseText;
			   
			   alert(getImgInfo);
			   
//			  createImageElement(getImgInfo);
            }
        }; 
		
		xmlhttp.open("GET","returnimage.php?pdata="+userinfo,true);
        xmlhttp.send();	
*/		
}

function createImageElement(ImgInfo)
{
	alert(ImgInfo);
	
//	var varimg = "Images/convertWeather.jpg";
	
	var oImg=document.createElement("IMG");	
	
	oImg.setAttribute("src",ImgInfo);

	document.getElementById("imgArea").appendChild(oImg);	
}
</script>
</body>
</html>