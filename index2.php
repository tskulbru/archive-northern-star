<?
require("config.php");
switch ($_GET['action']){
case 'register':
register();
?> <body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF">

<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
&nbsp; <table width="90%" cellspacing="1" cellpadding="0" border="0">
    <tr><td>&nbsp; <font size="1" face="tahoma"><b>Register:</b><br>
	&nbsp; To fully use the NorthernStar system you need to register as a member. <br>
	&nbsp; Every field needs to be filled out. <br><br></font></td>
	<tr>
	<td>&nbsp; <font size="1" face="tahoma">Nick (without clantag)</font></td>
	</tr>
	<tr><form action="index2.php?action=register" method="post">
     <td>&nbsp; <input type="text" name="username" style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp; <font size="1" face="tahoma">Password</font></td></tr>
    <tr>
     <td>&nbsp; <input type="password" name="password"  style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp; <font size="1" face="tahoma">Email address (must be valid)</font></td></tr>
	<tr> 
	<td>&nbsp; <input type="text" name="mail"  style="FONT-SIZE: 12px; WIDTH: 150px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr>
     <td>&nbsp; <input type="submit" name="submit"  style="FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7">
	 </form>
   </table>
</body>
<?
break;
case 'lostpw':
?>
<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF">

<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
&nbsp; <table width="90%" cellspacing="1" cellpadding="0" border="0">
    <tr><td>&nbsp; <font size="1" face="tahoma"><b>Lost my password</b><br>
	&nbsp; If you are a member but do not remember your password, enter your username below<br> 
	&nbsp; and submit. The password will be emailed to that user: <br><br></font></td>
	<tr>
	<td>&nbsp; <font size="1" face="tahoma">Username</font></td>
	</tr>
	<tr><form action="index.php?action=lostpw method="post">
     <td>&nbsp; <input type="text" name="username" style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr>
     <td>&nbsp; <input type="submit" name="submit"  style="FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7">
   </form>
   </table>
</body>
<?
break;
case 'members':
	if(isset($_GET['disp'])){
	
	$id = $_GET['disp'];
	$profile_sql = "SELECT * FROM users WHERE id='$id'";
	$profile_res = mysql_query($profile_sql) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($profile_res)){
	$country = $r['country'];

$country_sql = "SELECT * FROM country WHERE name='$country'";
$country_res = mysql_query($country_sql);
while($c=mysql_fetch_array($country_res)){

?>
	<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF" link="#86BEF7" vlink="#83C1F5" alink="#2567BB">
<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
&nbsp; 
 
<table cellspacing=0 cellpadding=0 border=0 width=458 height="294">
  <tr> 
    <td valign="middle" colspan=3  height=34> 
      &nbsp;<font size="2" face="tahoma"> <img border="0" src="<? echo $c['img']; ?>"> <? echo $r['username']; ?> </font>
    </td>
  </tr>
  <tr> 
    <td width=1></td>
    <td valign="top" style="padding: 8px" width=438> 
      <img src="<? echo $r['user_pic']; ?>" width=100 height=150 align='right' border=0 hspace=10>
      <p><font size="1" face="tahoma"> <b>Name:</b><?echo $r['firstname'];?> <? echo $r['lastname']; ?><br>
        <b>Age:</b> <? echo $r['age']; ?><br>
        <b>Country:</b> <? echo $r['country']; ?><br>
        <b>Config:</b> <a href="<? echo $r['user_cfg']; ?>">Download</a><br>
        <b>Game Resolution:</b> <? echo $r['gameres']; ?><br>
        <b>Game Sensitivity:</b> <? echo $r['gamesens']; ?><br>
        <b>Windows Sensitivity:</b> <? echo $r['winsens']; ?></font>
      <p><font size="1" face="tahoma"> <? echo $r['info']; ?></font><br>
	  <p><font size="1" face="tahoma"><b> Hardware </b><br><br>
	  <b>Motherboard:</b> <? echo $r['motherboard']; ?><br>
	  <b>Mouse:</b> <? echo $r['mouse']; ?><br>
	  <b>Mousepad:</b> <? echo $r['mousepad']; ?><br>
	  <b>Headphones:</b> <? echo $r['headphones']; ?><br>
	  <b>Monitor:</b> <? echo $r['monitor']; ?><br>
	  <b>CPU:</b> <? echo $r['cpu']; ?><br>
	  <b>Memory:</b> <? echo $r['mem']; ?><br>
	  <b>Gfx Card:</b> <? echo $r['gfxcard']; ?><br>
	  <b>OS:</b> <? echo $r['os']; ?><br>
	  <b>Soundcard:</b> <? echo $r['soundcard']; ?><br>
	  <b>Connection:</b> <? echo $r['connection']; ?><br>
    </td>
    <td width=1></td>
  </tr>
  <tr> 
    <td valign="top" colspan=3 height="2"></td>
  </tr>
</table>

</body>
<?
}
}
	
} else {

?>
<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF" link="#86BEF7" vlink="#83C1F5" alink="#2567BB">
<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
&nbsp; 
<table width="49%" cellspacing="1" cellpadding="0" border="0">
  <tr> 
    <td colspan="2" >&nbsp; <font size="1" face="tahoma"><b>CS Squad:</b><br>
      <br>
      </font></td>
    <?
$query1 = "SELECT * FROM users WHERE squad='Counter Strike'";
$result1 = mysql_query($query1) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result1)){
 $id = $r['id'];
 $username = $r['username'];
 ?>
  <tr>
    <td width="31%">&nbsp; <font size="1" face="tahoma"><? echo $username; ?></font></td>
    <td width="69%"><font size="1" face="tahoma"><a href="index2.php?action=members&disp=<? echo $id; ?>">Show info</a></font></td>
  </tr>
 <? } ?>
  <tr> 
    <td colspan="2" ><font size="1" face="tahoma"><br>
      <br>
      </font></td>
	  <tr> 
    <td colspan="2" >&nbsp; <font size="1" face="tahoma"><b>Organisation:</b><br>
      <br>
      </font></td>
	    <?
