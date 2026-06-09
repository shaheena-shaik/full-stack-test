<?php
include("db.php");

$sql = "SELECT * FROM sliders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>All Sliders</h2>

<a href="add.php" class="btn btn-success mb-3">Add New</a>
<a href="index.php" class="btn btn-dark mb-3">Back</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Image</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['category']; ?></td>
<td>
<img src="images/<?php echo $row['image']; ?>" width="100">
</td>
<td>
<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Delete?')">Delete</a>
</td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>