
<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['password']=$password;
$flag=0;
$con=mysqli_connect("localhost","root","","train");

$sql="select stationID from stations where stationName='$username'";
$sql1=mysqli_query($con,$sql);
$sql1=mysqli_fetch_row($sql1);
$sql6=0;
$sql6="select stationID from stations where '$username' IN(select stationName from stations)";
$sql6=mysqli_query($con,$sql6);
$sql6=mysqli_fetch_row($sql6);
$sql6=$sql6[0];
//echo $sql6;
$sql=$sql1[0];
if($sql6==0)
include 'error.html';
else
{
	if($password==$sql)
		include 'decide.php';
	else
		include 'error.html';
}

/*while($sql6=mysqli_fetch_row($sql6))
{
	if($username==$sql6)
	{
		$flag=1;
		break;
	}
}*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style3.css">
</head>
</html>

