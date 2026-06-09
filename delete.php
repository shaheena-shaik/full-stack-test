<?php
include("db.php");

$id = $_GET['id'];

$conn->query("DELETE FROM sliders WHERE id='$id'");

header("Location: list.php");
?>