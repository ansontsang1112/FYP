<?php
require('mysql/connection.php');
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'; 
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$url = "";
$level = "";
$dept = "";
if($username != null) {
		$student_result = $conn->query("SELECT * FROM student_records WHERE studentid='$username' AND password='$password'");
		if($student_result->num_rows > 0) {
			$_SESSION['student_id'] = $username;
			$_SESSION["isStudentLogin"] = true;
			$url = '../student.php?a_login=true';
		} else {
			$staff_result = $conn->query("SELECT * FROM staff_records WHERE staffid='$username' AND password='$password'");
			if($staff_result->num_rows > 0) {
				$staff_dept = $staff_result->fetch_assoc();
				$dept = $staff_dept['dept'];
				if($dept == "Teching Department") {
					$dept = "Teching Department";
					if($staff_dept['role'] == "FT Teacher") {
						$level = "FT Teacher";
					} else {
						$level = "PT Teacher";
					}
				}
				if($dept == "IT Department") {
					$dept = "IT Department";
					$level = "IT Staff";
				}
				if($dept == "Executive") {
					$dept = "Executive";
					$level = "Executive";
				}
				$_SESSION['role'] = $level;
				$_SESSION['dept'] = $dept;
				$_SESSION['username'] = $username;
				$_SESSION["isStaffLogin"] = true;
				
				$url = '../staff.php';
			} else {
				$url = '../index.php?status=login_fail';
			}
		}
}
header('Location: ' . $url);
?>