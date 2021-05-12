<?
include("config2.php");
$news_id = $_GET['add_id'];
$query = "SELECT * FROM comments WHERE newsid='$news_id' ORDER BY id";
$result = mysql_query($query) or die("ERROR: ".mysql_error());
$commentnr = 0;
while($r=mysql_fetch_array($result)){
    $commentnr++;
	$date = $r['date'];
	$id = $r['id'];
	$nick = $r['nick'];
	$comment = $r['comment'];
?>
<font face="tahoma" size="2">
#<?echo $commentnr; ?> &nbsp; Posted by: <? echo $nick; ?>. &nbsp; &nbsp; &nbsp; 
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){ ?>
<a href="del_comment.php?id=<? echo $id; ?>">Delete</a>
<? } ?>
<br> 
<? echo $date; ?>
<br>  

  <br>
  <? 
  $text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=\"_blank\">\\0</a>", $comment);
  echo nl2br($text); 
  ?>
  <br>
  <hr>
<br><br>
</font>
<? } ?>