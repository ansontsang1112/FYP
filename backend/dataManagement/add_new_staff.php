<?php
require("../mysql/connection.php");

$sysid = $_GET['systemid']; $staffid = $_POST['staffid'];
$password = $_POST['password']; $dept = $_POST['dept'];
$name = $_POST['staffname'];
$role = $_POST['role']; $courses = $_POST['courses'];

$sql = "INSERT INTO staff_records (sysid, staffid, staffName, password, dept, role, cID, status) 
VALUES ('$sysid', '$staffid', '$name', '$password', '$dept', '$role', '$courses', 'On Job')";
$conn->query($sql);
header('Location: ../../staff/staff_m.php');
?>