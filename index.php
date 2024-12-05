<?php
$files = scandir('uploads');
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS 0.1</title>
</head>
<style>
	a{
		text-decoration: none;
		color:white;
		}
		body{
			text-align:center;
			}
	</style>
<body>
	<form id="uploadForm" enctype="multipart/form-data">
    <h1 style="margin-left:20px; margin-top:20px; margin-bottom:20px;">CMS-XD 1.0</h1>
    <div class="mb-3">
  <input class="form-control" type="file" id="formFile" name="fileToUpload" style='margin-left:20px; margin-right:20px;' required><br>
  <input type="submit" value="upload" class='btn btn-success form-control' style='margin-left:20px; margin-right:20px;'>
   </div>
    </form><br>
    <table id="fileTable" class="table table-striped" style='margin-left:20px; margin-right:20px;'>
        <?php
        echo "<thead><tr><th scope='col'>file</th><th scope='col'>edit</th><th scope='col'>open</th><th scope='col'>delete</th></tr></thead>";
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                echo "<tbody><tr><th scope='row'>$file</th>";
                echo "<th scope='row'><button type='button' class='btn btn-primary'><a href='edit.php?file=$file'>edit</a></th></button>";
                echo "<th scope='row'><button type='button' class='btn btn-primary'><a href='uploads/$file'>open</a></th></button>";
                echo "<th scope='row'><button type='button' class='btn btn-danger'><a href='delete.php?file=$file'>delete</a></button></th>";
                echo "</tr></tbody>";
            }
        }
        ?>
    </table>
</body>
<script>
    $(document).ready(function(){
        $('#uploadForm').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(this);
            
            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log("File uploaded successfully");
                    
                    $('#fileTable').html(data);
                },
                error: function() {
                    console.log("Error uploading file");
                }
            });
        });
    });
</script>
</html>
