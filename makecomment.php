#!/usr/local/bin/php -d display_errors=STDOUT
<?php
    date_default_timezone_set('America/Los_Angeles');
    $boolval = $_GET['newc'];
    $database = "db_postup.db";
    $db = new SQLite3($database);
    $cur_log = $_GET['cur_log'];
    if($boolval == "yes" && $cur_log != ""){
        $cbody = $_GET['body'];
        $cptitle = $_GET['post_title'];
        $t = time();
        $cptitle=str_replace("'","anapostrophe",$cptitle);
        $cbody=str_replace("'","anapostrophe",$cbody);

        $sql = "INSERT INTO comments (username, post_title, body, time_stamp) VALUES ('$cur_log', '$cptitle', '$cbody','$t')";
        $result = $db->query($sql);
    }
    $ptitle = $_COOKIE['postname'];
    $sql = "SELECT * FROM comments WHERE post_title = '$ptitle'";
    $result = $db->query($sql);
    $row = array(); 
    $i = 0;
    while($res = $result->fetchArray(SQLITE3_ASSOC)){ 
        $row[$i]['username'] = $res['username']; 
        $row[$i]['post_title'] = $res['post_title'];
        $row[$i]['body'] = $res['body'];
        $row[$i]['time_stamp'] = $res['time_stamp']; 
        $i++; 
    } 
    echo'<table class="organize">
    <tr>
    <th id="title">Comments:</th>
    </tr>';
    $rowcount = count($row)-1;
    for($i=$rowcount; $i >= 0;$i--){
        $rusername = $row[$i]['username'];
        $rpost_title = $row[$i]['post_title'];
        $rbody = $row[$i]['body'];
        $rtime_stamp = $row[$i]['time_stamp'];
        $dbody = str_replace("anapostrophe","'",$rbody);
        echo '<tr>';
        echo '<td><strong>@'.$rusername.':</strong></td>';
        echo'</tr>';
        echo '<tr>';
        echo '<td>'.$dbody.'</td>';
        echo '</tr>';
        echo '<tr><td><br></td></tr>';
    }
    echo '</table>';
?>