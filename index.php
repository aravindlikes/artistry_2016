<?php 
	if(isset($_SESSION["code"]))
	{
		header("Location: check.php");
	}
	else
	{
		header("Location: login.php");
	}
?>
