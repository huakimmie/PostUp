#!/usr/local/bin/php -d display_errors=STDOUT
<?php
	date_default_timezone_set('America/Los_Angeles');
	$boolval = $_GET['newp'];
	$database = "db_postup.db";
	$db = new SQLite3($database);
	if($boolval == "yes" && isset($_COOKIE['username'])){
		$title = $_GET['title'];
		$body = $_GET['body'];
		$username = $_COOKIE['username'];
		$t = time();
		$title=str_replace("'","anapostrophe",$title);
        $body=str_replace("'","anapostrophe",$body);


		$sql = "INSERT INTO posts (username, title, post, time_stamp) 
			VALUES ('$username', '$title', '$body','$t')";
		$result = $db->query($sql);
    
    	$cookie_name = "title";
		$cookie_value = "$title";
		setcookie($cookie_name, $cookie_value);
	}
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

	echo'<table class="organ">
	<tr>
	<th id="topic">Topic</th>
	<th id="sub"/>
	<th id="sub">Posted</th>
	</tr>';
	$rowcount = count($row)-1;
	for($i=$rowcount; $i >= 0;$i--){
		$rusername = $row[$i]['username'];
	  	$rtitle = $row[$i]['title'];
	  	$rpost = $row[$i]['post'];
		$rtimestamp = $row[$i]['time_stamp'];
		$dtitle = str_replace("anapostrophe","'",$rtitle);
		echo'<tr>';
		echo'<td onmousedown="direct_to_post('."'$rtitle' , '$rtimestamp'".')" id="topicsub" class="topicsub"><strong>@'.$rusername.":</strong>&emsp;".'<a>'.$dtitle.'</a></td>';
		echo'<td id="innersub"></td>';
		echo'<td id="innersub">';
		$difference = time() - $rtimestamp;
		$days= floor($difference/(60*60*24));
		echo ($days);
		echo' D ';
		$hours=floor($difference/(60*60))%24;
		echo($hours);
		echo' H ';
		$minutes=floor($difference/60)%60;
		echo ($minutes);
		echo' M ago';
		echo'</td>';
		echo'</tr>';
		echo'<tr> 
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>';
	}
	echo'</table>';
?>