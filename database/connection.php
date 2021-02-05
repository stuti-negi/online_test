<?php 
class connection
{
	public $user;
	public $source;
	public $password;
	public $database;
	public $conn;

	
	function __construct($source = 'localhost', $user = 'root', $password = '', $database = 'online_test')
	{
		$this->source = $source;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;

		$this->conn =  new mysqli($this->source, $this->user, $this->password, $this->database);
	}
}
?>