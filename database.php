<?php

class Database {

	private $host;
	private $username;
	private $password;
	private $dbname;

	public function connect() {
		$this->host = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "visitordata";

		try {
			$pdo = new PDO('mysql:host='. $this->host .';dbname='.$this->dbname, $this->username, $this->password);
		}
		catch (PDOException $e){
        	exit('Error Connecting To DataBase');
    	}

    	return $pdo;
	}

}

?>