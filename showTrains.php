<?php
$id= $_GET['id'];
$con=mysqli_connect("localhost","root","","train");
$sql="select stationName,stationName,arrTime,depTime,actualArrTime,actualDepTime,delay,status from trainstation,stations where trainID_fk='$id' and stationID_fk=stationID";
$result=mysqli_query($con,$sql);
$sql2="select trainID,trainName,typeOfTrain from trains where trainID='$id'";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);

echo '<link rel="stylesheet" href="style2.css"></head>';

echo "<tr><h3 style='color:white;padding-left:26%;padding-top:1%'><td>{$row2['trainName']}</td>/<td>{$row2['trainID']}</td></h3><tr>";
echo "<tr><h4 style='color:white;padding-left:26%;margin-top:0%'><td>{$row2['typeOfTrain']}</td></h4></tr>";

echo"<table>";
echo"<tr><td>Station Name</td><td>Arrival time</td><td>Departure time</td><td>Actual Arrival time</td><td>Actual departure time</td><td>Delay</td><td>Status</td><tr>";
while($row=mysqli_fetch_assoc($result))
{
	echo"<tr><td>{$row['stationName']}</td><td>{$row['arrTime']}</td><td>{$row['depTime']}</td><td>{$row['actualArrTime']}</td><td>{$row['actualDepTime']}</td><td>{$row['delay']}</td><td>{$row['status']}</td></tr>";
}
echo"</table>";
//echo "<form class='box' action='home.html' method='post'>";
//echo "<input type='submit' name='' value='Home'>";

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
  margin-left:46.5%;margin-top: 35%;padding: 10px 24px; background:#2ecc71;outline:none; " type=button class = "btn btn-success" id ="includi" name="home" onclick="window.location.href='home.html'" value='Home'>
</body>
</html>