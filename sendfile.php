<!DOCTYPE html>
<html>
<head>
	<title>Uploading File</title>
</head>
<body>
	<form action="?" method="POST" enctype="multipart/form-data">
		<label>Uploading Files</label>
		<p><input type="file" name="file"></p>
		<p><input type="submit" name="upload" value="Upload File"></p>
	</form>
</body>
</html>

<?php 
	if (isset($_POST['upload'])) {
		$file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
		$file_source = "upload/".$file_name;

		move_uploaded_file($file_tem_loc, $file_source);
	}
?>