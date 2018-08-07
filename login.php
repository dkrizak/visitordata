<?php

	session_start();
	require_once 'database.php';
	require_once 'login_system.php';

	$loginSystem = new LoginSystem();

	$loginSystem->login();


?>