#!/usr/local/bin/php -d display_errors=STDOUT
<?php

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
<?php 
	$new_username = $_GET['new_username'];
	$new_password = $_GET['new_password'];
	$database = "db_postup.db";
	$db = new SQLite3($database);

	$sql = "SELECT * FROM login WHERE username = '$new_username'";
	$result = $db->query($sql);
	$record = $result->fetchArray();
	$sz = count($record);
	if($sz == 1){
		$sql = "INSERT INTO login (username, password) VALUES ('$new_username', '$new_password')";
		$result = $db->query($sql);
		print "|Account successfully created. Please log in!|";
	}
	else{
		print "|Username is taken, please choose another one.|";
	}
?>
</p>
</body>
</html>
