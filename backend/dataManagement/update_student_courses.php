<?php
require("../mysql/connection.php");

$student_name = $_POST['student_name']; 
$courses_id = $_POST['courses_id']; 

$query001 = $conn->query("SELECT * FROM student_records WHERE studentName='$student_name'");
$result001 = $query001->fetch_assoc();

$sid = uniqid();

$s_sID = $result001['studentid'];
$ccID_c = $result001['ccID'];

$randomController = array();
$courcesQuery = $conn->query("SELECT * FROM ClassMgr WHERE cID='$courses_id'");

if($courcesQuery->num_rows > 0) {
	while($row = $courcesQuery->fetch_assoc()) {
		array_push($randomController, $row['classID']);
	}
}

$picked_Class = $randomController[array_rand($randomController)];
$ccID = $courses_id . "-" . $picked_Class;

$newCCID = $ccID_c . "," . $ccID;

$sql = "UPDATE student_records SET ccID = '$newCCID' WHERE studentid = '$s_sID'; ";
$sql.= "INSERT INTO student_courses_info (sysid, studentid, cID, classID) VALUES ('$sid', '$s_sID', '$courses_id', '$picked_Class'); ";
$conn->multi_query($sql);

header('Location: ../../staff/student_m.php');
?>