<?
login();
switch (@$_GET['action']){
case 'register':
	register();
break;
case 'lostpw':
	lostpw();
break;
}
?>