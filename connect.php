<?php
	$host = "localhost";
	$dbname = "farm";
	$username = "root";
	$password = "";

	$mysqli = new mysqli( $host, $username, $password, $dbname,3307);
        
	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '
				. $mysqli->connect_error);
	}
	return $mysqli;


	?>