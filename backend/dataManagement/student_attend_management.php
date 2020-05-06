<?php
session_start();
require('../mysql/connection.php');

$sysid = uniqid();
$sid = $_SESSION['student_id'];

$timeNow = date("h:i:sa");
$converedTime = date("H:i", strtotime($timeNow));

$startTime = $_GET['startTime'];

$lateCounter = date("H:i",strtotime('+10 minutes',strtotime($startTime)));

$cID = $_GET['cID'];
$classID = $_GET['classID'];
$regTime = $converedTime;
$status = "";

if($converedTime >= $startTime && $converedTime <= $lateCounter) {
	$status = "Late";
	} else if($converedTime >= $lateCounter && $converedTime <= $endTime) {
		$status = "On Time";
} else {
	$status = "Late";
}

$sql = "INSERT INTO attendent_info (sysid, studentid, cID, classID, regTime, status) VALUES ('$sysid', '$sid', '$cID', '$classID', '$regTime', '$status')";
$conn->query($sql);

header('Location: ../../student/r_attendent.php');

?>