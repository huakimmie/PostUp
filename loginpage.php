#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	$username = $_GET['username'];
	$password = $_GET['password'];
	$database = "db_postup.db";
	$db = new SQLite3($database);

	$sql = "SELECT password FROM login WHERE username = '$username'";
	$result = $db->query($sql);
	$record = $result->fetchArray();
	if($record[0] == $password){
		$cookie_name = "username";
		$cookie_value = "$username";
		setcookie($cookie_name, $cookie_value,0,"/");
		echo "|You have logged in!|";
	}
	else{
		$cookie_name = "username";
		$cookie_value = "";
		setcookie($cookie_name, $cookie_value,0,"/");
		echo "|Username or password is incorrect. Please try again!|";
	}

  	print('<?xml version="1.0" encoding="utf-8"?>');
  	print("\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<title>New User</title> 
</head>
<body>
<p>
</p>
</body>
</html>
