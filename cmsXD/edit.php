<?php
if (isset($_GET['file'])) {
    $filename = 'uploads/' . basename($_GET['file']);

    if (!file_exists($filename)) {
        die("error file");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $content = $_POST['content'];
        file_put_contents($filename, $content);
        echo "edited";
    }

    $content = file_get_contents($filename);
} else {
    die("error");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>File Editing</title>
</head>
<body>
    <form action="edit.php?file=<?php echo urlencode(basename($_GET['file'])); ?>" method="post">
       <h1 style='float:left; margin-top:20px; margin-bottom:10px; margin-left:10px;'>File <?php echo htmlspecialchars(basename($_GET['file'])); ?></h1>
       <a href="http://127.0.0.1:8080/index.php" style='color:red; text-decoration:none; float:right; margin-top:25px; margin-right:10px; margin-bottom:10px;'>close</a>
        <input type="submit" value="save" class='btn btn-success' style='float:right; margin-right:10px; margin-top:20px; margin-bottom:10px;'>
        <textarea class="form-control" rows="28" name="content"><?php echo htmlspecialchars($content); ?></textarea><br>
    </form>
</body>
</html>
