<?php
	class Model
	{
		// Mysqli PDO
		private $dbhost 	= 	'localhost';
		private $user 		= 	'megamindit';
		private $pass 		= 	'megamindit';
		private $dbname		=	'_crudAll';
		private $port		=	'3306';
		private $prefix		=	'my_';
		public $conn;
		
		// PDO
		public function __construct()
		{
			try
			{
				$this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname",$this->user,$this->pass);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo 'Success!';
			}
			catch(PDOException $e)
			{
				echo 'Connection Fail '. $e->getMessage;
			}
		}
		
		// for login ststements
		public function login_check($username,$password,$table)
		{
			$password=md5($password);
			$select=$this->db->prepare("select * from $table where username=:username and password=:password and status=:status");
			$select->execute(array(':username'=>$username,':password'=>$password,':status'=>1));
			$fetch=$select->fetchAll(PDO::FETCH_ASSOC);
			$rowCount=$select->rowCount();
			$_SESSION['username']=$username;
			if($rowCount==1)
			{
				$_SESSION['login']=TRUE;
				return TRUE;
			}else
			{
				return FALSE;
			}
		}
		
		// Session registration for login user check
		public function checkSession()
		{
			if(isset($_SESSION['login'])){
				return $_SESSION['login'];
			}
		}
		
		/**
		** Action : Get all Values from database
		**/
		public function getAllData($table)
		{
			$sql = "SELECT * FROM $table";
			$query = $this->conn->prepare($sql);
			$query->execute();

			return $query->fetchAll();
		}
		
		/**
		** Action : Count numbers of ROWs
		**/
		public function getNumberOfRows($table)
		{
			$sql = "SELECT * FROM $table";
			$query = $this->db->prepare($sql);
			$query->execute();
			$rowCount=$query->rowCount();

			return $rowCount;
		}
		
		/**
		** Action 2: Get all Values from database
		**/
		public function getAllDataE($table)
		{
			$query = $this->db->prepare("SELECT * FROM $table");
			$query->execute();
			while($fetch = $query->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $fetch;
			}
			return $data;
		}
		
		/**
		** Action : Checked exist username from database
		**/
		public function checkExistUsername($username,$table)
		{
			$query = $this->db->prepare("select * from $table WHERE username=:username");
			$query->execute(array(':username'=>$username));
			$fetch=$query->fetchAll(PDO::FETCH_ASSOC);
			$rowCount=$query->rowCount();
			if($rowCount > 0)
			{
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
		
		/* Get all page contents */
		public function getAllPageContents($key,$kVal,$table)
		{
			$sql = "SELECT * FROM $table WHERE $key=:$key";
			$query = $this->db->prepare($sql);
			$query->execute(array(":$key"=>$kVal));

			return $query->fetch();
		}
		
		// Insert Data
		public function newUserAdd($name,$email,$username,$password,$status,$table)
		{
			$password=md5($password);
			$sql = "INSERT INTO $table SET name=:name,email=:email,username=:username,password=:password,status=:status";
			$query = $this->db->prepare($sql);
			$parameters = array(':name'=>$name,'email'=>$email,':username'=>$username,':password'=>$password,':status'=>1);
			$query->execute($parameters);
			return true;
		}
		
		// Update Data
		public function updateUser($name,$email,$username,$password,$status,$table)
		{
			$password=md5($password);
			$sql = "INSERT INTO $table SET name=:name,email=:email,username=:username,password=:password,status=:status WHERE username=:username";
			$query = $this->db->prepare($sql);
			$parameters = array(':name'=>$name,'email'=>$email,':username'=>$username,':password'=>$password,':status'=>1);
			$query->execute($parameters);
			return true;
		}
		
		
		/*********************************************** Delete area *********************
		
		/**
		** Action : Delete a Data From database
		**/
		public function deleteRow($del_id, $table)
		{
			$sql = "DELETE FROM $table WHERE id = :del_id";
			$query = $this->db->prepare($sql);
			$parameters = array(':del_id' => $del_id);

			$query->execute($parameters);
		}
	
		
	}
?>