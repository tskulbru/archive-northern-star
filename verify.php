<?
require("config.php");

if((!$_POST['username']) || (!$_POST['password'])){
	echo "Du må fylle inn alle feltene";
} else {
$login = $_POST['username'];
if ($user_sel = mysql_query("SELECT * FROM ET_USERS where nick='$login'")) {
$user_array = mysql_fetch_array($user_sel);

if ($pass == $user_array['password']) {

$last_url = $last_url;
$parsed_url = parse_url(" $last_url");
$iurl = $parsed_url[query];

$bafu = "authad";
$uid = $user_array['id'];
session_register(bafu);
session_register(uid);
if ($auto_login == "yes") {

setcookie ("etnu_loggedin", "autoLogin", time()+315360000, "/", ".mestninja.com");
setcookie ("etnu_uid", $uid, time()+315360000, "/", ".mestninja.com");
}
$nurl = ereg_replace ("nav=", "", $iurl);
$nurl = preg_replace ("/(&)/", ".php&", $nurl, 1);
//include("$nurl");
//include("index.php");
$last_url = $last_url;
header("Location: $last_url");
}
else {
$losen = "Felaktigt användarnamn eller lösenord!";
}
}
else {
echo "Det gick inte och logga in!";
}
}
/*
echo "<br><br>".$_POST['login']."<br>".$_POST['pass']."<br><br>";
echo "<br><br>$login<br>$pass<br><br>";
echo $user_array['nick']."<br>".$user_array['password'];
echo "$last_url";
echo "bice";
*/
?>