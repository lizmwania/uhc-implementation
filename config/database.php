<?php
// used to get mysql database connection
class Database{

	// specify your own database credentials
	private $host = "den1.mysql6.gear.host";
	private $db_name = "uhcimplem";
	private $username = "uhcimplem";
	private $password = "Og047!5M4g!9";
	public $conn;
	

	// get the database connection
	public function getConnection(){

		$this->conn = null;

		try{
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}

		return $this->conn;
	}
}



?>