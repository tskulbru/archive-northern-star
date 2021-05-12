<?
include("config.php");
if(isset($_GET['add_id'])){
$nick = $_POST['nick'];
$date = date("Y-m-d H:i:s");
$comment = $_POST['comment'];
$news_id = $_REQUEST['add_id'];
$ip = $_POST['ip'];

$query = "SELECT * FROM comments WHERE newsid='$news_id'";
$result = mysql_query($query) or die("ERROR: ".mysql_error());

while($r=mysql_fetch_array($result)){
    $id = $r['id'];
}
if (!isset($_COOKIE['online'])) { 
$query = mysql_query("SELECT username from users where username = '" . $_POST['nick'] . "'"); 
if (mysql_num_rows($query) == '1') 
{ echo "You have to be logged in to post with this nick."; include('index_2.php'); die(); }
}
$sql = mysql_query("INSERT INTO comments (newsid, nick, date, comment, ip) VALUES ('$news_id', '$nick', '$date', '$comment', '$ip')")
	or die (mysql_error());
if(!$sql){
	echo "An error appeared while submitting your comment. Please contact webmaster.";
} else { 
header("Location: index2.php");
} 
}
if(isset($_GET['match_id'])){
$nick = $_POST['nick'];
$date = date("Y-m-d H:i:s");
$comment = $_POST['comment'];
$matchid = $_REQUEST['match_id'];
$ip = $_POST['ip'];

$query = "SELECT * FROM comments WHERE matchid='$matchid'";
$result = mysql_query($query) or die("ERROR: ".mysql_error());

while($r=mysql_fetch_array($result)){
    $id = $r['id'];
}
if (!isset($_COOKIE['online'])) { 
$query = mysql_query("SELECT username from users where username = '" . $_POST['nick'] . "'"); 
if (mysql_num_rows($query) == '1') 
{ echo "You have to be logged in to post with this nick."; include('index_2.php'); die(); }
}
$sql = mysql_query("INSERT INTO comments (matchid, nick, date, comment, ip) VALUES ('$matchid', '$nick', '$date', '$comment', '$ip')")
	or die (mysql_error());
if(!$sql){
	echo "An error appeared while submitting your comment. Please contact webmaster.";
} else { 
header("Location: index2.php?action=matches&id=".$matchid."");
} 
}
?>