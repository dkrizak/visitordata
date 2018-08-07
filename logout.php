<?php

	session_start();
	require_once 'logout_system.php';

	$logoutSystem = new LogoutSystem();

	$logoutSystem->logout();

?>