<?php

session_start();
$arrival=$_POST['arrival'];
$password=$_SESSION['password'];
$id=$_POST['trainID'];
$con=mysqli_connect("localhost","root","","train");
$sql6="select MIN(stationID_fk) from trainstation where trainID_fk='$id'";
$result2=mysqli_query($con,$sql6);
$row2=mysqli_fetch_row($result2);
$sql6=$row2[0];
$pass=$password-1;

$sql="update trainstation set status='DEPARTED' where trainID_fk='$id' and stationID_fk Between '$sql6' and '$pass'";
mysqli_query($con,$sql);
//$sql2="select MAX(stationID_fk) from trainstation where trainID_fk='$id'";
$sql="update trainstation set actualArrTime='$arrival' where stationID_fk='$password' and trainID_fk='$id'";
mysqli_query($con,$sql);

/*$sql1="CREATE TRIGGER 'status_arrival'
AFTER UPDATE ON 'trainstation'
BEGIN 
   UPDATE 'trainstation'
   SET status = 'arrived'
   WHERE stationID_fk='$password' and trainID_fk='$id';
   END ;";*/


$sql1="update trainstation set status='ARRIVED' where stationID_fk='$password' and trainID_fk='$id'";
mysqli_query($con,$sql1);

$sql2="select MAX(stationID_fk) from trainstation where trainID_fk='$id'";
$result=mysqli_query($con,$sql2);
$row=mysqli_fetch_row($result);
$sql2=$row[0];

$sql3="select arrTime from trainstation where trainID_fk='$id' and stationID_fk='$password'";
	$result2=mysqli_query($con,$sql3);
	$row2=mysqli_fetch_row($result2);
	$row2=$row2[0];
	$time=(strtotime($arrival)-strtotime($row2))/60;
	$sql1="update trainstation set delay='$time MIN' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";

mysqli_query($con,$sql1);
$password++;
//echo $time;
if($time!=0)
{
	$sql1="update trainstation set status='DELAYED' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";
	mysqli_query($con,$sql1);
}
if($time<0)
{
$sql1="update trainstation set status='ON TIME' where trainID_fk='$id' and stationID_fk BETWEEN '$password' and '$sql2'";
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