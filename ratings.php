<?php
	include("config.php");
	$pic = mysql_query("SELECT sum(rating),code,count(*) FROM `rating` group by code");
?>
<html>
	<head>
	</head>
	<body>
	<table border="1px">
		<thead>
			<tr>
				<th>Total Rating</th>
				<th>Code</th>
				<th>Rated By</th>
			</tr>
		</thead>
	<?php while($row = mysql_fetch_array($pic))
	{?>
		<tr>
			<td><?php echo $row["sum(rating)"];?></td>
			<td><?php echo $row["code"];?></td>
			<td><?php echo $row["count(*)"];?></td>
		</tr>
	<?php
	}
	?>		
	</table>
	</body>
</html>