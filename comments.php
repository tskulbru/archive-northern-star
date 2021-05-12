<?
include("config2.php");
function news_c() {
$news_id = $_GET['disp'];
$query = "SELECT * FROM comments WHERE newsid='$news_id' ORDER BY id";
$result = mysql_query($query) or die("ERROR: ".mysql_error());
$commentnr = 0;
while($r=mysql_fetch_array($result)){
    $commentnr++;
	$date = $r['date'];
	$id = $r['id'];
	$nick = $r['nick'];
	$comment = $r['comment'];
	$ip = $r['ip'];
?>
<font face="tahoma" size="1">#<?echo $commentnr; ?> &nbsp; Posted by: <? echo $nick; ?>. 
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){ ?>
(<? echo $ip; ?>)
<? } ?></font> &nbsp; &nbsp; &nbsp; 
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){ ?>
<font face="tahoma" size="1"><a href="del_comment.php?id=<? echo $id; ?>">Delete</a></font>
<? } ?>
<br> 
<font face="tahoma" size="1"><? echo $date; ?></font>
<br>  

  <br><font face="tahoma" size="1">
  <? 
  $text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=\"_blank\">\\0</a>", $comment);
  echo nl2br($text); 
  ?>
  <br></font>
  <hr>
<br><br>
<? } 
}

function match_c() { 
$match_id = $_GET['id'];
$query = "SELECT * FROM comments WHERE matchid='$match_id' ORDER BY id";
$result = mysql_query($query) or die("ERROR: ".mysql_error());
$commentnr = 0;
while($r=mysql_fetch_array($result)){
    $commentnr++;
	$date = $r['date'];
	$id = $r['id'];
	$nick = $r['nick'];
	$comment = $r['comment'];
	$ip = $r['ip'];
?>
<font face="tahoma" size="1">#<?echo $commentnr; ?> &nbsp; Posted by: <? echo $nick; ?>. 
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){ ?>
(<? echo $ip; ?>)
<? } ?></font> &nbsp; &nbsp; &nbsp; 
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){ ?>
<font face="tahoma" size="1"><a href="del_comment.php?id=<? echo $id; ?>">Delete</a></font>
<? } ?>
<br> 
<font face="tahoma" size="1"><? echo $date; ?></font>
<br>  

  <br><font face="tahoma" size="1">
  <? 
  $text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=\"_blank\">\\0</a>", $comment);
  echo nl2br($text); 
  ?>
  <br></font>
  <hr>
<br><br>
<? } 
}
?>