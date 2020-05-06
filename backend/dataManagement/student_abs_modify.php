<?php
session_start();
require('../mysql/connection.php');

$actions = $_GET['action'];
$ccID = $_GET['ccID'];
$sid = $_GET['sid'];

$fkccID = explode("-", $ccID);
$h = "Okay";

if($actions == "approve") {
	$status = "On Time";
	$conn->query("UPDATE attendent_info SET status='$status' WHERE cID='$fkccID[0]' AND classID='$fkccID[1]' AND studentid='$sid'");
} else {
	$status = "Absent";
	$conn->query("UPDATE attendent_info SET status='$status' WHERE cID='$fkccID[0]' AND classID='$fkccID[1]' AND studentid='$sid'");	
}

header('Location: ../../staff/attends.php');
?>