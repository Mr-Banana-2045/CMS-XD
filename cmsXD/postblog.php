<?php
$data = json_decode(file_get_contents('data.json'), true);
if (isset($_GET['title'])) {
    $title = urldecode($_GET['title']);
    $post = null;

    foreach ($data as $item) {
        if ($item['title'] === $title) {
            $post = $item;
            break;
        }
    }
}
?>
<html>
<head>
	<link href="bootstrap.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Blog <?php echo htmlspecialchars($post['title']); ?></title>
</head>
<style>
	a{
		text-decoration:none;
		margin-left:10px;
		}
		</style>
<body>
    <?php if ($post): ?>
        <div><h1 style="margin-left:20px; margin:10px;"><?php echo htmlspecialchars($post['title']); ?></h1><a href="post.php" style="margin-right:20px; margin:10px;">Back</a></div><hr>
        <p><?php echo nl2br($post['content']); ?></p>
    <?php else: ?>
        <h1>Not Found Blog</h1>
        <a href="post.php">Back to Blog list</a>
    <?php endif; ?>
</body>
</html>
