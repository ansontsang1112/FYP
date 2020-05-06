<?php
require("../mysql/connection.php");

$cou = $_POST['cou']; 
$cName = $_POST['cName'];
$ATP = $_POST['ATP'];

$sql = "INSERT INTO CoursesMgr (cID, cName, Place) VALUES ('$cou', '$cName', '$ATP')";
$conn->query($sql);
header('Location: ../../staff/cac_m.php');
?>