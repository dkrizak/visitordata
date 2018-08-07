<?php

class database {

	private $host;
	private $username;
	private $password;
	private $dbname;

	protected function connect() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "visitordata";

		try {
			$pdo = new PDO('mysql:host='. $host .';dbname='.$dbname, $username, $password);
		}
		catch (PDOException $e){
        	exit('Error Connecting To DataBase');
    	}
	}

}

?>