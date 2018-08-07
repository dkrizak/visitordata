<?php
	
	class LoginSystem {

		public function login() {
			$db = new Database();
			$con = $db->connect();

			$user = $_POST['username'];
			$password = md5($_POST['password']);

			$sql = "SELECT user, password FROM users WHERE user=? AND password=?";

			$statement = $con->prepare($sql);
			$statement->execute(array($user, $password));

			if ($row = $statement->fetch()){
				$_SESSION['uname'] = $user;
				header("location:admin.php");
			} else {
				header("location:admin.php?msg=Pogrešan_unos!");
			}
		}
	}

?>