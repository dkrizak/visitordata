<?php
	class LogoutSystem{

		public function logout(){
			session_unset();
			session_destroy();
			header("Location: admin.php?msg=Uspješno_ste_se_odjavili.");
		}
	}
?>