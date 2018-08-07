<?php
	session_start();
	require_once 'Database.php';
	require_once 'visitor.php';
	require_once 'functions.php';


	$db = new Database();
    $con = $db->connect();

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = new DateTime();

    //Check if visitor is new
    $sql = "SELECT ip, times_visited FROM visitors WHERE ip=?";
	$statement = $con->prepare($sql);
	$statement->execute(array($ip));

	if ($row = $statement->fetch())	{
		$times_visited = $row['times_visited'] + 1;
		$visitor = new Visitor($ip, getOS(), getBrowser(), $times_visited, $time);
		$visitor->updateVisitor($con);
	} else {
		//Visitor not new
		$times_visited = 1;
		$visitor = new Visitor($ip, getOS(), getBrowser(), $times_visited, $time);
		$visitor->storeVisitor($con);
	}

?>

<!DOCTYPE html>
<html lang="hr">
	<header>
		<meta charset="utf-8">
		<meta name="keywords" content="visitordata">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Visitor data</title>
	</header>

	<body>
		<a href="admin.php"><div id="admin">
			<p>Admin area</p>
		</div></a>
	</body>
</html>