<?php
$data = json_decode(file_get_contents('data.json'), true);
?>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>CMS-XD</title>
</head>
<style>
	a{
		text-decoration:none;
		}
	</style>
<body>
	<div style="margin-top:10px;">
    <h1 style="float:left; margin-left:20px;">Blog list</h1>
    <button class="btn btn-success" style="float:right; margin-right:20px;"><a href="create.php" style="color:white;">Create Blog</a></button>
    </div>
    <table class="table table-striped">
    	<?php
    echo "<thead><tr><th scope='col'>Blog</th><th scope='col'>edit</th><th scope='col'>delete</th></tr></thead>";
    foreach ($data as $index => $post) {
        echo '<tbody><tr><th scope="row"><a href="postblog.php?title=' .  urlencode($post['title']) . '">' . htmlspecialchars($post['title']) . '</a></th>';
        echo '<th scope="row"><button class="btn btn-primary"><a href="editpost.php?index=' . $index . '" style="color:white;">Edit</a></button></th>';
        echo '<th scope="row"><button class="btn btn-danger"><a href="deletepost.php?index=' . $index . '" style="color:white;">Delete</a></button></th>';
        echo "</tr></tbody>";
    }
    	?>
</table>
</body>
</html>