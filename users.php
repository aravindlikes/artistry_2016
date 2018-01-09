<?php
	include("config.php");
	$pic = mysql_query("SELECT * FROM `user`");
?>
<html>
	<head>
	</head>
	<body>
	<table border="1px">
		<thead>
			<tr>
				<th>S.no</th>
				<th>email</th>
				<th>uname</th>
				<th>uid</th>
			</tr>
		</thead>
	<?php
	$i=1;
	while($row = mysql_fetch_array($pic))
	{?>
		<tr>
			<td><?php echo $i; $i=$i+1;?></td>
			<td><?php echo $row["email"];?></td>
			<td><?php echo $row["uname"];?></td>
			<td><?php echo $row["uid"];?></td>			
		</tr>
	<?php
	}
	?>		
	</table>
	</body>
</html>