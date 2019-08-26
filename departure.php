<?php
session_start();
$departure=$_POST['departure'];
$password=$_SESSION['password'];
$id=$_POST['trainID'];
//$time=$departure + 1800;

//echo $time;

$con=mysqli_connect("localhost","root","","train");
$sql2="select MAX(stationID_fk) from trainstation where trainID_fk='$id'";
$result=mysqli_query($con,$sql2);
$row=mysqli_fetch_row($result);
$sql2=$row[0];
//$sql6=$row2[0];
//$sql="update trainstation set status='departed' where stationID_fk Between '$sql6' and '$password'";
//echo $sql2;
//mysqli_query($con,$sql);
$sql="update trainstation set  actualDepTime='$departure', status='DEPARTED' where stationID_fk='$password' and trainID_fk='$id'";
mysqli_query($con,$sql);
//$sql1="update trainstation set estimatedArrTime='$time
//$count=1;
//$departure=strtotime($departure);
//$departure->add(new DateInterval('PT15M'));

//echo $departure;
/*while($password<=$sql2)
{
	$time->add(new DateInterval('PT15M'));
++$password;
//$time=$departure+1800($count);
$sql1="update trainstation set estimatedArrTime='$time' where trainID_fk='$id' and stationID_fk='$password'";
//$count++;
}*/
	$sql3="select depTime from trainstation where trainID_fk='$id' and stationID_fk='$password'";
	$result2=mysqli_query($con,$sql3);
	$row2=mysqli_fetch_row($result2);
	$row2=$row2[0];
	$time=(strtotime($departure)-strtotime($row2))/60;
	//echo $time;
	$sql1="update trainstation set delay='$time MIN' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";

mysqli_query($con,$sql1);
$password++;
//echo $time;
if($time!=0)
{
	$sql1="update trainstation set status='DELAYED' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";
	mysqli_query($con,$sql1);
}
if($time==0)
{
	$sql1="update trainstation set delay='NO DELAY' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";
	mysqli_query($con,$sql1);
	$sql1="update trainstation set status='ON TIME' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";
	mysqli_query($con,$sql1);
}
session_destroy();
include 'stationMaster.html';


?>