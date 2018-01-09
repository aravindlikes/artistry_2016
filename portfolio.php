<!DOCTYPE HTML>
<?php
	include("config.php");
	$pic = mysql_query("select * from upload");
if(isset($_POST['email']))
{
	$email= $_POST['email'];
	$uname= $_POST['uname'];
	$uid= $_POST['uid'];
	$user = mysql_query("SELECT * FROM user WHERE email = '".$email."'");
	if(mysql_num_rows($user)==0)
    {
		mysql_query("insert into user (email,uname,uid) values ('$email','$uname','$uid')") or die(mysql_error());
	}
}
else if(isset($_POST['rating-input-1']) && isset($_POST['uid']))
{
	$temp = mysql_query("SELECT * FROM rating WHERE uid = '".$_POST['uid']."' and code='".$_POST['code']."'");
	if(mysql_num_rows($temp)==0){
		mysql_query("INSERT INTO `rating`(`uid`, `code`, `rating`) VALUES ('".$_POST['uid']."','".$_POST['code']."','".$_POST['rating-input-1']."')") or die(mysql_error());
	}
}
else{
	header("Location: gallery.php");
}
?>
<html>
	<head>
		<title>Artistry</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css"/></noscript>
		
	</head>
	<style>
      .rating {
          overflow: hidden;
          display: inline-block;
      }
      .rating-input {
          position: absolute;
          left: 0;
          top: -50px;
      }
      .rating-star {        
          display: block;
          float: right;        
          width: 32px;
          height: 32px;
          background: url('images/star.png') 0 -32px;
			
      }
      .rating-star:hover,
      .rating-star:hover ~ .rating-star,
      .rating-input:checked ~ .rating-star {
          background-position: 0 0;
      }

}
	</style>

	<body class="is-loading-0 is-loading-1 is-loading-2">

		<div class="bg"/>
		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Artistry</h1>
						<p></p>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
					<?php while($row = mysql_fetch_array($pic))
					{?>
						<article>
							<a class="thumbnail" href="imageget/<?php echo $row["code"].".".$row["ext"];?>" data-position="left center"><img src="imageget/<?php echo $row["code"].".".$row["ext"];?>" alt="" /></a>
							<form method="post" action="">
							<input type="text" value=<?php echo $_POST['uid']; ?>  name="uid" style="visibility:hidden"/>
							<input type="text" value=<?php echo $row['code']; ?>  name="code" style="visibility:hidden"/>
								<span class="rating">
								<?php
								$i=5;
								while($i>0)
								{
									$tempr = mysql_query("SELECT * FROM rating WHERE uid = '".$_POST['uid']."' and code='".$row['code']."';");
									if(mysql_num_rows($tempr)!=0){
										$temp1 = mysql_fetch_array($tempr);
										$j=$temp1["rating"];
										if($j==$i){
										?>
											<input type="radio" class="rating-input" id="rating-input-1-<?php echo $i; ?>" value=<?php echo $i; ?> name="rating-input-1" hidden checked>
											<label for="rating-input-1-<?php echo $i; ?>" class="rating-star"></label>
										<?php
										}
									
									else{
									?>
										<input type="radio" class="rating-input" id="rating-input-1-<?php echo $i; ?>" value=<?php echo $i; ?> name="rating-input-1" hidden>
										<label for="rating-input-1-<?php echo $i; ?>" class="rating-star"></label>
									<?php
									}
									}
									else{
									?>
										<input type="radio" class="rating-input" id="rating-input-1-<?php echo $i; ?>" value=<?php echo $i; ?> name="rating-input-1" hidden>
										<label for="rating-input-1-<?php echo $i; ?>" class="rating-star"></label>
									<?php									
									}
									$i=$i-1;
								}
								$tempr = mysql_query("SELECT * FROM rating WHERE uid = '".$_POST['uid']."' and code='".$row['code']."';");
								if(mysql_num_rows($tempr)==0){
								?>
								<input type="submit"/>
								<?php
								}
								?>

								</span>															
							</form>							
							<h2><?php echo $row["theme"];?></h2>
							<p><?php echo $row["description"];?></p>
						</article>
						<?php }?>
					</section>					
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>