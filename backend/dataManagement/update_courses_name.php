<?php
require("../mysql/connection.php");

$cID = $_POST['cID']; 
$newCName = $_POST['newCName'];

$sql = "UPDATE CoursesMgr SET cName='$newCName' WHERE cID='$cID'";
$conn->query($sql);

header('Location: ../../staff/cac_m.php');
?>