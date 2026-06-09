<?php
include("db.php");

$sql = "SELECT * FROM sliders WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Slider Project</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f5f5;
}

.container{
    background:#fff;
    padding:40px;
    margin-top:40px;
    border-radius:12px;
    box-shadow:0px 0px 15px rgba(0,0,0,0.1);
}

img{
    width:100%;
    border-radius:10px;
}

.btn{
    margin-bottom:10px;
}
</style>
</head>

<body>

<div class="container">

<!-- NAV -->
<a href="list.php" class="btn btn-dark mb-3">Go to Admin List</a>

<div class="row">

<!-- BUTTONS -->
<div class="col-md-3">

<h4>Categories</h4>

<a onclick="loadData(1)" class="btn btn-primary w-100">Learning</a>
<a onclick="loadData(2)" class="btn btn-outline-primary w-100">Technology</a>
<a onclick="loadData(3)" class="btn btn-outline-primary w-100">Communication</a>

</div>

<!-- CONTENT -->
<div class="col-md-5">

<h2 id="title"><?php echo $row['title']; ?></h2>

<p id="description"><?php echo $row['description']; ?></p>

<p><b>Category:</b> <span id="category"><?php echo $row['category']; ?></span></p>

</div>

<!-- IMAGE -->
<div class="col-md-4">

<img id="image" src="images/<?php echo $row['image']; ?>">

</div>

</div>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
function loadData(id){

    $.ajax({
        url: "get_slider.php",
        type: "GET",
        data: {id: id},
        success: function(res){

            let data = JSON.parse(res);

            $("#title").text(data.title);
            $("#description").text(data.description);
            $("#category").text(data.category);
            $("#image").attr("src","images/"+data.image);
        }
    });
}
</script>

</body>
</html>