<?php
$con=mysqli_connect("localhost","root","","train");
//$sql="update trainstation set actualArrTime='NULL',actualDepTime='NULL',delay='NULL',status='NULL'";
$sql="CALL `reset`();";
mysqli_query($con,$sql);
include 'home.html';


?>