$query2 = "SELECT * FROM users WHERE squad='Organisation'";
$result2 = mysql_query($query2) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result2)){
 $id = $r['id'];
 $username = $r['username'];
 ?>
	  <tr> 
    <td width="31%">&nbsp; <font size="1" face="tahoma"><? echo $username; ?></font></td>
    <td width="69%"><font size="1" face="tahoma"><a href="index2.php?action=members&disp=<? echo $id; ?>">Show info</a></font></td>
  </tr>
  <? } ?>
    <tr> 
    <td colspan="2" ><font size="1" face="tahoma"><br>
      <br>
      </font></td>
	  <tr> 
    <td colspan="2" >&nbsp; <font size="1" face="tahoma"><b>Site Admins:</b><br>
      <br>
      </font></td>
	  <? 
	 $query3 = "SELECT * FROM users WHERE squad='Site Admin'";
	 $result3 = mysql_query($query3) or die ("Feil: ".mysql_error());

	 while($r=mysql_fetch_array($result3)){
		 $id = $r['id'];
		 $username = $r['username'];
		 ?>
	  	  <tr> 
    <td width="31%">&nbsp; <font size="1" face="tahoma"><? echo $username; ?></font></td>
    <td width="69%"><font size="1" face="tahoma"><a href="index2.php?action=members&disp=<? echo $id; ?>">Show info</a></font></td>
  </tr>
  <? }
} ?>
</table>
</body>
<?
break;
case 'news':
	if(isset($_GET['disp'])){
	news();
} else {
	news_header();
}
break;
case 'addnews':
	addnews();
break;
case 'editprofile':
	include "profile_update.php";
break;
case 'editnews':
	editnews($id);
break;
case 'delnews':
	delnews($id);
break;
case 'demo':
	demo();
break;
case 'adddemo':
	adddemo();
break;
case 'deldemo':
	deldemo($id);
break;
case 'matches':
	matches();
break;
case 'addmatch':
	addmatch();
break;
case 'delmatch':
        delmatch($id);
break;
case 'editmatch':
        editmatch($id);
break;
default:
	news_header();
}

?>