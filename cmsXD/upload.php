<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($fileType != "txt" && $fileType != "jpg" && $fileType != "png" && $fileType != "gif" && $fileType != "html" && $fileType != "js" && $fileType != "php" && $fileType != "css") {
    echo "Error extension";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Error";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	header("Location: http://127.0.0.1:8080/index.php");
        echo "file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded";
    } else {
        echo "error";
    }
}
?>

