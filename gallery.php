<head>
	<title>Artistry</title>
	<link rel="shortcut icon" href="images/fav.png" type="image/png">
	<style type="text/css">
	html, body { margin: 0; padding:0;}
	#signin-button {
		padding: 5px;
	}
	#oauth2-results pre { margin: 0; padding:0; width: 600px;}
	.hide { display: block;}
	.show { display: block;}
	</style>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/platform.js" type="text/javascript"></script>
	<script type="text/javascript">
		var loginFinished = function(authResult)
		{
			gapi.client.load('oauth2', 'v2', function()
			{
				gapi.client.oauth2.userinfo.get()
				.execute(function(resp)
				{
				var form=document.createElement('form');
				form.method="post";
				form.action="portfolio.php";
				var email=document.createElement('input');
				email.value=resp.email;
				email.name="email";
				var uname=document.createElement('input');
				uname.value=resp.name;
				uname.name="uname"
				var uid=document.createElement('input');
				uid.value=resp.id;
				uid.name="uid"
				form.appendChild(email);
				form.appendChild(uname);
				form.appendChild(uid);
				form.submit();
				});
			});
		};

		var options = {
			'callback': loginFinished,
			'approvalprompt': 'force',
			'clientid': '442110686912-fj6n0qnslsbl66oh5cnjep3oavchbad0.apps.googleusercontent.com',
			'scope': 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email',
			'requestvisibleactions': 'http://schemas.google.com/CommentActivity http://schemas.google.com/ReviewActivity',
			'cookiepolicy': 'single_host_origin'
		};

		var renderBtn = function()
		{
			gapi.signin.render('renderMe', options);
			var but = document.getElementsByTagName("button");
		}
	</script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="application/x-javascript">
		addEventListener("load", function() 
			{ setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	
</head>
<body onload ="renderBtn()">

	<h1>Artistry</h1>
	<div class="container">
		<ul style="text-align:left">
			<li>The users should be sign-in with their google account to visit gallery page.</li>
			<li>You can give rate to any images but only once.</li>
			<li>Rating will be submitted only after clicking the “submit” button.</li>
			<li>Already Rated image cannot be rated once again.</li>
		</ul>
		<br>
		<div id="renderMe"></div>
		<br><image width="100" src="images/flash.png">		
	</div>
</body>

</html>