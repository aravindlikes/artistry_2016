<?php
session_start();
include("config.php");
if(isset($_SESSION["code"]))
{
	$code=$_SESSION["code"]; 
	$password=$_SESSION["pass"];
	$college=$_SESSION["college"];
}
else{
	$code=$_POST['code']; 
	$password=$_POST['pass'];
	$_SESSION["code"] = $code;
	$_SESSION["pass"] = $password;
}

$sql="SELECT * FROM login WHERE code='$code' and password='$password'";

        $result = mysql_query("SELECT * FROM login WHERE code = '".$code."'");
		$row = mysql_fetch_array($result);
		$_SESSION["college"]=$row["college"];
        if(mysql_num_rows($result) > 0 )
        { 
			$query = mysql_query("SELECT code FROM upload WHERE code='".$code."'");
			if (mysql_num_rows($query) != 0)
			{
				header("Location: destroy.php");
			}
			else
			{
				header("Location: upload.php");
			}
        }
        else
        {
			echo "<script type='text/javascript'>alert('The username or password are incorrect!')</script>";
			session_destroy();
			echo "<script>setTimeout(\"location.href = 'login.php';\",10);</script>";
			//header("Location: index.html");
        }
?>