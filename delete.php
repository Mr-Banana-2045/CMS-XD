<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = 'uploads/' . $file;

    if (file_exists($filePath)) {
        unlink($filePath);
        header('Location: http://127.0.0.1:8080/index.php');
        exit();
    } else {
        echo "Not found";
    }
} else {
    echo "error";
}
?>
