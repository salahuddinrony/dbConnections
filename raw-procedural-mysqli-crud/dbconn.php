<?php
	// MySQLI Procedural Database Connection String
	$dbHost		= 'localhost';
	$dbUser		= 'megamindit';
	$dbPassword	= 'megamindit';
	$dbName 	= '_crudAll';
	
	$conn 		= mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
	if(!$conn){
		echo '<strong>[ERROR] :</strong> MySQLI Database Couldn\'t Connected! - <b>'.mysqli_connect_error($conn).'</b><br/>';
		echo '<strong>[ERROR_NUMBER] :</strong>'.mysqli_connect_errno($conn).'<br/>';
		die();
	}else{
		echo 'MySQLI Database Connection has been Created with DB - <b>'.$dbName.'</b>';
	}
	
?>