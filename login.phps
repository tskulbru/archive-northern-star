<?
require("config.php");
switch (@$_GET['action']){
case 'register':
	register();
break;
case 'lostpw':
	lostpw();
break;
default:
	login();
}
?>