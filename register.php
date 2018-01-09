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
				<li>Only one participant per college.</li>
				<li>Already registered participant cannot register once again in this event.</li>
				<li>Register using your college code.</li>
			</ul>
		</div>

		<div class="register">
			<h2>Register</h2>
			<form action="newreg.php" method="post">
				<input type="text" name="code" id="code" placeholder="College Code" required="" autocomplete="off">
				<input type="text" name="name" id="name" placeholder="Participants Name" required="" autocomplete="off">
				<input type="email" name="mail" id="mail" placeholder="Mail-id" required="" autocomplete="off">
				<input type="text" name="phone" id="phone" placeholder="Phone Number" required="" autocomplete="off">
				<input type="password" name="pass" id="pass" placeholder="Password" required="" autocomplete="off">
				<center>
					<div class="send-button">
						<input type="submit" onclick="return change();" value="Register">
					</div>
				</center>
			</form>
			<form action="login.php" method="post">
 				<center>
					<div class="send-button">
						<input type="submit"  value="Sign In">
					</div><image width="100" src="images/flash.png">
				</center>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<script>change=function(){
		var code = document.getElementById("code");
		var name = document.getElementById("name");
		var mail = document.getElementById("mail");
		var phone = document.getElementById("phone");
		var pass = document.getElementById("pass");
		var regex = /^[a-zA-Z ]{3,60}$/;
		var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var reg = /^[0-9]{10,15}$/;
		var msg;
		if((pass.value).length<8)
		{
			pass.value="";
			msg = "PASSWORD LENGTH IS SHORT(MIN LENGTH:8)";		
		}
		else if(!regex.test(name.value))
		{
			name.value="";
			msg = "VALID NAME REQUIRED";
		}
		else if(!re.test(mail.value))
		{
			mail.value="";
			msg = "VALID MAIL ID REQUIRED";
		}
		else if(!reg.test(phone.value))
		{
			phone.value="";
			msg = "VALID PHONE NUMBER REQUIRED";
		}
		else {
			return true;
		}
		alert(msg);
		return false;
	}
	</script>
</body>

</html>