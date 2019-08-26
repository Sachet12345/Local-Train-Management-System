<?php

$source=$_POST['source'];
$destination=$_POST['destination'];

//echo $source;

$con=mysqli_connect("localhost","root","","train");

$sql="select stationID from stations where stationName='$source'";
$sql1="select stationID from stations where stationName='$destination'";

//$sql="select trainID from stations where";
$source1=mysqli_query($con,$sql);
$destination1=mysqli_query($con,$sql1);

$row=mysqli_fetch_row($source1);
$row1=mysqli_fetch_row($destination1);

$source=$row[0];
$destination=$row1[0];


//$sql="select trainID_fk from trainstation where staionID_fk = ALL(select stationID_fk from trainstation where stationID_fk='$source' or stationID_fk='$destination')";

$sql="select * from trains where trainID IN (select trainID_fk from trainstation where stationID_fk IN ('$source','$destination') group by trainID_fk having count(distinct stationID_fk)=2)";
$result=mysqli_query($con,$sql);

echo '<link rel="stylesheet" href="style2.css"></head>';

$lol=$destination-$source;
$fare=10*($lol);

echo"<table>";
echo"<tr><td>Train ID</td><td>Train Name</td><td>Fare</td><tr>";
while($row=mysqli_fetch_assoc($result))
{
	echo"<tr><td><a href='showTrains.php?id=".$row['trainID']."'>{$row['trainID']}</a></td><td>{$row['trainName']}</td><td>$fare</td></tr>";
}
echo"</table>";

?>