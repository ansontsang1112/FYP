<?php
require("../mysql/connection.php");

$sid = $_GET['sid'];
$classID = $_POST['classID']; 
$cID = $_POST['cID']; 
$time = $_POST['time'];
$time2 = $_POST['time2'];
$week_d = $_POST['week_d'];

$sql = "INSERT INTO ClassMgr (sysid, cID, classID, tTime, eTime, tWeek) VALUES ('$sid', '$cID', '$classID', '$time', '$time2', '$week_d')";
$conn->query($sql);

header('Location: ../../staff/cac_m.php');
?>