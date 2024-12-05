<?php
$data = json_decode(file_get_contents('data.json'), true);
$index = $_GET['index'];

array_splice($data, $index, 1);
file_put_contents('data.json', json_encode($data));

header('Location: post.php');
exit();
