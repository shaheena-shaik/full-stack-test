<?php
include("db.php");

if(isset($_POST['submit'])){

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"images/".$image);

$sql = "INSERT INTO sliders(title,description,category,image)
VALUES('$title','$description','$category','$image')";

$conn->query($sql);

header("Location: list.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Add Slider</h2>

<form method="POST" enctype="multipart/form-data">

<input name="title" class="form-control mb-2" placeholder="Title">

<textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

<input name="category" class="form-control mb-2" placeholder="Category">

<input type="file" name="image" class="form-control mb-2">

<button name="submit" class="btn btn-primary">Save</button>

</form>

</div>

</body>
</html>