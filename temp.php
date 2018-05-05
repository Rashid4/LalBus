<?php
	session_start();
	include "Myheader.php";
	if(!isset($_SESSION['email'])) header('location: Login.php');
	if($_SESSION['status'] == 'student') header('location: index.php');
	
	$conn = openmysqlconnection();
	$bus = getBusId($conn, $_SESSION['bus']);
	$updateTime = date('Y-m-d')." ".date('h:i:sa');
	$lat = getLatitude();
	$lng = getLongitude();
	$sql = "insert into history (busid, start_time, updated_time, latitude, longitude) values ('$bus', '$updateTime', '$updateTime', $lat, $lng);";
	mysqli_query($conn, $sql);
	closemysql($conn);
	header('location: profile.php');
?>
