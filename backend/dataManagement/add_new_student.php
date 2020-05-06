<?php
require("../mysql/connection.php");

$sid = $_GET['systemid'];
$studentID = $_POST['studentid']; 
$sName = $_POST['studentname']; 
$password = $_POST['password'];
$cID = $_POST['cID'];

$uuid = uniqid();

$randomController = array();
$courcesQuery = $conn->query("SELECT * FROM ClassMgr WHERE cID='$cID'");

if($courcesQuery->num_rows > 0) {
	while($row = $courcesQuery->fetch_assoc()) {
		array_push($randomController, $row['classID']);
	}
}

$picked_Class = $randomController[array_rand($randomController)];
$ccID = $cID . "-" . $picked_Class;


$sql = "INSERT INTO student_records (sysid, studentName, studentid, password, ccID) VALUES ('$sid', '$sName', '$studentID', '$password', '$ccID'); ";
$sql.= "INSERT INTO student_courses_info (sysid, studentid, cID, classID) VALUES ('$sid', '$studentID', '$cID', '$picked_Class'); ";
$conn->multi_query($sql);

header('Location: ../../staff/student_m.php');
?>