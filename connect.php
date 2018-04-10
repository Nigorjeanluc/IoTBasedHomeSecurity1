<?php
$host='127.0.0.1';
$user='Nigorjeanluc';
$password='nigor210694';
$dbname='IoTBasedHomeSecurity';
$dbcon=mysqli_connect($host,$user,$password,$dbname);
if(mysqli_connect_errno())
	{
		die('Connection Failed!'.mysqli_connect_error());
	}
?>