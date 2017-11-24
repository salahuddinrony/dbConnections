<?php
	// Database Connection File
	require_once('dbconn.php');
	
	// Get all records from contacts
	$sql		=	"SELECT * FROM contacts";
	$query		=	mysqli_query($conn,$sql);
	
	// Records Dump
	//echo '<pre>';
	//print_r($getFetch);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Contact Lists</title>
</head>
<body>
	<h1>Contact Lists :: MySQLI Procedural System</h1>
	
	<table border="1">
		<thead>
			<tr>
				<th>SL#</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
			</tr>
			<tbody>
				<?php
					$sl = 1;
					while($getC = mysqli_fetch_object($query)){
				?>
				<tr>
					<td><?php echo $sl; ?></td>
					<td><?php echo $getC->name; ?></td>
					<td><?php echo $getC->mobile; ?></td>
					<td><?php echo $getC->email; ?></td>
				</tr>
				<?php $sl++; } ?>
			</tbody>
		</thead>
	</table>
</body>
</html>