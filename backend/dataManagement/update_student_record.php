<?php
session_start();
require('../mysql/connection.php');

$sid = $_SESSION['student_id'];
$s_name = $_POST['s_name'];

$sid = $_SESSION['student_id'];
$s_name = $_POST['s_name'];

if($s_name != null) {
	$sql = "UPDATE student_records SET studentName='$s_name' WHERE studentid='$sid'";
	$sqlQuery = $conn->query($sql);
}

header('Location: ../../student/pdm.php');
?>