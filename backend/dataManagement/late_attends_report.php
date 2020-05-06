<?php 
session_start();
require('../mysql/connection.php');
$sid = $_SESSION['student_id'];
$sysid = $_GET['sysid'];

$lateLesson = $_POST['lLesson'];
$reason = $_POST['reason'];

$url = "";

if($lateLesson != null && $reason != null) {
	$sql = "INSERT INTO student_late_attendent_report (sysid, studentid, late_courses, reason) VALUES ('$sysid', '$sid', '$lateLesson', '$reason')";
	$conn->query($sql);
	$url = "../../student/pdm.php?ar_status=success";
} else {
	$url = "../../student/pdm.php?ar_status=fail";
}

header('Location: '.$url);
?>