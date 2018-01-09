<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION["code"]))
{
header("Location: check.php");
}
?>
<head>

	<title>Artistry</title>
		<link rel="shortcut icon" href="images/fav.png" type="image/png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="application/x-javascript">
			addEventListener("load", function() 
				{ setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">


</head>
<body>

	<h1>Artistry</h1>

	<div class="container">

		<div class="login">
			<h2>Instructions</h2>
			<ul>
				<li>Participants can select any one of the two themes and create an image for that theme.</li>
				<li>Participants need to upload their image in the Artistry Page.</li>
				<li>Uploaded image cannot be modified.</li>
				<li>Image should not exceed 1mb and should be width: 1000px, Height:700px and Format:(.jpg,.png,.bmp).</li>
				<li>A link will be provided for the participants after the uploaded image is verified.</li>
				<li>Participants can share the given link with their friends to get RATINGS.</li>
				<li>RATINGS given on artistry page alone will be considered for evaluation (Judges design will be final).</li>
			</ul>
		</div>

		<div class="register">
			<h2>Sign In</h2>
			<form action="check.php" method="post">
				<input type="text" Name="code" placeholder="Username" required="">
				<input type="password" Name="pass" placeholder="Password" required="">
				<center>
					<div class="send-button">
						<input type="submit" value="Sign In">
					</div>
				</center>
			</form>
			<form action="register.php" method="post">
				<center>
					<div class="send-button">
						<input type="submit"  value="Register Now">
					</div>
				</center>
			</form>
			<center>
			<image width="100" src="images/flash.png"></center>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</body>

</html>