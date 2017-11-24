<?php
	Class Model{
		// Mysqli OOP
		private $dbhost 	= 	'localhost';
		private $user 		= 	'megamindit';
		private $pass 		= 	'megamindit';
		private $dbname		=	'_crudAll';
		private $port		=	'3306';
		private $prefix		=	'my_';
		public $conn;
		
		// Single DB Connection
		public function dbconn(){
			$this->conn = new mysqli($this->dbhost,$this->user,$this->pass,$this->dbname,$this->port,$this->prefix);
			if($this->conn->connect_error){
				echo 'MySQLI (OOP) Database Connection Problem!';
				die();
			}else{
				echo "MySQLI (OOP) Database Connection has been Established!";
			}
			return $this->conn;
		}
		
	}
?>