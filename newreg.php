<?php
	$code=$_POST['code'];
	$name=$_POST['name'];
	$mail=$_POST['mail'];
	$phone=$_POST['phone'];
	$password=$_POST['pass'];
	
	include("config.php");
	$college= mysql_query("SELECT * FROM college WHERE code = '".$code."'");
	$collist=mysql_fetch_array($college);
	$collegename=$collist['college'];
	$result = mysql_query("SELECT * FROM login WHERE code = '".$code."'");
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($college) != 0 ){
		if(mysql_num_rows($result) == 0 )
		{
			mysql_query("insert into login (code,name,mail,phone,pass,college) values ('$code','$name','$mail','$phone','$password','$collegename')") or die(mysql_error());
			echo "<script type='text/javascript'>alert('The College Registered Succesfully !')</script>";
			echo "<script>setTimeout(\"location.href = 'login.php';\",10);</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('The College Already Registered by ".$row['name']." Phone number".$row['phone']."!')</script>";
			echo "<script>setTimeout(\"location.href = 'index.php';\",10);</script>";
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Invalid College Code')</script>";
		echo "<script>setTimeout(\"location.href = 'index.php';\",10);</script>";
	}
	
?>