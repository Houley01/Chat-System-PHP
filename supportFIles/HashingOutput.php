<?php
	$UserPassword = $_POST['UserPassword'];
	$HashedPassword = password_hash($UserPassword, PASSWORD_DEFAULT);
	$DatabaseName = $_POST['DatabaseName'];
	$DatabaseUser = $_POST['DatabaseUser'];
	$DatabasePassword = $_POST['DatabasePassword'];
	echo 'Users Password';
	echo '</br>';
	print_r($UserPassword);
	echo '</br>';
	echo 'Hashed Password For Database';
	echo '</br>';
	print_r($HashedPassword);
	echo '</br>';
	echo 'Database Name';
	echo '</br>';
	print_r($DatabaseName);
	echo '</br>';
	echo 'Database User';
	echo '</br>';
	print_r($DatabaseUser);
	echo '</br>';
	echo 'Database Password';
	echo '</br>';
	print_r($DatabasePassword);

// Database Connections, Choose your database
	function dbConnect() {
		$DatabaseName = $_POST['DatabaseName'];
		$Host = 'localhost';
		// print_r($DatabaseName);
		// die();
		$DatabaseUser = $_POST['DatabaseUser'];
		$DatabasePassword = $_POST['DatabasePassword'];
    $conn = new PDO("mysql:host=".$Host.";dbname=".$DatabaseName."", $DatabaseUser,$DatabasePassword);
    // set attributes
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $conn;
	}

	$test = "SELECT * FROM *;";
	$conn = dbConnect();
	$stmt = $conn->prepare($test);
	$stmt->execute();
	$testr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($testr);
?>
