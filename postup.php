#!/usr/local/bin/php -d display_errors=STDOUT
<?php
print '<?xml version = "1.0" encoding="utf-8"?>';
print("\n");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
<script type="text/javascript">
    </script>
 <link rel="stylesheet" type="text/css" href="css_post_up.css"/>
<title> POST UP</title>

</head>
<body  >

<?php
date_default_timezone_set('America/Los_Angeles');
$database = "db_postup.db";
$db = new SQLite3($database);
$sql = "SELECT * FROM posts";
$result = $db->query($sql);
$row = array(); 
$i = 0; 
while($res = $result->fetchArray(SQLITE3_ASSOC)){ 
	$row[$i]['username'] = $res['username']; 
  	$row[$i]['title'] = $res['title'];
  	$row[$i]['post'] = $res['post'];
    $row[$i]['time_stamp'] = $res['time_stamp']; 
  	$i++; 
}
echo '<div class="topnav">
  <a onclick="logout()">Log Out</a>
  <a onclick="login()">Log In</a>
  <a onclick="newreg()">Sign Up</a>
</div>
<form id="userform" action="postup.php" method="post">
  <fieldset>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" class="text"/>
      <br /><br />
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" class="text" />
      <br /><br />
      <input type="button" value="Submit" onclick="login_form()"/>
      <button onclick="document.getElementById(userform).style.display=none">Close</button>
  </fieldset>
</form>
<form id="newuserform" action="postup.php" method="post">
  <fieldset>
      <label for="new_username">New Username: </label>
      <input type="text" name="new_username" id="new_username" class="text"/>
      <br /><br />
      <label for="new_password">New Password: </label>
      <input type="password" name="new_password" id="new_password" class="text" />
      <br /><br />
      <input type="button" value="Submit" onclick="new_reg_form()"/>
         <button onclick="document.getElementById(new_username).style.display=none">Close</button>
  </fieldset>
</form>
<div class="wrapping">
<div class="inner">
	<img  id = "photo" height ="100px" width ="100px" src="ball.jpg" alt="ball"/><pre>&nbsp;POST&nbsp;UP</pre>
</div>
	<div class="botnav">
  <a href="postup.php" id="home">FORUMS</a>
</div>
<div class="lownav">
  <a href="postup.php">HOME</a>
  <div onclick="newpostappear()" id="make"><a>MAKE NEW POST</a></div>
</div>
<div id="makepostdiv">
	    <fieldset>
	        <legend>New Post</legend>
	        <fieldset>
	        <legend>Title</legend>
	        <input id="wid" maxlength ="200" type="text" name="title"/>
	    </fieldset>
	        <p></p>
	        <fieldset>
	        <legend>Post Body</legend>
	        <textarea id="pbody" cols= "100%" rows="20" name="body"></textarea>
	    </fieldset>
	    <p></p>
	    	<input type="button" value="Submit" onclick="make_post_form()"/>
	    </fieldset>
</div>
<div id="newdata">
</div>
</div>';

?>
<script type="text/javascript" src="function_postup.js"></script>
<script type="text/javascript" src="main.js"></script>
</body></html>