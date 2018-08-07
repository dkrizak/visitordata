<?php
	session_start();
	require_once 'database.php';
	require_once 'visitor.php';
?>
	<!DOCTYPE html>
		<html lang="hr">
			<header>
				<meta charset="utf-8">
				<meta name="keywords" content="visitordata">
				<link rel="stylesheet" type="text/css" href="style.css">
				<title>Visitor data</title>
			</header>

	<?php
	if (isset($_SESSION['uname'])) {
		echo '
		<body>
			<a href="index.php">Homepage</a>
			<div id="wrapper">
				<h1>Admin area</h1>
				<table>
					<tr>
						<th>IP Address</th>
						<th>OS</th>
						<th>Browser</th>
						<th>Times visited</th>
						<th>Last time visited</th>
					</tr>';

		$db = new Database();
    	$con = $db->connect();

		$sql = "SELECT * FROM visitors";

		$statement = $con->prepare($sql);
		$statement->execute();

		while ($row = $statement->fetch()){
			$visitor = new Visitor($row['ip'],$row['os'],$row['browser'],$row['times_visited'],$row['last_time_visited']);
			$visitor->printVisitor();
		}

		echo '
					<tr>
						<td colspan="4">
							<form action="logout.php"><input type="submit" value="Logut"></form>
						</td>
					</tr>			
				</table>
			</div>
		</body>
	</html>';

	} else {
		if (isset($_GET['msg'])) $msg = str_replace("_"," ",$_GET['msg']);
		else $msg = "";
		
		echo '
				<body>
					<a href="index.php">Homepage</a>
					<div id="wrapper">
						<h1>Admin area</h1>
						<table>
							<form  action="login.php" method="POST">
								<tr><td colspan="2"><span id="message">'.$msg.'</span></td></tr>
								<tr><td>Username:</td><td><input id="username" name="username" type="text"></td></tr>
								<tr><td>Password:</td><td><input id="password" name="password" type="password"></td></tr>
								<tr><td colspan="2"><input id="login" type="submit" value="Login"></td></tr>
							</form>
						</table>	
					</div>
				</body>
			</html>';
	} 
?>