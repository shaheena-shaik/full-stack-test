<?php
include("db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM sliders WHERE id='$id'";
$result = $conn->query($sql);

echo json_encode($result->fetch_assoc());
?>