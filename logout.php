#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	$cookie_name = "username";
	setcookie($cookie_name,'',time() - 3600,"/");
?>