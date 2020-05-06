<?php
session_start();
require('../mysql/connection.php');

$actions = $_GET['action'];
$sysid = $_GET['sysid'];

if($actions == "modify") {
	$getStatus = $conn->query("SELECT status FROM attendent_info WHERE sysid='$sysid'");
	$statusResult = $getStatus->fetch_assoc();
	
	if($statusResult['status'] == "Late") {
		$status = "On Time";
		$conn->query("UPDATE attendent_info SET status='$status' WHERE sysid='$sysid'");
	} else {
		$status = "Late";
		$conn->query("UPDATE attendent_info SET status='$status' WHERE sysid='$sysid'");
	}
} else {
	$status = "Absent";
	$conn->query("UPDATE attendent_info SET status='$status' WHERE sysid='$sysid'");	
}

header('Location: ../../staff/attends.php');
?>