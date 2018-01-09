<!DOCTYPE html>
<html>
<?php
session_start();
include("config.php");
if(isset($_SESSION["code"]))
{
	if(isset($_POST["one"]))
	{

		function bytesToSize1024($bytes, $precision = 2) {
			$unit = array('B','KB','MB');
			return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
		}
		$FileName = $_FILES['image_file']['name'];
		$ext = pathinfo($FileName, PATHINFO_EXTENSION);
		$FileType = $_FILES['image_file']['type'];
		$FileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
		echo <<<EOF
		<p>Your file: {$FileName} has been successfully received.</p>
		<p>Type: {$FileType}</p>
		<p>Size: {$FileSize}</p>
EOF;
		$code=$_SESSION["code"];
		$description=$_POST["desc"];
		$theme=$_POST["theme"];
		$college=$_SESSION["college"];
		$temp = $_FILES['image_file']['tmp_name'];
		$savefile=$code.".".$ext;
		$file_to_saved = "imageget/".$savefile; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
		move_uploaded_file($temp, $file_to_saved);
		
		echo $file_to_saved;
		
		mysql_query("insert into upload (code,description,college,theme,ext) values ('$code','$description','$college','$theme','$ext')") or die(mysql_error());
		echo "<script type='text/javascript'>alert('Image has been Uploaded Successfully')</script>";
		header("LOCATION:destroy.php");
	}
}
else{
header("LOCATION:index.php");
}
?>
<head>

	<title>Artistry</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="shortcut icon" href="images/fav.png" type="image/png">
		<script type="application/x-javascript">
			addEventListener("load", function() 
				{ setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<script src="js/upload.js"></script>
		<link rel="stylesheet" href="css/upload.css" type="text/css" media="all">

</head>
<body>
	<h1>Artistry</h1>
	<div class="container">

		<div class="login">
			<h2>Upload</h2>
                <form id="upload_form_cont" enctype="multipart/form-data" method="post" action="">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                        <div><label for="dropdown">Please select your theme</label></div>						
						<div>
							<select name="theme" id="theme">
								<option>Peace in Dark</option>
								<option>Justice Society</option>								
							</select>
						</div>
                    </div>
					<br>
                    <div id="upload_button" style="visibility:hidden">
                        <input type="submit" value="Upload" name="one"/><br><br>
						<textarea rows="3" cols="50" name="desc" id="desc" placeholder="Description" required></textarea>
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid (.jpg)image files only!</div>
                    <div id="error2">An error occurred while uploading the file</div>
                    <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize">Your file is very big. We can't accept it. Please select small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div id="upload_response"></div>
                    </div>
                </form>
		</div>
		
		<div class="register">
			<h2>Preview</h2>
			<img id="preview" />
			<div class="clear"></div>
		</div>
	</div>
</body>

</html>