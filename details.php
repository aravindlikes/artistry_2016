<?php
	include("config.php");
	$pic = mysql_query("select * from upload");
?>
<html>
	<head>
	</head>
	<body>
	<table border="1px">
		<thead>
			<tr>
				<th>Code</th>
				<th>Description</th>
				<th>College</th>
				<th>Theme</th>
				<th>Image</th>
			</tr>
		</thead>
	<?php while($row = mysql_fetch_array($pic))
	{?>
		<tr>
			<td><?php echo $row["code"];?></td>
			<td><?php echo $row["description"];?></td>
			<td><?php echo $row["college"];?></td>
			<td><?php echo $row["theme"];?></td>
			<td><img src="imageget/<?php echo $row["code"].".".$row["ext"];?>" alt="" style="height:100px; width:100px;" /></td>
		</tr>
	<?php
	}
	?>		
	</table>
	</body>
</html>