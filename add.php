<?php
include "db.php";

$name = $_POST['name'];
$location = $_POST['location'];
$status = $_POST['status'];

$stmt = $conn->prepare("INSERT INTO assets (name, location, status) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $location, $status);
$stmt->execute();

header("Location: index.php");
exit;
?>

