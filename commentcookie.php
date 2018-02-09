#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	$cookie_name = "postname";
	$cookie_value = $_GET['post_title'];
	setcookie($cookie_name, $cookie_value,0,"/");
?>