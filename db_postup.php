#!/usr/local/bin/php -d display_errors=STDOUT
<?php
  // begin this XHTML page
  print('<?xml version="1.0" encoding="utf-8"?>');
  print("\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<title>PostUp</title> 
</head>
<body>
 <p>
<?php

$database = "db_postup.db";          


try  
{     
     $db = new SQLite3($database);
}
catch (Exception $exception)
{
    echo '<p>There was an error connecting to the database!</p>';

    if ($db)
    {
        echo $exception->getMessage();
    }
        
}
$table = "login";
$field1 = "username";
$field2 = "password";

$sql= "CREATE TABLE IF NOT EXISTS $table (
$field1 varchar(100),
$field2 varchar(100)
)";
$result = $db->query($sql);

$table2 = "posts";
$field21 = "username";
$field22 = "title";
$field23 = "post";
$field26 = "time_stamp";


$sql2= "CREATE TABLE IF NOT EXISTS $table2 (
$field21 varchar(100),
$field22 varchar(500),
$field23 varchar(5000),
$field26 int(20)
)";
$result2 = $db->query($sql2);

$table3 = "comments";
$field31 = "username";
$field32 = "post_title";
$field33 = "body";
$field34 = "time_stamp";


$sql3= "CREATE TABLE IF NOT EXISTS $table3 (
$field31 varchar(100),
$field32 varchar(500),
$field33 varchar(300),
$field34 int(20)
)";
$result3 = $db->query($sql3);

?>
</p>
</body>
</html>