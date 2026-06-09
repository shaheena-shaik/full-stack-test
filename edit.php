<?php
include("db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM sliders WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];

if($_FILES['image']['name']!=""){

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"images/".$image);

$sql = "UPDATE sliders SET title='$title',description='$description',category='$category',image='$image' WHERE id='$id'";
}
else{
$sql = "UPDATE sliders SET title='$title',description='$description',category='$category' WHERE id='$id'";
}

$conn->query($sql);

header("Location: list.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Edit Slider</h2>

<form method="POST" enctype="multipart/form-data">

<input name="title" value="<?php echo $row['title']; ?>" class="form-control mb-2">

<textarea name="description" class="form-control mb-2"><?php echo $row['description']; ?></textarea>

<input name="category" value="<?php echo $row['category']; ?>" class="form-control mb-2">

<img src="images/<?php echo $row['image']; ?>" width="100"><br><br>

<input type="file" name="image" class="form-control mb-2">

<button name="update" class="btn btn-primary">Update</button>

</form>

</div>

</body>
</html>