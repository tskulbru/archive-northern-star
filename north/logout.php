<?
if(isset($_COOKIE['online'])){
setcookie("online", $uid,time()-3600, "/", '', 0);
setcookie("username", $username,time()-3600, "/", '', 0);
setcookie("user_lvl", $user_lvl,time()-3600, "/", '', 0);
header("Location: index.php");
} else { die("not logged in"); }
?>