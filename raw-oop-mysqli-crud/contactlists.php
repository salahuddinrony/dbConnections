<?php
	// Class File
	include_once('dbconn.php');
	// Create a Database Model Object
	$db = new Model();
	$dbh = $db->dbconn();
	// Records Dump
	//echo '<pre>';
	//print_r($dbh);
	
	$sql		=	"SELECT * FROM contacts";
	$query		=	$dbh->query($sql);
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Contact Lists</title>
</head>
<body>
	<h1>Contact Lists :: MySQLI Procedural System</h1>
	
	<table border="1" width="50%">
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
					while($getC = $query->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $sl; ?></td>
					<td><?php echo $getC['name']; ?></td>
					<td><?php echo $getC['mobile']; ?></td>
					<td><?php echo $getC['email']; ?></td>
				</tr>
				<?php $sl++; } ?>
			</tbody>
		</thead>
	</table>
</body>
</html>