<?php
class ConDB{
	private $host,$user,$pass,$db;
	public $conn;
	
	public function ConDB(){
		$this->host="localhost";
		$this->user="root";
		$this->pass="";
		$this->db="bookstore";
		
		}
		
	public function connect(){
		try{
		$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8",$this->user,$this->pass);
		if($this->conn){
			//echo "Connected to the <strong>$this->db</strong> database successfully!";
				   }
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
	
	
	}
}


	?>