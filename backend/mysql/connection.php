<?php

$serverAddress = "10.68.10.2:3307";
$username = "tch";
$password = "Anson1112";
$dbname = "fyp";

$conn = new mysqli($serverAddress, $username, $password, $dbname);

if($conn->connect_error) {
	die("Connection error: " . $conn->connect_error);
}

?>