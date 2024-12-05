<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $data = json_decode(file_get_contents('data.json'), true);
    
    $exists = false;
    foreach ($data as $entry) {
        if ($entry['title'] === $title) {
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $data[] = ['title' => $title, 'content' => $content]; 
        file_put_contents('data.json', json_encode($data));
        header('Location: post.php');
        exit();
    } else {
        echo  "There is a " . htmlspecialchars($title) . " blog";
    }
}
?>
<html>
<head>
    <link href="bootstrap.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Create New Blog</title>
</head>
<style>
	a{
		text-decoration:none;
		margin-left:10px;
		}
		body{
			text-align:center;
			}
	</style>
<body>
    <h1>Create New Blog</h1>
    <form method="post">
        <div class="input-group mb-3" style="margin-left:20px; margin-right:20px;">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Title</span>
  </div>
  <input type="text" class="form-control" name="title"required>
</div>
        <div class="input-group mb-3" style="margin-left:20px; margin-right:20px;">
  <div class="input-group-prepend">
    <span class="input-group-text" style="height:300px;">Content</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="content" rows="10"></textarea>
</div>
        <button type="submit" class="btn btn-success">Create</button><a href="post.php">Back</a>
    </form>
</body>
</html>
