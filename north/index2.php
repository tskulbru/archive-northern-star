<?
require("config.php");
switch ($_GET['action']){
case 'register':
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
	$pic = $r['user_pic'];
	$lastname = $r['lastname'];
	$firstname =$r['firstname'];
	$username = $r['username'];
	$age = $r['age'];
	$country = $r['country'];
	$played_since = $r['played_since'];
	$former_clans = $r['former_clans'];
	$gameres = $r['gameres'];
	$gamesens = $r['gamesens'];
	$winsens = $r['winsens'];
	$cfg = $r['user_cfg'];
}
?>
	<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF" link="#86BEF7" vlink="#83C1F5" alink="#2567BB">
<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
&nbsp; 
<table width="76%" border="0" height="171">
  <tr> 
    <td width="43%" height="30">&nbsp;</td>
    <td width="21%" height="30"><font size="1" face="tahoma"> 
      <b><? echo $username; ?></b>
      </font></td>
    <td width="36%" rowspan="2">&nbsp; <img src="<? echo $pic; ?>"  width="156" height="140"></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<table width="49%" border="0">
  <tr> 
    <td height="12" width="44%"><font size="1" face="tahoma"><b>&nbsp; Name:</b></font></td>
    <td height="-4" width="52%"><font size="1" face="tahoma"> 
      <? echo $firstname; ?> <? echo $lastname; ?>
      </font></td>
    <td height="26" width="4%" rowspan="12">&nbsp;</td>
  </tr>
  <tr> 
    <td height="11" width="44%"><font size="1" face="tahoma"><b>&nbsp; Age:</b></font></td>
    <td height="11" width="52%"><font size="1" face="tahoma"> 
      <? echo $age; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="18" width="44%"><font size="1" face="tahoma"><b>&nbsp; Location:</b></font></td>
    <td height="18" width="52%"><font size="1" face="tahoma"> 
      <? echo $country; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="17" width="44%">&nbsp; </td>
    <td height="17" width="52%">&nbsp;</td>
  </tr>
  <tr> 
    <td height="16" width="44%"><font size="1" face="tahoma"><b>&nbsp; Played 
      Since :</b></font></td>
    <td height="16" width="52%"><font size="1" face="tahoma"> 
      <? echo $played_since; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="12" width="44%"><font size="1" face="tahoma"><b>&nbsp; Former Clans:</b></font></td>
    <td height="-2" width="52%"><font size="1" face="tahoma"> 
      <? echo $former_clans; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="17" width="44%"><font size="1" face="tahoma"><b>&nbsp; Game Resolution:</b></font></td>
    <td height="17" width="52%"><font size="1" face="tahoma"> 
      <? echo $gameres; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="13" width="44%"><font size="1" face="tahoma"><b>&nbsp; Game Sensitivity:</b></font></td>
    <td height="13" width="52%"><font size="1" face="tahoma"> 
      <? echo $gamesens ?>
      </font></td>
  </tr>
  <tr> 
    <td height="9" width="44%"><font size="1" face="tahoma"><b>&nbsp; Windows Sensitivity:</b></font></td>
    <td height="9" width="52%"><font size="1" face="tahoma"> 
      <? echo $winsens; ?>
      </font></td>
  </tr>
  <tr> 
    <td height="16" width="44%">&nbsp;</td>
    <td height="16" width="52%">&nbsp;</td>
  </tr>
  <tr> 
    <td height="4" width="44%"><font size="1" face="tahoma"><b>&nbsp; Config:</b></font></td>
    <td height="4" width="52%"><font size="1" face="tahoma"><a href="user_cfg/<? echo $cfg; ?>">Click 
      Here</a></font></td>
  </tr>
  <tr> 
    <td height="9" width="44%"><font size="1" face="tahoma"><b>&nbsp; Quote:</b></font></td>
    <td height="9" width="52%"><font size="1" face="tahoma"> 
      <? echo $quote; ?>
      </font></td>
  </tr>
</table>
<div align="center"><a href="index2.php?action=members">Back</a></div>
</body>
<?
	
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
case 'demo':
	demo();
break;
case 'adddemo':
	adddemo();
break;
default:
	news_header();
}
?>