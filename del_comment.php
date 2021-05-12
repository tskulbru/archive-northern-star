<?php
include("config.php");
if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){
$id = $_REQUEST['id'];

$sql = mysql_query("DELETE FROM comments WHERE id='$id'")
	or die (mysql_error());
if(!$sql){
	echo "An error appeared while trying to delete the selected comment.";
} else {
header("Location: index2.php");
} }
else { echo "You don't have access to this."; }
?>