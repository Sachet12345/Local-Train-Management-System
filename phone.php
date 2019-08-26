<?php
$con=mysqli_connect("localhost","root","","train");

$sql="select stationName,phone from stations,stationphone where stationID=stationID_fk";
$sql1=mysqli_query($con,$sql);
echo '<link rel="stylesheet" href="style2.css"></head>';
echo"<table>";
echo"<tr><td>Station Name</td><td>Phone No</td><tr>";
while($row=mysqli_fetch_assoc($sql1))
{
	echo"<tr><td>{$row['stationName']}</td><td>{$row['phone']}</td></tr>";
}
echo"</table>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<!--	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
<title>Search Trains</title>
<link rel="stylesheet" href="styledisp.css">
</head>
<body>
	<input style ="background-color: green; /* Green */
  border: none;
  color: white;
  border-radius: 4px;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  margin-left:47%;margin-top: 8%;padding: 10px 24px; background:#2ecc71;outline:none; " type=button class = "btn btn-success" id ="includi" name="home" onclick="window.location.href='home.html'" value='Home'>
</body>
</html>
